<?= $this->extend('layout/main') ?>
<?php
function renderCriteriaTable($kriteria, $index, $activeVal = 3) {
    $data = [
        'harga' => ['title' => 'Harga', 'c1' => ['text-blue-600 bg-blue-600/10', '1', '> Rp 25 Jt'], 'c2' => ['text-blue-600 bg-blue-600/10', '2', 'Rp 15 - 25 Jt'], 'c3' => ['text-blue-600 bg-blue-600/10', '3', '≤ Rp 15 Jt']],
        'berat' => ['title' => 'Berat', 'c1' => ['text-blue-600 bg-blue-600/10', '1', '> 2,5 kg'], 'c2' => ['text-blue-600 bg-blue-600/10', '2', '2,1 - 2,5 kg'], 'c3' => ['text-blue-600 bg-blue-600/10', '3', '≤ 2,0 kg']],
        'ram' => ['title' => 'RAM', 'c1' => ['text-blue-600 bg-blue-600/10', '1', '> 32 GB'], 'c2' => ['text-blue-600 bg-blue-600/10', '2', '8 - 16 GB'], 'c3' => ['text-blue-600 bg-blue-600/10', '3', '≤ 8 GB']],
        'storage' => ['title' => 'Storage', 'c1' => ['text-blue-600 bg-blue-600/10', '1', '≥ 1 TB'], 'c2' => ['text-blue-600 bg-blue-600/10', '2', '512 GB'], 'c3' => ['text-blue-600 bg-blue-600/10', '3', '≤ 256 GB']],
        'processor' => ['title' => 'Processor', 'c1' => ['text-blue-600 bg-blue-600/10', '1', 'Core i9/Ryzen 9'], 'c2' => ['text-blue-600 bg-blue-600/10', '2', 'Core i7/Ryzen 7'], 'c3' => ['text-blue-600 bg-blue-600/10', '3', 'Core i5/Ryzen 5']],
        'baterai' => ['title' => 'Baterai', 'c1' => ['text-blue-600 bg-blue-600/10', '1', '≥ 6 jam'], 'c2' => ['text-blue-600 bg-blue-600/10', '2', '3 - 5 jam'], 'c3' => ['text-blue-600 bg-blue-600/10', '3', '≤ 2 jam']]
    ];
    $d = $data[$kriteria];
    
    $btn1 = $activeVal == 1 ? 'bg-primary text-on-primary shadow-sm' : 'hover:bg-surface-container-highest';
    $btn2 = $activeVal == 2 ? 'bg-primary text-on-primary shadow-sm' : 'hover:bg-surface-container-highest';
    $btn3 = $activeVal == 3 ? 'bg-primary text-on-primary shadow-sm' : 'hover:bg-surface-container-highest';

    return '
    <div class="flex flex-col gap-2" data-kriteria="'.$kriteria.'">
        <div class="flex flex-col">
            <span class="text-sm font-bold text-on-surface">'.$d['title'].' (C'.$index.')</span>
            <div class="mt-1.5 flex flex-col gap-1 text-xs bg-surface-container-lowest border border-outline-variant/60 p-2.5 rounded-lg shadow-sm">
                <div class="flex justify-between items-center"><span class="font-bold '.$d['c1'][0].' px-2 py-0.5 rounded">1</span><span class="text-on-surface-variant font-medium">'.$d['c1'][2].'</span></div>
                <div class="flex justify-between items-center"><span class="font-bold '.$d['c2'][0].' px-2 py-0.5 rounded">2</span><span class="text-on-surface-variant font-medium">'.$d['c2'][2].'</span></div>
                <div class="flex justify-between items-center"><span class="font-bold '.$d['c3'][0].' px-2 py-0.5 rounded">3</span><span class="text-on-surface-variant font-medium">'.$d['c3'][2].'</span></div>
            </div>
        </div>
        <div class="flex bg-surface-container-high p-1 rounded-lg score-group">
            <button class="flex-1 py-1.5 text-xs font-bold rounded '.$btn1.'" data-val="1">1</button>
            <button class="flex-1 py-1.5 text-xs font-bold rounded '.$btn2.'" data-val="2">2</button>
            <button class="flex-1 py-1.5 text-xs font-bold rounded '.$btn3.'" data-val="3">3</button>
        </div>
    </div>';
}
?>
<?= $this->section('content') ?>
<main class="flex-1 p-gutter overflow-y-auto custom-scrollbar bg-background">
<div class="max-w-[1600px] mx-auto">
<div class="mb-stack-lg">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Eksperimen Mandiri</h1>
<p class="text-body-lg text-on-surface-variant">Konfigurasikan bobot kriteria dan bandingkan laptop pilihan Anda menggunakan framework ARAS.</p>
</div>

<div class="flex flex-col gap-gutter">
    <!-- Pengaturan Eksperimen Mandiri -->
    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-stack-lg shadow-sm">
        
        <!-- Bagian Alternatif Laptop (Cards) -->
        <div class="mb-stack-lg">
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-primary" data-icon="laptop_mac">laptop_mac</span>
                <h3 class="font-title-lg text-title-lg">Data Eksperimen Alternatif</h3>
            </div>

            <!-- Konfigurasi Tipe Kriteria -->
            <div class="mb-6 bg-surface-container-high p-4 rounded-xl border border-outline-variant shadow-sm">
                <div class="flex items-center gap-2 mb-3">
                    <span class="material-symbols-outlined text-primary text-sm" data-icon="tune">tune</span>
                    <h4 class="font-bold text-sm text-on-surface">Tipe Kriteria (Benefit / Cost)</h4>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3" id="criteria-type-container">
                    <?php 
                    $kriteriaNames = ['Harga' => 'harga', 'Berat' => 'berat', 'RAM' => 'ram', 'Storage' => 'storage', 'Processor' => 'processor', 'Baterai' => 'baterai'];
                    // Default mengikuti teori bahwa RAM, Storage, Proc, Baterai adalah Benefit, Harga, Berat adalah Cost. 
                    // Namun user bisa bebas menggantinya tanpa batasan.
                    $defaultTypes = ['harga' => 'cost', 'berat' => 'cost', 'ram' => 'benefit', 'storage' => 'benefit', 'processor' => 'benefit', 'baterai' => 'benefit']; 
                    foreach($kriteriaNames as $label => $key): 
                    ?>
                    <div class="flex flex-col bg-surface-container-lowest rounded-lg border border-outline-variant/60 p-2 shadow-sm type-group" data-kriteria="<?= $key ?>">
                        <span class="text-xs font-bold text-on-surface mb-2 text-center"><?= $label ?></span>
                        <div class="flex bg-surface-container-high p-1 rounded-md">
                            <button class="flex-1 py-1.5 text-[10px] font-bold rounded <?= $defaultTypes[$key] == 'benefit' ? 'bg-emerald-600 text-white shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-highest' ?>" data-type="benefit">Benefit</button>
                            <button class="flex-1 py-1.5 text-[10px] font-bold rounded <?= $defaultTypes[$key] == 'cost' ? 'bg-amber-500 text-white shadow-sm' : 'text-on-surface-variant hover:bg-surface-container-highest' ?>" data-type="cost">Cost</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div id="alternatif-container" class="flex flex-col gap-4 mb-6">
                <!-- Card Laptop 1 -->
                <div class="alt-row p-4 rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm relative group">
                    <div class="flex justify-between items-center mb-3">
                        <input class="text-title-md font-bold border-b border-dashed border-outline-variant bg-transparent focus:outline-none focus:border-primary w-1/2" type="text" value="ROG G14">
                        <button class="text-on-surface-variant/40 hover:text-error transition-colors btn-delete"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?= renderCriteriaTable('harga', 1, 3) ?>
                        <?= renderCriteriaTable('berat', 2, 3) ?>
                        <?= renderCriteriaTable('ram', 3, 3) ?>
                        <?= renderCriteriaTable('storage', 4, 3) ?>
                        <?= renderCriteriaTable('processor', 5, 3) ?>
                        <?= renderCriteriaTable('baterai', 6, 3) ?>
                    </div>
                </div>

                <!-- Card Laptop 2 -->
                <div class="alt-row p-4 rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm relative group">
                    <div class="flex justify-between items-center mb-3">
                        <input class="text-title-md font-bold border-b border-dashed border-outline-variant bg-transparent focus:outline-none focus:border-primary w-1/2" type="text" value="Legion 7i">
                        <button class="text-on-surface-variant/40 hover:text-error transition-colors btn-delete"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?= renderCriteriaTable('harga', 1, 2) ?>
                        <?= renderCriteriaTable('berat', 2, 3) ?>
                        <?= renderCriteriaTable('ram', 3, 2) ?>
                        <?= renderCriteriaTable('storage', 4, 2) ?>
                        <?= renderCriteriaTable('processor', 5, 2) ?>
                        <?= renderCriteriaTable('baterai', 6, 2) ?>
                    </div>
                </div>
            </div>

            <!-- Action Bar -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-stack-sm pt-4 border-t border-outline-variant">
                <button id="btn-tambah" class="bg-surface border-2 border-dashed border-primary text-primary py-3 rounded-xl font-bold hover:bg-primary/10 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" data-icon="add">add</span> Tambah
                </button>
                <button id="btn-hitung" class="bg-primary text-on-primary py-3 rounded-xl font-bold shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined" data-icon="calculate">calculate</span> Hitung ARAS
                </button>
                <button id="btn-reset" class="bg-surface border border-outline-variant text-on-surface-variant py-3 rounded-xl font-bold hover:bg-surface-container-high transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl" data-icon="refresh">refresh</span> Refresh / Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Preview Hasil & Analisis -->
    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden flex flex-col">
        <!-- Result Header -->
        <div class="p-6 border-b border-outline-variant flex justify-between items-center bg-surface-container-low/50">
            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary" data-icon="analytics">analytics</span>
                    <h3 class="font-title-lg text-title-lg">Preview Hasil &amp; Analisis</h3>
                </div>
                <button id="btn-show-analisis" class="hidden bg-secondary-container text-on-secondary-container px-4 py-1.5 rounded-full text-xs font-bold hover:bg-primary hover:text-on-primary transition-colors flex items-center gap-1 shadow-sm">
                    <span class="material-symbols-outlined text-[16px]" data-icon="troubleshoot">troubleshoot</span> Analisis Perhitungan ARAS
                </button>
            </div>
            <div id="status-badge" class="flex items-center gap-2 text-label-md font-label-md text-on-surface-variant bg-surface-container-high px-3 py-1 rounded-full border border-outline-variant">
                <span class="material-symbols-outlined text-sm" data-icon="pending">pending</span> Menunggu Kalkulasi
            </div>
        </div>

        <!-- Progress Stepper (Simulated) -->
        <div class="p-6 bg-surface-container-low/30 border-b border-outline-variant">
            <div class="flex justify-between items-center mb-4">
                <span class="text-[10px] font-black uppercase tracking-widest text-on-surface-variant/60">Proses Kalkulasi (8 Tahap)</span>
                <span id="step-label" class="text-xs font-bold text-primary">Siap</span>
            </div>
            <div class="flex gap-2" id="stepper-bars">
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
                <div class="h-1.5 flex-1 rounded-full bg-surface-container-highest"></div>
            </div>
        </div>

        <div class="p-gutter flex-1 flex flex-col gap-8 min-h-[300px]">
            <!-- Ranking Progress Bars -->
            <div class="space-y-6">
                <div class="flex justify-between items-end">
                    <h4 class="font-label-md text-label-md text-on-surface uppercase tracking-widest">Peringkat Alternatif</h4>
                    <span class="text-[10px] font-bold text-on-surface-variant/40">SKALA OPTIMUM 1.0</span>
                </div>
                <div class="space-y-5" id="ranking-container">
                    <div class="text-center text-on-surface-variant text-sm py-8 border-2 border-dashed border-outline-variant rounded-xl">
                        Tekan tombol "Hitung ARAS" untuk melihat hasil peringkat.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Analisis ARAS -->
<div id="modal-analisis" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-on-background/50 backdrop-blur-sm transition-opacity opacity-0">
    <div class="bg-surface w-11/12 max-w-5xl h-[90vh] rounded-2xl shadow-xl flex flex-col overflow-hidden transform scale-95 transition-transform duration-300">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
            <h3 class="font-title-lg text-title-lg text-primary flex items-center gap-2">
                <span class="material-symbols-outlined text-xl">troubleshoot</span> Detail Perhitungan ARAS
            </h3>
            <button id="btn-close-modal" class="text-on-surface-variant hover:text-error transition-colors flex items-center justify-center w-8 h-8 rounded-full hover:bg-error/10">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <!-- Body -->
        <div class="p-6 flex-1 overflow-y-auto custom-scrollbar bg-background text-sm text-on-surface space-y-8" id="modal-body-analisis">
            <!-- Isi akan dirender via JS -->
        </div>
    </div>
</div>

</main>

<script>
    // Event delegation for score segmented buttons in Alternatif cards
    document.getElementById('alternatif-container').addEventListener('click', function(e) {
        if (e.target.tagName === 'BUTTON' && e.target.closest('.score-group')) {
            const parent = e.target.closest('.score-group');
            parent.querySelectorAll('button').forEach(b => {
                b.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
                b.classList.add('hover:bg-surface-container-highest');
            });
            e.target.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
            e.target.classList.remove('hover:bg-surface-container-highest');
        }
    });

    // Add Row (Card) logic
    document.getElementById('btn-tambah').addEventListener('click', function() {
        const container = document.getElementById('alternatif-container');
        const div = document.createElement('div');
        div.className = 'alt-row p-4 rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm relative group animate-fade-in';

        const criteriaHTML = ['harga', 'berat', 'ram', 'storage', 'processor', 'baterai'].map((k, i) => {
            const data = {
                'harga': { title: 'Harga', c1: ['text-blue-600 bg-blue-600/10', '1', '> Rp 25 Jt'], c2: ['text-blue-600 bg-blue-600/10', '2', 'Rp 15 - 25 Jt'], c3: ['text-blue-600 bg-blue-600/10', '3', '≤ Rp 15 Jt'] },
                'berat': { title: 'Berat', c1: ['text-blue-600 bg-blue-600/10', '1', '> 2,5 kg'], c2: ['text-blue-600 bg-blue-600/10', '2', '2,1 - 2,5 kg'], c3: ['text-blue-600 bg-blue-600/10', '3', '≤ 2,0 kg'] },
                'ram': { title: 'RAM', c1: ['text-blue-600 bg-blue-600/10', '1', '> 32 GB'], c2: ['text-blue-600 bg-blue-600/10', '2', '8 - 16 GB'], c3: ['text-blue-600 bg-blue-600/10', '3', '≤ 8 GB'] },
                'storage': { title: 'Storage', c1: ['text-blue-600 bg-blue-600/10', '1', '≥ 1 TB'], c2: ['text-blue-600 bg-blue-600/10', '2', '512 GB'], c3: ['text-blue-600 bg-blue-600/10', '3', '≤ 256 GB'] },
                'processor': { title: 'Processor', c1: ['text-blue-600 bg-blue-600/10', '1', 'Core i9/Ryzen 9'], c2: ['text-blue-600 bg-blue-600/10', '2', 'Core i7/Ryzen 7'], c3: ['text-blue-600 bg-blue-600/10', '3', 'Core i5/Ryzen 5'] },
                'baterai': { title: 'Baterai', c1: ['text-blue-600 bg-blue-600/10', '1', '≥ 6 jam'], c2: ['text-blue-600 bg-blue-600/10', '2', '3 - 5 jam'], c3: ['text-blue-600 bg-blue-600/10', '3', '≤ 2 jam'] }
            };
            const d = data[k];
            return `
            <div class="flex flex-col gap-2" data-kriteria="${k}">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-on-surface">${d.title} (C${i+1})</span>
                    <div class="mt-1.5 flex flex-col gap-1 text-xs bg-surface-container-lowest border border-outline-variant/60 p-2.5 rounded-lg shadow-sm">
                        <div class="flex justify-between items-center"><span class="font-bold ${d.c1[0]} px-2 py-0.5 rounded">1</span><span class="text-on-surface-variant font-medium">${d.c1[2]}</span></div>
                        <div class="flex justify-between items-center"><span class="font-bold ${d.c2[0]} px-2 py-0.5 rounded">2</span><span class="text-on-surface-variant font-medium">${d.c2[2]}</span></div>
                        <div class="flex justify-between items-center"><span class="font-bold ${d.c3[0]} px-2 py-0.5 rounded">3</span><span class="text-on-surface-variant font-medium">${d.c3[2]}</span></div>
                    </div>
                </div>
                <div class="flex bg-surface-container-high p-1 rounded-lg score-group">
                    <button class="flex-1 py-1.5 text-xs font-bold rounded hover:bg-surface-container-highest" data-val="1">1</button>
                    <button class="flex-1 py-1.5 text-xs font-bold rounded bg-primary text-on-primary shadow-sm" data-val="2">2</button>
                    <button class="flex-1 py-1.5 text-xs font-bold rounded hover:bg-surface-container-highest" data-val="3">3</button>
                </div>
            </div>`;
        }).join('');

        div.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <input class="text-title-md font-bold border-b border-dashed border-outline-variant bg-transparent focus:outline-none focus:border-primary w-1/2" type="text" value="Laptop Baru">
                <button class="text-on-surface-variant/40 hover:text-error transition-colors btn-delete"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                ${criteriaHTML}
            </div>
        `;
        container.appendChild(div);
    });

    // Event Delegation for Delete Row
    document.getElementById('alternatif-container').addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete')) {
            const row = e.target.closest('.alt-row');
            row.remove();
        }
    });

    // Reset button
    document.getElementById('btn-reset').addEventListener('click', function() {
        if(confirm("Anda yakin ingin mereset semua input?")) {
            window.location.reload();
        }
    });

    // Type Configurator Logic
    document.querySelectorAll('.type-group button').forEach(btn => {
        btn.addEventListener('click', function() {
            const group = this.closest('.type-group');
            group.querySelectorAll('button').forEach(b => {
                b.classList.remove('bg-emerald-600', 'bg-amber-500', 'text-white', 'shadow-sm');
                b.classList.add('text-on-surface-variant', 'hover:bg-surface-container-highest');
            });
            this.classList.remove('text-on-surface-variant', 'hover:bg-surface-container-highest');
            if (this.dataset.type === 'benefit') {
                this.classList.add('bg-emerald-600', 'text-white', 'shadow-sm');
            } else {
                this.classList.add('bg-amber-500', 'text-white', 'shadow-sm');
            }
        });
    });

    // Calculate ARAS logic
    document.getElementById('btn-hitung').addEventListener('click', function() {
        const btn = this;
        btn.innerHTML = `<span class="material-symbols-outlined animate-spin" data-icon="sync">sync</span> Menghitung...`;
        btn.disabled = true;

        // Collect alternatives
        const alternatives = [];
        document.querySelectorAll('.alt-row').forEach(row => {
            const name = row.querySelector('input').value || 'Laptop';
            const scores = {};
            row.querySelectorAll('[data-kriteria]').forEach(div => {
                const key = div.getAttribute('data-kriteria');
                const activeBtn = div.querySelector('.score-group button.bg-primary');
                scores[key] = activeBtn ? activeBtn.getAttribute('data-val') : "2";
            });
            alternatives.push({nama: name, scores: scores});
        });

        // Collect types
        const types = {};
        document.querySelectorAll('.type-group').forEach(group => {
            const kriteria = group.dataset.kriteria;
            const activeBtn = group.querySelector('button.text-white');
            types[kriteria] = activeBtn ? activeBtn.dataset.type : 'benefit';
        });

        if(alternatives.length < 2) {
            alert('Minimal perlu 2 alternatif untuk membandingkan!');
            btn.innerHTML = `<span class="material-symbols-outlined" data-icon="calculate">calculate</span> Hitung ARAS`;
            btn.disabled = false;
            return;
        }

        // Simulate Progress Stepper UI
        const stepLabel = document.getElementById('step-label');
        const bars = document.querySelectorAll('#stepper-bars > div');
        let currentStep = 0;
        
        bars.forEach(b => b.className = 'h-1.5 flex-1 rounded-full bg-surface-container-highest');

        const stepInterval = setInterval(() => {
            if (currentStep < 8) {
                bars[currentStep].className = 'h-1.5 flex-1 rounded-full bg-primary animate-pulse';
                if(currentStep > 0) bars[currentStep-1].className = 'h-1.5 flex-1 rounded-full bg-primary';
                stepLabel.innerText = `Tahap ${currentStep + 1}...`;
                currentStep++;
            } else {
                clearInterval(stepInterval);
                bars[7].className = 'h-1.5 flex-1 rounded-full bg-primary';
                stepLabel.innerText = `Selesai`;
                
                // Fetch AJAX
                fetch('<?= base_url('eksperimen/calculate') ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                    },
                    body: JSON.stringify({alternatives: alternatives, types: types})
                })
                .then(response => response.json())
                .then(res => {
                    if (res.status === 'success') {
                        window.lastArasResult = res.data;
                        document.getElementById('btn-show-analisis').classList.remove('hidden');
                        renderRanking(res.data);
                        document.getElementById('status-badge').className = 'flex items-center gap-2 text-label-md font-label-md text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100';
                        document.getElementById('status-badge').innerHTML = '<span class="material-symbols-outlined text-sm" data-icon="check_circle">check_circle</span> Perhitungan Sukses';
                    } else {
                        alert(res.message);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan sistem saat menghitung.");
                })
                .finally(() => {
                    btn.innerHTML = `<span class="material-symbols-outlined" data-icon="calculate">calculate</span> Hitung ARAS`;
                    btn.disabled = false;
                });
            }
        }, 100);
    });

    function renderRanking(data) {
        const container = document.getElementById('ranking-container');
        container.innerHTML = '';
        
        data.forEach((laptop, index) => {
            let bgClass = 'bg-surface-container-highest text-on-surface-variant';
            let barClass = 'bg-outline-variant';
            let kiColor = 'text-on-surface-variant';
            let rankHtml = laptop.rank;
            let opacityClass = (laptop.rank > 2 && data.length > 3) ? 'opacity-70' : '';

            if (laptop.rank === 1) {
                bgClass = 'bg-primary text-on-primary';
                barClass = 'bg-primary';
                kiColor = 'text-primary';
                rankHtml = '1';
            } else if (laptop.rank === 2) {
                bgClass = 'bg-surface-container-highest text-on-surface-variant';
                barClass = 'bg-secondary opacity-60';
                rankHtml = '2';
            }

            const widthPercent = (laptop.ki * 100).toFixed(1);

            container.innerHTML += `
            <div class="space-y-2 ${opacityClass} animate-fade-in" style="animation-delay: ${index * 0.1}s">
                <div class="flex justify-between text-body-sm items-center">
                    <div class="flex items-center gap-2">
                        <span class="w-5 h-5 flex items-center justify-center ${bgClass} rounded-full text-[10px] font-black">${rankHtml}</span>
                        <span class="font-bold text-on-surface">${laptop.nama}</span>
                    </div>
                    <span class="font-mono-data font-bold ${kiColor}">${parseFloat(laptop.ki).toFixed(4)}</span>
                </div>
                <div class="h-4 w-full bg-surface-container-highest rounded-full overflow-hidden">
                    <div class="h-full ${barClass} rounded-full transition-all duration-1000" style="width: 0%;" data-target-width="${widthPercent}%"></div>
                </div>
            </div>
            `;
        });

        // Trigger animation after DOM update
        setTimeout(() => {
            container.querySelectorAll('[data-target-width]').forEach(bar => {
                bar.style.width = bar.getAttribute('data-target-width');
            });
        }, 50);
    }

    // Modal Analisis Logic
    const modal = document.getElementById('modal-analisis');
    const btnShow = document.getElementById('btn-show-analisis');
    const btnClose = document.getElementById('btn-close-modal');

    btnShow.addEventListener('click', () => {
        renderAnalisisData();
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.querySelector('div').classList.remove('scale-95');
        }, 10);
    });

    btnClose.addEventListener('click', () => {
        modal.classList.add('opacity-0');
        modal.querySelector('div').classList.add('scale-95');
        setTimeout(() => modal.classList.add('hidden'), 300);
    });

    function renderAnalisisData() {
        const data = window.lastArasResult;
        if (!data || data.length === 0) return;

        const body = document.getElementById('modal-body-analisis');
        const criteria = ['harga', 'berat', 'ram', 'storage', 'processor', 'baterai'];
        
        let html = '';

        // 1. Matriks Keputusan (X)
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm">
        <h4 class="font-title-md font-bold text-primary mb-3">1. Pembentukan Matriks Keputusan (X)</h4>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr><th class="p-3 border-b">Alternatif</th>`;
        criteria.forEach(c => html += `<th class="p-3 border-b uppercase">${c}</th>`);
        html += `</tr></thead><tbody class="text-xs">`;
        data.forEach(alt => {
            html += `<tr><td class="p-3 border-b font-bold bg-surface-container-lowest">${alt.nama}</td>`;
            criteria.forEach(c => html += `<td class="p-3 border-b">${alt.scores[c]}</td>`);
            html += `</tr>`;
        });
        html += `</tbody></table></div></div>`;

        // 2. A0
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm">
        <h4 class="font-title-md font-bold text-primary mb-3">2. Menentukan Alternatif Optimal (A0)</h4>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr><th class="p-3 border-b">Nilai Optimal</th>`;
        criteria.forEach(c => html += `<th class="p-3 border-b uppercase">${c}</th>`);
        html += `</tr></thead><tbody class="text-xs"><tr><td class="p-3 border-b font-bold text-primary bg-primary/10">A0</td>`;
        criteria.forEach(c => html += `<td class="p-3 border-b font-bold text-primary bg-primary/5">${data[0].A0[c]}</td>`);
        html += `</tr></tbody></table></div></div>`;

        // 3. Normalisasi (R)
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm">
        <h4 class="font-title-md font-bold text-primary mb-3">3. Normalisasi Matriks Keputusan (R)</h4>
        <div class="p-3 bg-surface-container-low rounded-lg mb-4 text-xs flex flex-col gap-1 border border-outline-variant/60">
            <div><span class="font-bold text-emerald-600">Benefit:</span> Nilai dibagi total nilai pada kolom bersangkutan (X / Sum(X)).</div>
            <div><span class="font-bold text-amber-600">Cost:</span> Menggunakan invers (1/X) kemudian dibagi total invers ( (1/X) / Sum(1/X) ).</div>
        </div>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr><th class="p-3 border-b">Alternatif</th>`;
        criteria.forEach(c => html += `<th class="p-3 border-b uppercase">${c}</th>`);
        html += `</tr></thead><tbody class="text-xs font-mono-data">`;
        data.forEach(alt => {
            html += `<tr><td class="p-3 border-b font-bold bg-surface-container-lowest font-sans">${alt.nama}</td>`;
            criteria.forEach(c => html += `<td class="p-3 border-b">${alt.R[c].toFixed(4)}</td>`);
            html += `</tr>`;
        });
        html += `</tbody></table></div></div>`;

        // 4. Terbobot (D)
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm">
        <h4 class="font-title-md font-bold text-primary mb-3">4. Menghitung Matriks Ternormalisasi Terbobot (D)</h4>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr><th class="p-3 border-b">Alternatif</th>`;
        criteria.forEach(c => html += `<th class="p-3 border-b uppercase">${c}</th>`);
        html += `</tr></thead><tbody class="text-xs font-mono-data">`;
        data.forEach(alt => {
            html += `<tr><td class="p-3 border-b font-bold bg-surface-container-lowest font-sans">${alt.nama}</td>`;
            criteria.forEach(c => html += `<td class="p-3 border-b">${alt.D[c].toFixed(5)}</td>`);
            html += `</tr>`;
        });
        html += `</tbody></table></div></div>`;

        // 5. Si
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-primary">
        <h4 class="font-title-md font-bold text-primary mb-3">5. Menentukan Nilai Fungsi Optimalitas (Si)</h4>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr>
            <th class="p-3 border-b w-1/2">Alternatif</th>
            <th class="p-3 border-b w-1/2">Si (Jumlah D)</th>
        </tr></thead><tbody class="text-xs">`;
        data.forEach(alt => {
            html += `<tr>
                <td class="p-3 border-b font-bold">${alt.nama}</td>
                <td class="p-3 border-b font-mono-data text-primary font-bold">${alt.Si.toFixed(4)}</td>
            </tr>`;
        });
        html += `</tbody></table></div></div>`;

        // 6. S0
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-primary">
        <h4 class="font-title-md font-bold text-primary mb-3">6. Menentukan Nilai Fungsi Alternatif Optimal (S0)</h4>
        <div class="p-3 bg-primary/10 rounded-lg text-sm border border-primary/20 flex items-center justify-between">
            <span class="font-bold text-primary">S0 (Nilai Ideal Terbaik)</span>
            <span class="font-mono-data text-xl font-bold text-primary">${data[0].S0.toFixed(4)}</span>
        </div>
        </div>`;

        // 7. Ki
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-primary">
        <h4 class="font-title-md font-bold text-primary mb-3">7. Menghitung Tingkat Utilitas (Ki)</h4>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr>
            <th class="p-3 border-b w-1/2">Alternatif</th>
            <th class="p-3 border-b w-1/2 bg-emerald-50 text-emerald-800">Ki = (Si / S0)</th>
        </tr></thead><tbody class="text-xs">`;
        data.forEach(alt => {
            html += `<tr>
                <td class="p-3 border-b font-bold">${alt.nama}</td>
                <td class="p-3 border-b font-mono-data text-emerald-600 font-bold bg-emerald-50/50">${alt.ki.toFixed(4)}</td>
            </tr>`;
        });
        html += `</tbody></table></div></div>`;

        // 8. Ranking
        html += `<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-primary">
        <h4 class="font-title-md font-bold text-primary mb-3">8. Menentukan Ranking</h4>
        <div class="overflow-x-auto"><table class="w-full text-left border-collapse bg-white border border-outline-variant rounded-lg">
        <thead class="bg-surface-container-low text-xs"><tr>
            <th class="p-3 border-b">Rank</th>
            <th class="p-3 border-b">Alternatif</th>
            <th class="p-3 border-b text-emerald-800">Tingkat Utilitas (Ki)</th>
        </tr></thead><tbody class="text-xs">`;
        
        const sorted = [...data].sort((a, b) => b.ki - a.ki);
        sorted.forEach((alt, idx) => {
            html += `<tr>
                <td class="p-3 border-b font-bold text-primary text-base">#${idx+1}</td>
                <td class="p-3 border-b font-bold text-base">${alt.nama}</td>
                <td class="p-3 border-b font-mono-data font-bold text-emerald-600 text-base">${alt.ki.toFixed(4)}</td>
            </tr>`;
        });
        html += `</tbody></table></div></div>`;

        body.innerHTML = html;
    }
</script>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.4s ease-out forwards;
}
</style>
<?= $this->endSection() ?>
