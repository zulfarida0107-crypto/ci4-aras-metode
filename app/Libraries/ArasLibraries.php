<?php

namespace App\Libraries;

class ArasLibraries
{
    /**
     * Menjalankan 8 tahap perhitungan ARAS
     * 
     * @param array $alternatives Data alternatif [{id, nama, spek, scores: {harga, berat, ram, storage, processor, baterai}}]
     * @param array $weights Bobot kriteria {harga, berat, ram, storage, processor, baterai}
     * @param array $types Tipe kriteria {harga=>'cost', berat=>'cost', ram=>'benefit', ...}
     * @return array Hasil ranking beserta Ki
     */
    public function calculate(array $alternatives, array $weights, array $types)
    {
        if (empty($alternatives)) return [];

        // 1. Normalisasi Bobot agar jumlahnya = 1
        $sumW = array_sum($weights);
        if ($sumW == 0) $sumW = 1;
        $w = [];
        foreach ($weights as $k => $v) {
            $w[$k] = $v / $sumW;
        }

        $criteriaKeys = array_keys($types);
        
        // 2. Tentukan A0 (Nilai Optimal)
        $A0 = [];
        foreach ($criteriaKeys as $key) {
            $values = array_column(array_column($alternatives, 'scores'), $key);
            if ($types[$key] == 'benefit') {
                $A0[$key] = max($values);
            } else {
                $A0[$key] = min($values);
            }
        }

        // 3. Normalisasi Matriks (R)
        $sumR = [];
        foreach ($criteriaKeys as $key) {
            $sum = 0;
            // Tambahkan A0
            if ($types[$key] == 'benefit') {
                $sum += $A0[$key];
            } else {
                $sum += (1 / $A0[$key]);
            }
            // Tambahkan Alternatif
            foreach ($alternatives as $alt) {
                if ($types[$key] == 'benefit') {
                    $sum += $alt['scores'][$key];
                } else {
                    $sum += (1 / $alt['scores'][$key]);
                }
            }
            $sumR[$key] = $sum;
        }

        // Hitung Si untuk A0
        $S0 = 0;
        foreach ($criteriaKeys as $key) {
            $r0 = ($types[$key] == 'benefit') ? ($A0[$key] / $sumR[$key]) : ((1 / $A0[$key]) / $sumR[$key]);
            $d0 = $r0 * $w[$key];
            $S0 += $d0;
        }

        // 4, 5, 6, 7. Hitung R, D, Si, Ki untuk setiap alternatif
        $results = [];
        foreach ($alternatives as $alt) {
            $Si = 0;
            $R_alt = [];
            $D_alt = [];
            
            foreach ($criteriaKeys as $key) {
                $val = $alt['scores'][$key];
                $r = ($types[$key] == 'benefit') ? ($val / $sumR[$key]) : ((1 / $val) / $sumR[$key]);
                $d = $r * $w[$key];
                
                $R_alt[$key] = $r;
                $D_alt[$key] = $d;
                $Si += $d;
            }
            $Ki = $S0 > 0 ? ($Si / $S0) : 0;
            
            $results[] = [
                'id' => $alt['id'],
                'nama' => $alt['nama'],
                'spek' => $alt['spek'],
                'ki' => round($Ki, 4),
                'scores' => $alt['scores'], // Matrix X
                'labels' => $alt['labels'],
                'R' => $R_alt,
                'D' => $D_alt,
                'Si' => $Si,
                'A0' => $A0,
                'S0' => $S0,
                'W' => $w, // Bobot normalisasi
                'sumR' => $sumR
            ];
        }

        // 8. Sorting dari Ki terbesar
        usort($results, function($a, $b) {
            return $b['ki'] <=> $a['ki'];
        });

        // Add Rank
        $rank = 1;
        foreach ($results as &$r) {
            $r['rank'] = $rank++;
            $r['is_optimal'] = ($r['rank'] == 1);
            if ($r['rank'] == 1) {
                $r['bg'] = 'bg-amber-100'; $r['text'] = 'text-amber-600'; $r['icon'] = '🥇';
            } elseif ($r['rank'] == 2) {
                $r['bg'] = 'bg-slate-100'; $r['text'] = 'text-slate-500'; $r['icon'] = '🥈';
            } elseif ($r['rank'] == 3) {
                $r['bg'] = 'bg-orange-50'; $r['text'] = 'text-orange-400'; $r['icon'] = '🥉';
            } else {
                $r['bg'] = 'bg-surface-container'; $r['text'] = 'text-on-surface-variant'; $r['icon'] = $r['rank'];
            }
        }

        return $results;
    }
}
