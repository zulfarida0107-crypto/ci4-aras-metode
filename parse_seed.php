<?php

$file = file_get_contents('SurveiData.md');
$lines = explode("\n", $file);

$responden = [];
$currentId = 0;

$hargaMap = [
    '≤15 juta' => 3,
    '15 juta - 25 juta' => 2,
    '>25 juta' => 1
];

$beratMap = [
    '≤2 kg' => 3,
    '2,1 - 2,5 kg' => 2,
    '>2,5 kg' => 1
];

$ramMap = [
    '> 32 GB' => 4,
    '16 - 32 GB' => 3,
    '8 - 16 GB' => 2,
    '≤ 8 GB' => 1
];

$storageMap = [
    '≥ 1 TB' => 3,
    '512 GB' => 2,
    '≤ 256 GB' => 1
];

$processorMap = [
    'Core i9, Ryzen 9' => 4,
    'Core i7, Ryzen 7' => 3,
    'Core i5, Ryzen 5' => 2,
    'Core i3, Ryzen 3' => 1
];

$bateraiMap = [
    '≥ 6 jam' => 3,
    '3 – 5 jam' => 2,
    '≤ 2 jam' => 1
];

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) continue;

    if (preg_match('/^### Responden (\d+): (.+) \((.+), (.+) tahun\)$/', $line, $m)) {
        $currentId = (int)$m[1];
        $responden[$currentId] = [
            'nama' => $m[2],
            'status' => $m[3],
            'usia' => (int)$m[4],
            'bobot' => [],
            'skor' => []
        ];
    } elseif (preg_match('/^### Responden (\d+): (.+)$/', $line, $m)) {
        // Fallback if no status/usia
        $currentId = (int)$m[1];
        $responden[$currentId] = [
            'nama' => $m[2],
            'status' => 'Lainnya',
            'usia' => 0,
            'bobot' => [],
            'skor' => []
        ];
    }
    
    if ($currentId > 0) {
        if (str_starts_with($line, '- Harga: ') && !isset($responden[$currentId]['skor']['harga_label'])) {
            if (str_contains($line, '|')) {
                // Bobot
                preg_match_all('/(Harga|Berat|RAM|Penyimpanan|Prosesor|Baterai): (\d)/', $line, $matches, PREG_SET_ORDER);
                foreach ($matches as $match) {
                    $key = strtolower($match[1]);
                    if ($key == 'penyimpanan') $key = 'storage';
                    $responden[$currentId]['bobot'][$key] = (int)$match[2];
                }
            } else {
                // Skor
                $val = trim(substr($line, 9));
                $responden[$currentId]['skor']['harga_label'] = $val;
                $responden[$currentId]['skor']['harga_skor'] = $hargaMap[$val] ?? 1;
            }
        } elseif (str_starts_with($line, '- Berat: ')) {
            $val = trim(substr($line, 9));
            $responden[$currentId]['skor']['berat_label'] = $val;
            $responden[$currentId]['skor']['berat_skor'] = $beratMap[$val] ?? 1;
        } elseif (str_starts_with($line, '- RAM: ')) {
            $val = trim(substr($line, 7));
            $responden[$currentId]['skor']['ram_label'] = $val;
            $responden[$currentId]['skor']['ram_skor'] = $ramMap[$val] ?? 1;
        } elseif (str_starts_with($line, '- Penyimpanan: ')) {
            $val = trim(substr($line, 15));
            $responden[$currentId]['skor']['storage_label'] = $val;
            $responden[$currentId]['skor']['storage_skor'] = $storageMap[$val] ?? 1;
        } elseif (str_starts_with($line, '- Prosesor: ')) {
            $val = trim(substr($line, 12));
            $responden[$currentId]['skor']['processor_label'] = $val;
            $responden[$currentId]['skor']['processor_skor'] = $processorMap[$val] ?? 1;
        } elseif (str_starts_with($line, '- Baterai: ')) {
            $val = trim(substr($line, 11));
            $responden[$currentId]['skor']['baterai_label'] = $val;
            $responden[$currentId]['skor']['baterai_skor'] = $bateraiMap[$val] ?? 1;
        }
    }
}

// Generate Seeder class
$output = "<?php\n\nnamespace App\Database\Seeds;\n\nuse CodeIgniter\Database\Seeder;\n\nclass RespondenSeeder extends Seeder\n{\n    public function run()\n    {\n";
$output .= "        \$this->db->query('SET FOREIGN_KEY_CHECKS=0');\n";
$output .= "        \$this->db->table('skor_laptop')->truncate();\n";
$output .= "        \$this->db->table('bobot_kriteria')->truncate();\n";
$output .= "        \$this->db->table('responden')->truncate();\n";
$output .= "        \$this->db->query('SET FOREIGN_KEY_CHECKS=1');\n\n";

$output .= "        \$respondenData = [];\n";
$output .= "        \$bobotData = [];\n";
$output .= "        \$skorData = [];\n\n";

foreach ($responden as $id => $r) {
    $output .= "        \$respondenData[] = ['id' => $id, 'nama' => '{$r['nama']}', 'usia' => {$r['usia']}, 'status' => '{$r['status']}', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];\n";
    $output .= "        \$bobotData[] = ['responden_id' => $id, 'harga' => {$r['bobot']['harga']}, 'berat' => {$r['bobot']['berat']}, 'ram' => {$r['bobot']['ram']}, 'storage' => {$r['bobot']['storage']}, 'processor' => {$r['bobot']['prosesor']}, 'baterai' => {$r['bobot']['baterai']}];\n";
    $output .= "        \$skorData[] = ['responden_id' => $id, 'harga_label' => '{$r['skor']['harga_label']}', 'berat_label' => '{$r['skor']['berat_label']}', 'ram_label' => '{$r['skor']['ram_label']}', 'storage_label' => '{$r['skor']['storage_label']}', 'processor_label' => '{$r['skor']['processor_label']}', 'baterai_label' => '{$r['skor']['baterai_label']}', 'harga_skor' => {$r['skor']['harga_skor']}, 'berat_skor' => {$r['skor']['berat_skor']}, 'ram_skor' => {$r['skor']['ram_skor']}, 'storage_skor' => {$r['skor']['storage_skor']}, 'processor_skor' => {$r['skor']['processor_skor']}, 'baterai_skor' => {$r['skor']['baterai_skor']}];\n";
}

$output .= "\n        \$this->db->table('responden')->insertBatch(\$respondenData);\n";
$output .= "        \$this->db->table('bobot_kriteria')->insertBatch(\$bobotData);\n";
$output .= "        \$this->db->table('skor_laptop')->insertBatch(\$skorData);\n";
$output .= "    }\n}\n";

file_put_contents('app/Database/Seeds/RespondenSeeder.php', $output);
echo "Seeder generated.";
