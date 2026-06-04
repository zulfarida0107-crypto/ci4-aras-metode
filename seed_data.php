<?php
$content = file_get_contents(__DIR__ . '/SurveiData.md');

// Match each respondent block
preg_match_all('/### Responden \d+: (.*?)\s*\((.*?),\s*(\w+|\d+) tahun\)(.*?)(?=### Responden|$)/s', $content, $matches, PREG_SET_ORDER);

$db = new mysqli('localhost', 'root', '', 'spk_aras');

// Clean DB
$db->query("SET FOREIGN_KEY_CHECKS=0;");
$db->query("TRUNCATE TABLE skor_laptop;");
$db->query("TRUNCATE TABLE bobot_kriteria;");
$db->query("TRUNCATE TABLE responden;");
$db->query("SET FOREIGN_KEY_CHECKS=1;");

foreach ($matches as $match) {
    $nama = $db->real_escape_string(trim($match[1]));
    $statusRaw = strtolower(trim($match[2]));
    $usia = (int) trim($match[3]);
    
    if (strpos($statusRaw, 'mahasiswa') !== false) {
        $status = 'Mahasiswa';
    } elseif (strpos($statusRaw, 'bekerja') !== false) {
        $status = 'Bekerja';
    } else {
        $status = 'Lainnya';
    }
    
    $body = $match[4];
    
    // Extract Bobot
    preg_match('/Harga: (\d+) \| Berat: (\d+) \| RAM: (\d+) \| Penyimpanan: (\d+) \| Prosesor: (\d+) \| Baterai: (\d+)/', $body, $bobot);
    
    // Extract Spesifikasi
    preg_match('/\*\*Spesifikasi Laptop Yang Dipilih\/Dimiliki:\*\*\s*- Harga: (.*?)\n- Berat: (.*?)\n- RAM: (.*?)\n- Penyimpanan: (.*?)\n- Prosesor: (.*?)\n- Baterai: (.*?)(?:\n|$)/s', $body, $spek);
    
    if (empty($bobot) || empty($spek)) {
        echo "Failed to parse $nama\n";
        continue;
    }
    
    $db->query("INSERT INTO responden (nama, usia, status) VALUES ('$nama', $usia, '$status')");
    $responden_id = $db->insert_id;
    
    $db->query("INSERT INTO bobot_kriteria (responden_id, harga, berat, ram, storage, processor, baterai) 
        VALUES ($responden_id, {$bobot[1]}, {$bobot[2]}, {$bobot[3]}, {$bobot[4]}, {$bobot[5]}, {$bobot[6]})");
        
    // Konversi Skor berdasarkan MetodeARAS.md (Dummy logic for now)
    // Here we just insert the labels.
    $hargaL = $db->real_escape_string(trim($spek[1]));
    $beratL = $db->real_escape_string(trim($spek[2]));
    $ramL = $db->real_escape_string(trim($spek[3]));
    $storageL = $db->real_escape_string(trim($spek[4]));
    $procL = $db->real_escape_string(trim($spek[5]));
    $batL = $db->real_escape_string(trim($spek[6]));
    
    // Simple parsing to skor based on ranges
    // Harga (Cost): >25jt=1, 15-25jt=2, <=15jt=3
    $hargaS = strpos($hargaL, '>25') !== false ? 1 : (strpos($hargaL, '15 juta - 25') !== false ? 2 : 3);
    // Berat (Cost): >2.5kg=1, 2.1-2.5kg=2, <=2kg=3
    $beratS = strpos($beratL, '>2,5') !== false || strpos($beratL, '>2.5') !== false ? 1 : (strpos($beratL, '2,1') !== false ? 2 : 3);
    // RAM (Benefit): <=8GB=1, 8-16GB=2, >32GB=4 (wait, 16-32=3?) Let's say: <=8=1, 8-16=2, 16-32=3, >32=4
    $ramS = strpos($ramL, '<= 8') !== false || strpos($ramL, '≤ 8') !== false ? 1 : (strpos($ramL, '8 - 16') !== false ? 2 : (strpos($ramL, '> 32') !== false ? 4 : 3));
    // Storage (Benefit): <=256=1, 512=2, >=1TB=3
    $storageS = strpos($storageL, '256') !== false ? 1 : (strpos($storageL, '512') !== false ? 2 : 3);
    // Processor (Benefit): i3=1, i5=2, i7=3, i9=4
    $procS = strpos($procL, 'i9') !== false ? 4 : (strpos($procL, 'i7') !== false ? 3 : (strpos($procL, 'i5') !== false ? 2 : 1));
    // Baterai (Benefit): <=2=1, 3-5=2, >=6=3
    $batS = strpos($batL, '<= 2') !== false || strpos($batL, '≤ 2') !== false ? 1 : (strpos($batL, '3') !== false ? 2 : 3);
    
    $db->query("INSERT INTO skor_laptop (responden_id, harga_label, berat_label, ram_label, storage_label, processor_label, baterai_label, harga_skor, berat_skor, ram_skor, storage_skor, processor_skor, baterai_skor) 
        VALUES ($responden_id, '$hargaL', '$beratL', '$ramL', '$storageL', '$procL', '$batL', $hargaS, $beratS, $ramS, $storageS, $procS, $batS)");
        
    echo "Inserted $nama\n";
}
echo "Done seeding database.\n";
