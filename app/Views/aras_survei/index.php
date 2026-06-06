<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
    .math-font {
        font-family: 'serif';
        font-style: italic;
    }
    .custom-scrollbar::-webkit-scrollbar {
        height: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    .highlight-a0 {
        outline: 2px solid #d4af37;
        background-color: rgba(212, 175, 55, 0.05);
    }
    
    /* Print styles */
    @media print {
        body {
            background-color: white !important;
            padding: 0;
            margin: 0;
        }
        header, aside, footer, .no-print {
            display: none !important;
        }
        main, .flex-grow {
            margin: 0 !important;
            padding: 0 !important;
        }
        .shadow-sm, .shadow-md, .shadow-lg {
            box-shadow: none !important;
        }
        .border {
            border-color: #000 !important;
        }
        .bg-surface-container-lowest {
            border: none !important;
            margin-bottom: 20px !important;
        }
        /* Make table look like standard print table */
        table {
            border-collapse: collapse !important;
            width: 100% !important;
        }
        th, td {
            border: 1px solid #000 !important;
            padding: 4px 8px !important;
            font-size: 10pt !important;
        }
        .print-title {
            font-size: 14pt !important;
            font-weight: bold !important;
            margin-bottom: 8px !important;
            color: #000 !important;
        }
    }

</style>

<main class="max-w-full px-6 py-6 printable-container">
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-4 no-print">
        <div>
            <h1 class="font-headline-lg text-3xl font-bold text-on-surface mb-2">Hasil ARAS Survei</h1>
            <p class="text-on-surface-variant max-w-2xl text-body-md">Menampilkan detail 8 tahapan perhitungan Metode ARAS berdasarkan data kuesioner dari 24 responden.</p>
        </div>
        <div class="flex gap-3">
            <button onclick="window.print()" class="px-5 py-2.5 border border-outline text-on-surface rounded-lg font-semibold hover:bg-surface-container-low transition-colors flex items-center gap-2 text-sm">
                <span class="material-symbols-outlined text-[18px]">print</span>
                Ekspor PDF
            </button>
            <a href="<?= base_url('aras') ?>" class="px-5 py-2.5 bg-primary text-on-primary rounded-lg font-semibold hover:opacity-90 shadow-md transition-all flex items-center gap-2 text-sm">
                <span class="material-symbols-outlined text-[18px]">refresh</span>
                Hitung Ulang
            </a>
        </div>
    </div>

    <?php if(!empty($results)): 
        $top = $results[0];
    ?>
    <!-- Interpretation Panel -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 no-print">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-outline-variant p-6 flex flex-col md:flex-row gap-6 relative overflow-hidden shadow-sm">
            <div class="absolute top-0 right-0 p-4">
                <span class="bg-emerald-100 text-emerald-800 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest border border-emerald-200">Pilihan Rekomendasi</span>
            </div>
            <div class="w-full md:w-56 h-40 md:h-full bg-surface-container-low rounded-xl overflow-hidden flex-shrink-0 border border-outline-variant flex items-center justify-center">
                <span class="material-symbols-outlined text-6xl text-primary opacity-50">laptop_mac</span>
            </div>
            <div class="flex-1 flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-on-surface mb-2"><?= esc($top['nama']) ?></h2>
                <p class="text-on-surface-variant text-sm mb-6">Tingkat utilitas tertinggi (<span class="math-font">K<sub>i</sub></span> = <?= number_format($top['ki'], 4) ?>). Alternatif ini menunjukkan efisiensi maksimum dibandingkan dengan referensi optimal.</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="p-3 bg-surface-container-low border border-outline-variant rounded-lg">
                        <p class="text-[9px] uppercase font-bold text-on-surface-variant mb-1">Utilitas (Ki)</p>
                        <p class="text-base font-mono-data text-primary"><?= number_format($top['ki'], 4) ?></p>
                    </div>
                    <div class="p-3 bg-surface-container-low border border-outline-variant rounded-lg">
                        <p class="text-[9px] uppercase font-bold text-on-surface-variant mb-1">Optimalitas (Si)</p>
                        <p class="text-base font-mono-data text-primary"><?= number_format($top['Si'], 5) ?></p>
                    </div>
                    <div class="p-3 bg-surface-container-low border border-outline-variant rounded-lg">
                        <p class="text-[9px] uppercase font-bold text-on-surface-variant mb-1">Peringkat</p>
                        <p class="text-lg font-bold text-on-surface">#1</p>
                    </div>
                    <div class="p-3 bg-surface-container-low border border-outline-variant rounded-lg">
                        <p class="text-[9px] uppercase font-bold text-on-surface-variant mb-1">Persentase</p>
                        <p class="text-base font-bold text-emerald-600"><?= number_format($top['ki'] * 100, 2) ?>%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-primary-container text-on-primary-container rounded-2xl p-6 flex flex-col justify-between shadow-sm">
            <div>
                <h3 class="font-bold text-lg mb-4">Ringkasan Metode</h3>
                <p class="text-sm opacity-90 mb-6 leading-relaxed">Metode ARAS (Additive Ratio Assessment) menentukan tingkat utilitas dengan menghitung rasio optimalitas setiap alternatif terhadap solusi ideal (S0). Rumus: <b>S<sub>i</sub> = Σ (r<sub>ij</sub> × w<sub>j</sub>)</b> dan <b>K<sub>i</sub> = S<sub>i</sub> / S<sub>0</sub></b>.</p>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-white/10">
                <span class="material-symbols-outlined text-[20px]">info</span>
                <span class="text-[11px] font-bold uppercase tracking-wider">A0 = Titik Referensi Optimal</span>
            </div>
        </div>
    </div>

    <!-- 8 TAHAP PERHITUNGAN -->
    <div class="space-y-8">
        
        <!-- Step 1: Matrix X -->
        <div id="step-1" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm page-break-before">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">1</div>
                    <h4 class="text-lg font-bold text-on-surface">Pembentukan Matriks Keputusan (X)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Langkah pertama adalah membentuk matriks keputusan berukuran <i>m x n</i>. Setiap baris mewakili alternatif laptop dan setiap kolom mewakili kriteria. Rumus: <b>X = [x<sub>ij</sub>]<sub>m×n</sub></b>. Nilai x<sub>ij</sub> adalah nilai mentah atau hasil konversi spesifikasi menjadi skor angka.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">1. Pembentukan Matriks Keputusan (X)</h4>
            </div>

            <div id="table-1" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-surface-container-low text-on-surface border-b border-outline-variant">
                            <th class="px-6 py-3 font-bold">Alternatif</th>
                            <?php foreach($types as $k => $t): ?>
                            <th class="px-6 py-3 font-bold uppercase"><?= $k ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach($pagedX as $alt): ?>
                        <tr class="hover:bg-surface-container-highest transition-colors">
                            <td class="px-6 py-3 font-medium"><?= $alt['id'] ?> - <?= esc($alt['nama']) ?></td>
                            <?php foreach($types as $k => $t): ?>
                            <td class="px-6 py-3 font-mono-data"><?= number_format($alt['scores'][$k], 2) ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant flex justify-end no-print pager-wrapper" data-step="table-1">
                <?= $pagerX ?>
            </div>
        </div>

        <!-- Step 2: A0 -->
        <div id="step-2" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">2</div>
                    <h4 class="text-lg font-bold text-on-surface">Menentukan Alternatif Optimal (A0)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Menentukan nilai optimal pada setiap kriteria. Rumus: <b>A<sub>0</sub> = max(x<sub>ij</sub>)</b> untuk kriteria Benefit, dan <b>A<sub>0</sub> = min(x<sub>ij</sub>)</b> untuk kriteria Cost.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">2. Menentukan Alternatif Optimal (A0)</h4>
            </div>

            <div id="table-2" class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-amber-50 text-amber-900 border-b border-amber-200">
                            <th class="px-6 py-3 font-bold">Optimal</th>
                            <?php foreach($types as $k => $t): ?>
                            <th class="px-6 py-3 font-bold uppercase"><?= $k ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-amber-50/30">
                            <td class="px-6 py-3 font-bold text-amber-800">A<sub>0</sub></td>
                            <?php foreach($types as $k => $t): ?>
                            <td class="px-6 py-3 font-mono-data text-amber-700 font-bold"><?= number_format($A0[$k], 2) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Step 3: Matrix R -->
        <div id="step-3" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm page-break-before">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">3</div>
                    <h4 class="text-lg font-bold text-on-surface">Normalisasi Matriks Keputusan (R)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Mengubah seluruh rentang nilai ke skala yang seragam [0, 1] agar dapat dikalikan dengan bobot. Rumus: <b>r<sub>ij</sub> = x<sub>ij</sub> / Σ x<sub>ij</sub></b> untuk kriteria Benefit, dan <b>r<sub>ij</sub> = (1/x<sub>ij</sub>) / Σ (1/x<sub>ij</sub>)</b> untuk kriteria Cost.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">3. Normalisasi Matriks Keputusan (R)</h4>
            </div>

            <div id="table-3" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-emerald-50 text-emerald-900 border-b border-emerald-200">
                            <th class="px-6 py-3 font-bold">Alternatif</th>
                            <?php foreach($types as $k => $t): ?>
                            <th class="px-6 py-3 font-bold uppercase">R (<?= substr($k, 0, 3) ?>)</th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach($pagedR as $alt): ?>
                        <tr class="hover:bg-emerald-50/30 transition-colors">
                            <td class="px-6 py-3 font-medium"><?= $alt['id'] ?></td>
                            <?php foreach($types as $k => $t): ?>
                            <td class="px-6 py-3 font-mono-data"><?= number_format($alt['R'][$k], 6) ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant flex justify-end no-print pager-wrapper" data-step="table-3">
                <?= $pagerR ?>
            </div>
        </div>

        <!-- Step 4: Matrix D -->
        <div id="step-4" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">4</div>
                    <h4 class="text-lg font-bold text-on-surface">Menghitung Matriks Ternormalisasi Terbobot (D)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Menimbang atau memberi bobot pada matriks normalisasi. Setiap elemen dalam matriks R dikalikan dengan bobot relatif (w) dari masing-masing kriteria. Rumus: <b>D<sub>ij</sub> = r<sub>ij</sub> × w<sub>j</sub></b>. Nilai w didapat dari pembobotan skala 1-3 oleh responden yang dinormalisasi.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">4. Menghitung Matriks Ternormalisasi Terbobot (D)</h4>
            </div>

            <div id="table-4" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-surface-container-low text-on-surface border-b border-outline-variant">
                            <th class="px-6 py-3 font-bold">Alternatif</th>
                            <?php foreach($types as $k => $t): ?>
                            <th class="px-6 py-3 font-bold uppercase text-[10px]">D (<?= $k ?>) <br><span class="font-normal text-on-surface-variant no-print">w=<?= number_format($W_norm[$k] ?? 0, 3) ?></span></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach($pagedD as $alt): ?>
                        <tr class="hover:bg-surface-container-highest transition-colors">
                            <td class="px-6 py-3 font-medium"><?= $alt['id'] ?></td>
                            <?php foreach($types as $k => $t): ?>
                            <td class="px-6 py-3 font-mono-data"><?= number_format($alt['D'][$k], 6) ?></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant flex justify-end no-print pager-wrapper" data-step="table-4">
                <?= $pagerD ?>
            </div>
        </div>

        <!-- Step 5: Si -->
        <div id="step-5" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">5</div>
                    <h4 class="text-lg font-bold text-on-surface">Menentukan Nilai Fungsi Optimalitas (Si)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Nilai fungsi optimalitas (Si) menunjukkan performa total setiap alternatif yang didapatkan dengan menjumlahkan seluruh elemen matriks D pada baris tersebut. Rumus: <b>S<sub>i</sub> = Σ D<sub>ij</sub></b>. Semakin besar nilai Si, semakin baik alternatif tersebut.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">5. Menentukan Nilai Fungsi Optimalitas (Si)</h4>
            </div>

            <div id="table-5" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-surface-container-low text-on-surface border-b border-outline-variant">
                            <th class="px-6 py-3 font-bold">Alternatif</th>
                            <th class="px-6 py-3 font-bold text-center text-primary">Si (Optimalitas)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach($pagedSi as $alt): ?>
                        <tr class="hover:bg-surface-container-highest transition-colors">
                            <td class="px-6 py-3 font-medium"><?= $alt['id'] ?> - <?= esc($alt['nama']) ?></td>
                            <td class="px-6 py-3 font-mono-data text-center text-primary font-bold"><?= number_format($alt['Si'], 6) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant flex justify-end no-print pager-wrapper" data-step="table-5">
                <?= $pagerSi ?>
            </div>
        </div>

        <!-- Step 6: S0 -->
        <div id="step-6" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">6</div>
                    <h4 class="text-lg font-bold text-on-surface">Menentukan Nilai Fungsi Alternatif Optimal (S0)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Menghitung jumlah keseluruhan performa (Si) untuk alternatif idaman/optimal (A0). Rumus: <b>S<sub>0</sub> = Σ D<sub>0j</sub></b>. Nilai S0 merepresentasikan skor terbaik mutlak yang mungkin diraih dan menjadi batas ambang 100% efisiensi.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">6. Menentukan Nilai Fungsi Alternatif Optimal (S0)</h4>
            </div>

            <div id="table-6" class="p-6 bg-white flex flex-col items-center justify-center no-print">
                <div class="inline-flex flex-col items-center px-8 py-4 bg-emerald-50 border border-emerald-200 rounded-2xl">
                    <span class="text-sm font-bold text-emerald-800 uppercase tracking-widest mb-1">Nilai S0</span>
                    <span class="text-3xl font-mono-data font-black text-emerald-600"><?= number_format($S0, 6) ?></span>
                </div>
            </div>
            <div class="hidden print:block p-4">
                <p class="font-bold text-emerald-600">Nilai S0 = <?= number_format($S0, 6) ?></p>
            </div>
        </div>

        <!-- Step 7: Ki -->
        <div id="step-7" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">7</div>
                    <h4 class="text-lg font-bold text-on-surface">Menghitung Tingkat Utilitas (Ki)</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Tingkat utilitas mengukur sejauh mana sebuah alternatif mendekati nilai alternatif optimal (ideal). Rumus: <b>K<sub>i</sub> = S<sub>i</sub> / S<sub>0</sub></b>. Hasilnya akan berada pada rentang [0, 1].
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">7. Menghitung Tingkat Utilitas (Ki)</h4>
            </div>

            <div id="table-7" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-surface-container-low text-on-surface border-b border-outline-variant">
                            <th class="px-6 py-3 font-bold">Alternatif</th>
                            <th class="px-6 py-3 font-bold text-center">Si (Optimalitas)</th>
                            <th class="px-6 py-3 font-bold text-center">S0 (Referensi)</th>
                            <th class="px-6 py-3 font-bold text-center text-primary">Ki (Utilitas)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach($pagedKi as $alt): ?>
                        <tr class="hover:bg-surface-container-highest transition-colors">
                            <td class="px-6 py-3 font-medium"><?= $alt['id'] ?></td>
                            <td class="px-6 py-3 font-mono-data text-center"><?= number_format($alt['Si'], 6) ?></td>
                            <td class="px-6 py-3 font-mono-data text-center text-on-surface-variant"><?= number_format($S0, 6) ?></td>
                            <td class="px-6 py-3 font-mono-data text-center font-bold text-primary"><?= number_format($alt['ki'], 6) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant flex justify-end no-print pager-wrapper" data-step="table-7">
                <?= $pagerKi ?>
            </div>
        </div>

        <!-- Step 8: Ranking -->
        <div id="step-8" class="bg-white border border-outline-variant rounded-2xl overflow-hidden shadow-sm page-break-before">
            <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-low no-print">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold">8</div>
                    <h4 class="text-lg font-bold text-on-surface">Menentukan Ranking</h4>
                </div>
            </div>
            <div class="p-4 bg-white border-b border-outline-variant no-print">
                <p class="text-sm text-on-surface-variant">
                    <b>Penjelasan Rumus & Materi:</b> Langkah terakhir adalah merangking seluruh alternatif berdasarkan tingkat utilitas (Ki). Rumus: <b>Persentase = K<sub>i</sub> × 100%</b>. Alternatif dengan persentase terbesar menjadi peringkat 1, yang menunjukkan bahwa laptop tersebut merupakan pilihan paling efisien.
                </p>
            </div>
            <div class="hidden print:block p-2">
                <h4 class="print-title">8. Menentukan Ranking</h4>
            </div>

            <div id="table-8" class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-surface-container-low text-on-surface border-b border-outline-variant">
                            <th class="px-6 py-4 font-bold text-[11px] uppercase tracking-widest w-20">Peringkat</th>
                            <th class="px-6 py-4 font-bold text-[11px] uppercase tracking-widest">Alternatif</th>
                            <th class="px-6 py-4 font-bold text-[11px] uppercase tracking-widest">Utilitas (Ki)</th>
                            <th class="px-6 py-4 font-bold text-[11px] uppercase tracking-widest">Persentase</th>
                            <th class="px-6 py-4 font-bold text-[11px] uppercase tracking-widest no-print">Visualisasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        <?php foreach($pagedRank as $res): ?>
                        <tr class="hover:bg-primary/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="w-8 h-8 rounded-full <?= $res['is_optimal'] ? 'bg-primary text-white' : 'bg-surface-container-high text-on-surface-variant border border-outline-variant' ?> flex items-center justify-center font-bold text-sm"><?= $res['rank'] ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-on-surface"><?= $res['id'] ?> - <?= esc($res['nama']) ?></span>
                                    <span class="text-[11px] text-on-surface-variant"><?= esc($res['spek']) ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono-data <?= $res['is_optimal'] ? 'font-bold text-primary' : 'text-on-surface-variant' ?>">
                                <?= number_format($res['ki'], 6) ?>
                            </td>
                            <td class="px-6 py-4 font-mono-data <?= $res['is_optimal'] ? 'font-bold text-emerald-600' : 'text-on-surface-variant' ?>">
                                <?= number_format($res['ki'] * 100, 2) ?>%
                            </td>
                            <td class="px-6 py-4 no-print">
                                <div class="flex flex-col gap-2 w-full max-w-[160px]">
                                    <div class="h-2 bg-surface-container-high rounded-full overflow-hidden">
                                        <div class="h-full <?= $res['is_optimal'] ? 'bg-emerald-500' : ($res['ki'] > 0.8 ? 'bg-emerald-400' : 'bg-primary/40') ?> rounded-full ki-progress-gradient" style="width: <?= $res['ki'] * 100 ?>%"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant flex justify-end no-print pager-wrapper" data-step="table-8">
                <?= $pagerRank ?>
            </div>
        </div>

    </div>
    <?php else: ?>
        <div class="text-center p-12 bg-white rounded-2xl border border-outline-variant shadow-sm no-print">
            <span class="material-symbols-outlined text-4xl text-on-surface-variant mb-4">hourglass_empty</span>
            <p class="text-on-surface-variant font-medium">Belum ada data untuk dihitung.</p>
        </div>
    <?php endif; ?>
</main>

<script>
    document.querySelectorAll('tbody tr').forEach(row => {
        row.style.transition = 'all 0.2s ease-in-out';
    });

    // Handle AJAX Pagination for tables
    document.addEventListener('click', function(e) {
        const link = e.target.closest('.pager-wrapper a');
        if (link) {
            e.preventDefault();
            const url = link.href;
            
            const wrapper = link.closest('.pager-wrapper');
            const stepId = wrapper.getAttribute('data-step');
            const targetContainer = document.getElementById(stepId);
            if (!targetContainer) {
                window.location.href = url;
                return;
            }
            
            const stepDiv = targetContainer.closest('div[id^="step-"]');
            if (!stepDiv) {
                window.location.href = url;
                return;
            }
            
            stepDiv.style.opacity = '0.5';
            stepDiv.style.pointerEvents = 'none';
            
            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    const newStep = doc.getElementById(stepDiv.id);
                    if (newStep) {
                        stepDiv.innerHTML = newStep.innerHTML;
                        
                        // Re-apply transitions
                        stepDiv.querySelectorAll('tbody tr').forEach(row => {
                            row.style.transition = 'all 0.2s ease-in-out';
                        });
                    }
                    
                    stepDiv.style.opacity = '1';
                    stepDiv.style.pointerEvents = 'auto';
                    window.history.pushState({path: url}, '', url);
                })
                .catch(() => {
                    window.location.href = url; // Fallback
                });
        }
    });
</script>
<?= $this->endSection() ?>
