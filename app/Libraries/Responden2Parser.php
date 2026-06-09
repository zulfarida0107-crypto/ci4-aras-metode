<?php

namespace App\Libraries;

/**
 * Parser untuk membaca data Cost/Benefit dan Skor dari file Responden2.md
 * Mengekstrak sifat kriteria (Cost/Benefit) dan spesifikasi pilihan per responden.
 */
class Responden2Parser
{
    /**
     * Parse file Responden2.md dan kembalikan array data per responden.
     *
     * @return array [ 
     *   ['id' => 3, 'nama' => 'Raihan', 'skenario' => '...', 'types' => ['harga'=>'benefit',...], 'scores' => ['harga'=>1,...] ],
     *   ...
     * ]
     */
    public static function parse(): array
    {
        $filePath = ROOTPATH . 'Responden2.md';
        if (!file_exists($filePath)) {
            return [];
        }

        $content = file_get_contents($filePath);
        $lines = explode("\n", $content);
        
        $respondents = [];
        $current = null;
        $section = null; // Track which section we're reading

        foreach ($lines as $line) {
            $line = trim($line);
            
            // Detect new respondent header: ### Responden N: Nama
            if (preg_match('/^###\s+Responden\s+(\d+):\s+(.+)$/i', $line, $m)) {
                if ($current !== null) {
                    $respondents[] = $current;
                }
                $current = [
                    'id' => (int)$m[1],
                    'nama' => trim($m[2]),
                    'skenario' => '',
                    'tipe_label' => '',
                    'types' => [],
                    'scores' => [],
                ];
                $section = null;
                continue;
            }

            if ($current === null) continue;

            // Detect scenario label
            if (preg_match('/^\*\*Skenario Pengguna:\*\*/', $line)) {
                $section = 'skenario';
                continue;
            }

            // Detect types section
            if (preg_match('/^\*\*Sifat Kriteria \(Cost\/Benefit\):\*\*/', $line)) {
                $section = 'types';
                continue;
            }

            // Detect scores section
            if (preg_match('/^\*\*Spesifikasi Pilihan \(dan Skor\):\*\*/', $line)) {
                $section = 'scores';
                continue;
            }

            // Parse scenario info
            if ($section === 'skenario' && preg_match('/^-\s+\*\*(.+?):\*\*\s*(.*)$/', $line, $m)) {
                $current['tipe_label'] = trim($m[1]);
                $current['skenario'] = trim($m[2]);
                continue;
            }

            // Parse types line: "- Harga: Benefit | Berat: Cost | ..."
            if ($section === 'types' && preg_match('/^-\s+(.+)$/', $line, $m)) {
                $pairs = explode('|', $m[1]);
                foreach ($pairs as $pair) {
                    $pair = trim($pair);
                    if (preg_match('/^(\w+):\s*(Benefit|Cost)$/i', $pair, $pm)) {
                        $key = self::normalizeKey($pm[1]);
                        if ($key) {
                            $current['types'][$key] = strtolower($pm[2]);
                        }
                    }
                }
                continue;
            }

            // Parse score lines: "- Harga: >25 juta (Skor: 1)"
            if ($section === 'scores' && preg_match('/^-\s+(.+?):\s+(.+?)\s+\(Skor:\s*(\d+)\)/', $line, $m)) {
                $key = self::normalizeKey(trim($m[1]));
                if ($key) {
                    $current['scores'][$key] = (int)$m[3];
                    if (!isset($current['labels'])) {
                        $current['labels'] = [];
                    }
                    $current['labels'][$key] = trim($m[2]);
                }
                continue;
            }
        }

        // Don't forget the last respondent
        if ($current !== null) {
            $respondents[] = $current;
        }

        // Filter out any entries that don't start with "### Kegunaan"
        $respondents = array_filter($respondents, function($r) {
            return !empty($r['types']) && count($r['types']) === 6;
        });

        return array_values($respondents);
    }

    /**
     * Ambil data responden berdasarkan ID (nomor responden di Responden2.md)
     */
    public static function findById(int $id): ?array
    {
        $all = self::parse();
        foreach ($all as $r) {
            if ($r['id'] === $id) {
                return $r;
            }
        }
        return null;
    }

    /**
     * Mendapatkan daftar responden sebagai dropdown options
     * @return array [['id' => 3, 'nama' => 'Raihan', 'tipe_label' => 'Tipe Sultan Mobilitas'], ...]
     */
    public static function getDropdownList(): array
    {
        $all = self::parse();
        return array_map(function($r) {
            return [
                'id' => $r['id'],
                'nama' => $r['nama'],
                'tipe_label' => $r['tipe_label'],
            ];
        }, $all);
    }

    /**
     * Normalisasi nama kriteria dari bahasa Indonesia ke key database
     */
    private static function normalizeKey(string $label): ?string
    {
        $map = [
            'harga' => 'harga',
            'berat' => 'berat',
            'ram' => 'ram',
            'storage' => 'storage',
            'penyimpanan' => 'storage',
            'prosesor' => 'processor',
            'processor' => 'processor',
            'baterai' => 'baterai',
        ];
        return $map[strtolower(trim($label))] ?? null;
    }
}
