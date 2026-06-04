<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- Main Content Area -->
<main class="max-w-full px-6 py-6">
<!-- Hero Section -->
<section class="bg-primary-container rounded-2xl p-10 mb-6 flex flex-col md:flex-row items-center justify-between gap-10 overflow-hidden relative text-white">
<div class="absolute inset-0 bg-white/5 pointer-events-none"></div>
<div class="z-10 max-w-xl">
<h1 class="text-4xl font-extrabold mb-4 leading-tight">Temukan Laptop Gaming Terbaik Sesuai Preferensimu</h1>
<p class="text-on-primary-container/80 text-lg mb-8">Sistem Pendukung Keputusan berbasis metode ARAS untuk memilih hardware gaming yang tepat berdasarkan kriteria teknis dan anggaran Anda.</p>
<div class="flex flex-wrap gap-4">
<a href="<?= base_url('responden') ?>" class="bg-white text-primary font-bold px-8 py-3 rounded-xl shadow-md hover:bg-surface-container-lowest transition-colors flex items-center gap-2">
<span class="material-symbols-outlined">assignment</span> Survei Laptop
</a>
<a href="<?= base_url('eksperimen') ?>" class="bg-benefit text-white font-bold px-8 py-3 rounded-xl shadow-md hover:brightness-110 transition-colors flex items-center gap-2">
<span class="material-symbols-outlined">science</span> Eksperimen Mandiri
</a>
</div>
</div>
<div class="relative w-full md:w-1/3 aspect-[4/3] rounded-xl overflow-hidden shadow-2xl border-4 border-white/10">
<img alt="Hero Image" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6W9298eDRa_lP3jcmprBVjxpdEtzxVi_WUnl6kv87H1QwZ2dpKHn4TSVoMuB61lAvFW16X65kt9zKws6-g9WLxUnGYaIhdimyGrumgmXTo4FCQ-QUI_codfLzx9mVmaT5bBppC_kDojsTI_o1vtaa--IJIrzFTL0B-7SzT2mWLMxtaTLVKlvwdnjUn7cm2EYHWaj3Wh3Sa1bRqCUICI17CAZHsrkC-WeVcCzOLUl9QpA6G1k-6vxOrqJ7ojQBNHNhra5NOBoTDJU">
</div>
</section>
<!-- Summary Cards (4 cols) -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
<div class="bg-white p-6 rounded-2xl border border-outline-variant shadow-sm">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-lg bg-secondary-container/30 flex items-center justify-center text-primary">
<span class="material-symbols-outlined">groups</span>
</div>
<span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Total Responden</span>
</div>
<p class="text-3xl font-extrabold text-on-surface"><?= esc($totalResponden) ?></p>
<p class="text-benefit text-xs font-bold flex items-center gap-1 mt-2">
<span class="material-symbols-outlined text-sm">trending_up</span> Data Aktif
                </p>
</div>
<div class="bg-white p-6 rounded-2xl border border-outline-variant shadow-sm">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-lg bg-tertiary-container/10 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined">calendar_month</span>
</div>
<span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Rata Usia</span>
</div>
<p class="text-3xl font-extrabold text-on-surface"><?= esc($rataUsia) ?> <span class="text-base font-medium text-on-surface-variant">Thn</span></p>
<p class="text-on-surface-variant text-xs mt-2">Rentang: <?= esc($minUsia) ?> - <?= esc($maxUsia) ?> thn</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-outline-variant shadow-sm">
<div class="flex items-center gap-3 mb-4">
<div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-secondary">
<span class="material-symbols-outlined">school</span>
</div>
<span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Status Terbanyak</span>
</div>
<p class="text-3xl font-extrabold text-on-surface truncate" title="<?= esc($statusTerbanyak['status']) ?>"><?= esc($statusTerbanyak['status']) ?></p>
<p class="text-on-surface-variant text-xs mt-2"><?= esc($statusTerbanyak['persen']) ?>% dari total data</p>
</div>
</div>
<!-- Visuals Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
<div class="bg-white p-8 rounded-2xl border border-outline-variant shadow-sm">
<div class="flex justify-between items-center mb-8">
<h3 class="text-lg font-bold text-on-surface">Distribusi Status Responden</h3>
<span class="material-symbols-outlined text-on-surface-variant">donut_large</span>
</div>
<div class="flex flex-col sm:flex-row items-center justify-center gap-10">
<div class="relative w-40 h-40">
<svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
<circle cx="18" cy="18" fill="transparent" r="15.915" stroke="#e1e2ed" stroke-width="4"></circle>
<?php 
$offset = 0;
$colors = ['#004ac6', '#737686', '#c3c6d7']; 
foreach($statusData as $index => $stat): 
    $dash = $stat['persen'] . " " . (100 - $stat['persen']);
?>
<circle cx="18" cy="18" fill="transparent" r="15.915" stroke="<?= $colors[$index % count($colors)] ?>" stroke-dasharray="<?= $dash ?>" stroke-dashoffset="-<?= $offset ?>" stroke-width="4"></circle>
<?php 
    $offset += $stat['persen'];
endforeach; 
?>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center">
<span class="text-3xl font-extrabold text-on-surface"><?= esc($totalResponden) ?></span>
<span class="text-[10px] text-on-surface-variant font-bold uppercase tracking-widest">Total</span>
</div>
</div>
<div class="space-y-3">
<?php foreach($statusData as $index => $stat): ?>
<div class="flex items-center gap-3">
<div class="w-3 h-3 rounded-full" style="background-color: <?= $colors[$index % count($colors)] ?>"></div>
<span class="text-sm font-medium text-on-surface-variant"><?= esc($stat['name']) ?> (<?= esc($stat['total']) ?>)</span>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
<div class="bg-white p-8 rounded-2xl border border-outline-variant shadow-sm">
<div class="flex justify-between items-center mb-8">
<h3 class="text-lg font-bold text-on-surface">Rata-rata Bobot Kriteria</h3>
<span class="material-symbols-outlined text-on-surface-variant">align_horizontal_left</span>
</div>
<div class="space-y-5">
<?php 
foreach($bobotDisplay as $key => $bk): 
    $barColor = 'bg-benefit';
    $labelTampil = ($bk['label'] == 'Baterai') ? 'Baterai untuk ketahanan/jam' : $bk['label'];
?>
<div class="space-y-2">
<div class="flex justify-between text-xs font-bold text-on-surface-variant">
<span class=""><?= esc($labelTampil) ?></span>
<span class=""><?= esc($bk['persen']) ?>%</span>
</div>
<div class="h-2 w-full bg-surface-container rounded-full overflow-hidden">
<div class="h-full <?= $barColor ?> rounded-full" style="width: <?= esc($bk['width']) ?>%; transition: width 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);"></div>
</div>
</div>
<?php 
endforeach; 
?>
</div>
</div>
</div>
<!-- ARAS Flow: 8-stage horizontal infographic -->
<div class="bg-white p-6 rounded-2xl border border-outline-variant shadow-sm mb-6 overflow-x-auto">
<h3 class="text-sm font-bold text-on-surface-variant uppercase tracking-wider mb-8 text-center">ARAS Decision Matrix Lifecycle</h3>
<div class="flex items-center justify-between min-w-[800px] px-4 relative">
<div class="absolute top-6 left-10 right-10 h-0.5 bg-outline-variant/30 -z-10"></div>
<!-- Step 1 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">data_table</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Decision Matrix</span>
</div>
<!-- Step 2 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">grade</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Optimal Solution</span>
</div>
<!-- Step 3 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">rule</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Normalization</span>
</div>
<!-- Step 4 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">balance</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Weighting</span>
</div>
<!-- Step 5 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">functions</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Optimality Fn</span>
</div>
<!-- Step 6 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">analytics</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Degree of Utility</span>
</div>
<!-- Step 7 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary border-2 border-white shadow-sm">
<span class="material-symbols-outlined text-lg">format_list_numbered</span>
</div>
<span class="text-[10px] font-bold text-on-surface text-center">Final Ranking</span>
</div>
<!-- Step 8 -->
<div class="flex flex-col items-center gap-3">
<div class="w-12 h-12 rounded-full bg-benefit/20 flex items-center justify-center text-benefit border-2 border-benefit/20 shadow-sm">
<span class="material-symbols-outlined text-lg">verified</span>
</div>
<span class="text-[10px] font-bold text-benefit text-center">Best Selection</span>
</div>
</div>
</div>
<!-- Top 3 Ranking Section -->
<div class="mb-8">
<div class="flex items-center justify-between mb-6">
<h3 class="text-xl font-extrabold text-on-surface">Top 3 Peringkat (ARAS)</h3>
<a class="text-sm font-bold text-primary hover:underline flex items-center gap-1" href="<?= base_url('aras') ?>">
                    Lihat Hasil Lengkap <span class="material-symbols-outlined text-base">chevron_right</span>
</a>
</div>
<div class="space-y-4">
<?php foreach($top3 as $laptop): ?>
<div class="bg-white p-6 rounded-2xl border <?= $laptop['is_optimal'] ? 'border-l-4 border-l-primary' : '' ?> border-outline-variant shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
<div class="w-14 h-14 <?= $laptop['bg'] ?> <?= $laptop['text'] ?> font-black text-2xl flex items-center justify-center rounded-full shrink-0 shadow-inner"><?= $laptop['icon'] ?></div>
<div class="flex-grow">
<div class="flex items-center gap-3 mb-1">
<h4 class="text-lg font-bold text-on-surface"><?= esc($laptop['nama']) ?></h4>
<?php if($laptop['is_optimal']): ?>
<span class="bg-benefit/10 text-benefit text-[10px] font-black px-2 py-0.5 rounded-full uppercase">Optimal Selection</span>
<?php endif; ?>
</div>
<p class="text-on-surface-variant text-sm mb-4"><?= esc($laptop['spek']) ?></p>
<div class="flex items-center gap-4">
<div class="flex-grow h-2 bg-surface-container rounded-full overflow-hidden">
<div class="<?= $laptop['is_optimal'] ? 'ki-progress-gradient' : ($laptop['rank']==2 ? 'bg-outline' : 'bg-outline-variant') ?> h-full rounded-full" style="width: <?= $laptop['ki'] * 100 ?>%; transition: width 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);"></div>
</div>
<span class="<?= $laptop['is_optimal'] ? 'text-primary' : 'text-on-surface-variant' ?> font-mono-data text-sm font-bold">Ki: <?= esc($laptop['ki']) ?></span>
</div>
</div>
<button onclick="document.getElementById('modal-<?= $laptop['id'] ?>').classList.remove('hidden');" class="bg-surface-container-low group-hover:bg-primary group-hover:text-white px-6 py-2.5 rounded-xl text-sm font-bold transition-all">Detail</button>

<div id="modal-<?= $laptop['id'] ?>" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/50 backdrop-blur-sm transition-all p-4">
    <div class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden border border-outline-variant transform transition-all">
        <div class="p-6 border-b border-outline-variant flex justify-between items-center <?= $laptop['bg'] ?>">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 <?= $laptop['text'] ?> bg-white rounded-full flex items-center justify-center font-black text-2xl shadow-sm"><?= $laptop['icon'] ?></div>
                <div>
                    <h3 class="text-xl font-extrabold text-on-surface"><?= esc($laptop['nama']) ?></h3>
                    <p class="text-xs font-bold <?= $laptop['text'] ?>">Peringkat <?= $laptop['rank'] ?></p>
                </div>
            </div>
            <button onclick="document.getElementById('modal-<?= $laptop['id'] ?>').classList.add('hidden');" class="text-on-surface-variant hover:text-error transition-colors p-2 rounded-full hover:bg-surface-container"><span class="material-symbols-outlined">close</span></button>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-sm font-bold text-on-surface-variant uppercase tracking-wider mb-2">Spesifikasi Lengkap</p>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50">
                    <p class="text-xs text-on-surface-variant font-medium">Harga</p>
                    <p class="text-sm font-bold text-on-surface truncate" title="<?= esc($laptop['labels']['harga']) ?>"><?= esc($laptop['labels']['harga']) ?></p>
                </div>
                <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50">
                    <p class="text-xs text-on-surface-variant font-medium">Berat</p>
                    <p class="text-sm font-bold text-on-surface truncate" title="<?= esc($laptop['labels']['berat']) ?>"><?= esc($laptop['labels']['berat']) ?></p>
                </div>
                <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50">
                    <p class="text-xs text-on-surface-variant font-medium">RAM</p>
                    <p class="text-sm font-bold text-on-surface truncate" title="<?= esc($laptop['labels']['ram']) ?>"><?= esc($laptop['labels']['ram']) ?></p>
                </div>
                <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50">
                    <p class="text-xs text-on-surface-variant font-medium">Penyimpanan</p>
                    <p class="text-sm font-bold text-on-surface truncate" title="<?= esc($laptop['labels']['storage']) ?>"><?= esc($laptop['labels']['storage']) ?></p>
                </div>
                <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50">
                    <p class="text-xs text-on-surface-variant font-medium">Prosesor</p>
                    <p class="text-sm font-bold text-on-surface truncate" title="<?= esc($laptop['labels']['processor']) ?>"><?= esc($laptop['labels']['processor']) ?></p>
                </div>
                <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50">
                    <p class="text-xs text-on-surface-variant font-medium">Baterai (Ketahanan)</p>
                    <p class="text-sm font-bold text-on-surface truncate" title="<?= esc($laptop['labels']['baterai']) ?>"><?= esc($laptop['labels']['baterai']) ?></p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-outline-variant flex justify-between items-center">
                <span class="text-sm font-bold text-on-surface-variant">Skor Optimalitas (Ki)</span>
                <span class="text-3xl font-black <?= $laptop['text'] ?>"><?= esc($laptop['ki']) ?></span>
            </div>
            
            <div class="mt-6 border-t border-outline-variant pt-4">
                <button onclick="document.getElementById('aras-detail-<?= $laptop['id'] ?>').classList.toggle('hidden')" class="w-full flex justify-between items-center text-sm font-bold text-primary hover:text-primary-container transition-colors py-2">
                    <span>Lihat Langkah Perhitungan ARAS (Detail Matematis)</span>
                    <span class="material-symbols-outlined">expand_more</span>
                </button>
                <div id="aras-detail-<?= $laptop['id'] ?>" class="hidden mt-4 space-y-6 max-h-[350px] overflow-y-auto pr-2 pb-2">
                    
                    <!-- Tahap 1 -->
                    <div>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-2">1. Matriks Keputusan (X)</p>
                        <div class="grid grid-cols-3 gap-2">
                            <?php foreach(['harga'=>'Harga', 'berat'=>'Berat', 'ram'=>'RAM', 'storage'=>'Penyimpanan', 'processor'=>'Prosesor', 'baterai'=>'Baterai'] as $k => $l): ?>
                            <div class="bg-surface-container-lowest p-2 rounded-xl border border-outline-variant/50 text-center">
                                <p class="text-[10px] text-on-surface-variant font-medium"><?= $l ?></p>
                                <p class="text-sm font-bold text-on-surface"><?= $laptop['scores'][$k] ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Tahap 2 -->
                    <div>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-2">2. Alternatif Optimal (A0)</p>
                        <div class="grid grid-cols-3 gap-2">
                            <?php foreach(['harga'=>'Harga (Min)', 'berat'=>'Berat (Min)', 'ram'=>'RAM (Max)', 'storage'=>'Penyimpanan (Max)', 'processor'=>'Prosesor (Max)', 'baterai'=>'Baterai (Max)'] as $k => $l): ?>
                            <div class="bg-surface-container-lowest p-2 rounded-xl border border-outline-variant/50 text-center">
                                <p class="text-[10px] text-on-surface-variant font-medium"><?= $l ?></p>
                                <p class="text-sm font-bold text-on-surface"><?= $laptop['A0'][$k] ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Tahap 3 -->
                    <div>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-2">3. Normalisasi Matriks (R)</p>
                        <div class="grid grid-cols-3 gap-2">
                            <?php 
                            $cost = ['harga', 'berat'];
                            foreach(['harga'=>'Harga', 'berat'=>'Berat', 'ram'=>'RAM', 'storage'=>'Penyimpanan', 'processor'=>'Prosesor', 'baterai'=>'Baterai'] as $k => $l): 
                                $isCost = in_array($k, $cost);
                                $x = $laptop['scores'][$k];
                                $sum = round($laptop['sumR'][$k], 3);
                                $formula = $isCost ? "(1/$x) / $sum" : "$x / $sum";
                            ?>
                            <div class="bg-surface-container-lowest p-2 rounded-xl border border-outline-variant/50 text-center">
                                <p class="text-[10px] text-on-surface-variant font-medium mb-1"><?= $l ?></p>
                                <p class="text-[9px] text-primary bg-primary/10 rounded px-1 mb-1 font-mono" title="Rumus: <?= $formula ?>"><?= $formula ?></p>
                                <p class="text-sm font-bold text-on-surface"><?= round($laptop['R'][$k], 4) ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Tahap 4 -->
                    <div>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-2">4. Matriks Terbobot (D)</p>
                        <div class="grid grid-cols-3 gap-2">
                            <?php 
                            foreach(['harga'=>'Harga', 'berat'=>'Berat', 'ram'=>'RAM', 'storage'=>'Penyimpanan', 'processor'=>'Prosesor', 'baterai'=>'Baterai'] as $k => $l): 
                                $r = round($laptop['R'][$k], 4);
                                $w = round($laptop['W'][$k], 3);
                            ?>
                            <div class="bg-surface-container-lowest p-2 rounded-xl border border-outline-variant/50 text-center">
                                <p class="text-[10px] text-on-surface-variant font-medium mb-1"><?= $l ?></p>
                                <p class="text-[9px] text-primary bg-primary/10 rounded px-1 mb-1 font-mono" title="R × W = <?= $r ?> × <?= $w ?>"><?= $r ?> × <?= $w ?></p>
                                <p class="text-sm font-bold text-on-surface"><?= round($laptop['D'][$k], 4) ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Tahap 5 & 6 -->
                    <div>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-2">5 & 6. Fungsi Optimalitas</p>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50 flex flex-col justify-center">
                                <p class="text-[10px] text-on-surface-variant font-medium mb-1">Si (Total D alternatif)</p>
                                <p class="text-[9px] text-primary bg-primary/10 rounded px-1 mb-1 font-mono w-max">Σ D (seluruh kriteria)</p>
                                <p class="text-lg font-bold text-on-surface"><?= round($laptop['Si'], 4) ?></p>
                            </div>
                            <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50 flex flex-col justify-center">
                                <p class="text-[10px] text-on-surface-variant font-medium mb-1">S0 (Total D optimal)</p>
                                <p class="text-[9px] text-primary bg-primary/10 rounded px-1 mb-1 font-mono w-max">Σ D (dari A0)</p>
                                <p class="text-lg font-bold text-on-surface"><?= round($laptop['S0'], 4) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tahap 7 & 8 -->
                    <div>
                        <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mb-2">7 & 8. Hasil Akhir</p>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-primary/10 p-3 rounded-xl border border-primary/20 flex flex-col justify-center">
                                <p class="text-[10px] text-primary font-bold mb-1">Tingkat Utilitas (Ki)</p>
                                <p class="text-[10px] text-primary bg-white/50 rounded px-1 mb-1 font-mono w-max"><?= round($laptop['Si'], 4) ?> / <?= round($laptop['S0'], 4) ?></p>
                                <p class="text-2xl font-black text-primary"><?= esc($laptop['ki']) ?></p>
                            </div>
                            <div class="bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/50 flex flex-col justify-center">
                                <p class="text-[10px] text-on-surface-variant font-medium mb-1">Ranking Akhir</p>
                                <p class="text-xl font-black text-on-surface">Ke-<?= esc($laptop['rank']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
</main>
<?= $this->endSection() ?>
