<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<main class="flex-1 overflow-y-auto bg-background p-6">
<header class="mb-8 mt-6">
<div class="flex items-center gap-2 mb-2">
<span class="px-2 py-0.5 bg-primary/10 text-primary rounded text-[10px] font-bold tracking-wider uppercase">SQA-v1.0 Blueprint</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface"><?= esc($pageTitle) ?></h1>
<p class="text-on-surface-variant font-body-md text-body-md max-w-3xl mt-2">Manajemen data survei dan preferensi kriteria dari responden terverifikasi untuk proses analisis MCDM.</p>
</header>
<div class="flex flex-col lg:flex-row gap-8">
    <!-- Filter Sidebar -->
    <aside class="w-full lg:w-72 flex-shrink-0 self-start sticky top-[92px]">
        <div class="bg-surface-container-low border border-outline-variant rounded-2xl p-6 max-h-[calc(100vh-120px)] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-on-surface text-lg">Filter Data</h3>
                <span class="material-symbols-outlined text-primary">filter_list</span>
            </div>
            <form action="<?= base_url('responden') ?>" method="GET">
                <!-- Pencarian -->
                <div class="mb-6">
                    <label class="block text-xs font-bold text-on-surface-variant mb-2 uppercase tracking-wider">Pencarian</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                        <input type="text" name="search" value="<?= isset($_GET['search']) ? esc($_GET['search']) : '' ?>" placeholder="Nama responden..." class="w-full pl-10 pr-4 py-2 bg-white border border-outline-variant rounded-lg text-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                    </div>
                </div>
                
                <!-- Status Responden -->
                <div class="mb-6">
                    <label class="block text-xs font-bold text-on-surface-variant mb-3 uppercase tracking-wider">Status Responden</label>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="status[]" value="Mahasiswa" <?= (isset($_GET['status']) && in_array('Mahasiswa', (array)$_GET['status'])) ? 'checked' : '' ?> class="w-4 h-4 rounded text-primary border-outline-variant focus:ring-primary">
                            <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Mahasiswa</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="status[]" value="Bekerja" <?= (isset($_GET['status']) && in_array('Bekerja', (array)$_GET['status'])) ? 'checked' : '' ?> class="w-4 h-4 rounded text-primary border-outline-variant focus:ring-primary">
                            <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Bekerja / Profesional</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="status[]" value="Lainnya" <?= (isset($_GET['status']) && in_array('Lainnya', (array)$_GET['status'])) ? 'checked' : '' ?> class="w-4 h-4 rounded text-primary border-outline-variant focus:ring-primary">
                            <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Lainnya (Gamer, dll)</span>
                        </label>
                    </div>
                </div>

                <!-- Rentang Usia -->
                <div class="mb-8">
                    <label class="block text-xs font-bold text-on-surface-variant mb-2 uppercase tracking-wider">Rentang Usia</label>
                    <select name="usia" class="w-full px-4 py-2 bg-white border border-outline-variant rounded-lg text-sm focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                        <option value="">Semua Usia</option>
                        <option value="18-22" <?= (isset($_GET['usia']) && $_GET['usia'] == '18-22') ? 'selected' : '' ?>>18 - 22 Tahun</option>
                        <option value="23-30" <?= (isset($_GET['usia']) && $_GET['usia'] == '23-30') ? 'selected' : '' ?>>23 - 30 Tahun</option>
                        <option value=">30" <?= (isset($_GET['usia']) && $_GET['usia'] == '>30') ? 'selected' : '' ?>>Di atas 30 Tahun</option>
                    </select>
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit" class="w-full py-2 bg-primary hover:bg-primary-container text-white text-sm font-bold rounded-lg transition-colors shadow-sm">
                        Terapkan Filter
                    </button>
                    <?php if(!empty($_GET)): ?>
                    <a href="<?= base_url('responden') ?>" class="w-full py-2 bg-white border border-outline-variant text-on-surface-variant hover:text-on-surface text-sm font-bold rounded-lg text-center transition-colors">
                        Reset Filter
                    </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </aside>

    <!-- Main Content Tab -->
    <div class="flex-grow min-w-0">
        <!-- Sub-Tabs -->
<div class="mb-8 border-b border-outline-variant flex items-center gap-8">
<button class="pb-3 border-b-2 border-primary text-primary font-label-md text-label-md transition-all active-tab-trigger" data-target="tab-identitas">Identitas</button>
<button class="pb-3 border-b-2 border-transparent text-on-surface-variant hover:text-primary font-label-md text-label-md transition-all active-tab-trigger" data-target="tab-bobot">Bobot Kriteria</button>
<button class="pb-3 border-b-2 border-transparent text-on-surface-variant hover:text-primary font-label-md text-label-md transition-all active-tab-trigger" data-target="tab-penilaian">Penilaian Laptop</button>
</div>
<div id="tab-content-container">

<!-- Tab: Identitas -->
<div class="tab-pane block" id="tab-identitas">
<div class="grid grid-cols-1 xl:grid-cols-12 gap-gutter">
<div class="xl:col-span-12">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden flex flex-col">
<div class="p-4 border-b border-outline-variant flex justify-between items-center bg-surface-container-low">
<h3 class="font-title-lg text-title-lg text-on-surface flex items-center gap-2">
<span class="material-symbols-outlined text-primary" data-icon="group">group</span>
                                    Daftar Responden
                                </h3>
<span class="bg-primary-container text-on-primary-container px-3 py-1 rounded-full text-label-md font-label-md">n=<?= $totalResponden ?> Total</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left zebra-table">
<thead class="bg-surface-container-high border-b border-outline-variant">
<tr>
<th class="px-6 py-3 font-label-md text-label-md text-on-surface">No</th>
<th class="px-6 py-3 font-label-md text-label-md text-on-surface">Nama Responden</th>
<th class="px-6 py-3 font-label-md text-label-md text-on-surface text-center">Usia</th>
<th class="px-6 py-3 font-label-md text-label-md text-on-surface">Status</th>
<th class="px-6 py-3 font-label-md text-label-md text-on-surface text-right">Tanggal Input</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<?php $no = 1 + ($currentPageIdentitas - 1) * $perPage; foreach($respondenIdentitas as $r): ?>
<?php 
    $statusColor = 'bg-primary text-on-primary';
    if ($r['status'] == 'Profesional' || $r['status'] == 'Bekerja') $statusColor = 'bg-outline text-white';
    if ($r['status'] == 'Gamer' || $r['status'] == 'Lainnya') $statusColor = 'bg-outline-variant text-on-surface';
?>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-6 py-4 text-body-sm font-mono-data"><?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?></td>
<td class="px-6 py-4 text-body-md font-semibold text-on-surface"><?= esc($r['nama']) ?></td>
<td class="px-6 py-4 text-body-sm text-center"><?= esc($r['usia']) ?></td>
<td class="px-6 py-4"><span class="px-2 py-1 <?= $statusColor ?> rounded-md text-[10px] font-bold uppercase tracking-wider"><?= esc($r['status']) ?></span></td>
<td class="px-6 py-4 text-right text-body-sm text-on-surface-variant"><?= date('d M Y', strtotime($r['created_at'])) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="p-4 border-t border-outline-variant bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-4">
    <span class="text-sm font-medium text-on-surface-variant">Menampilkan <?= count($respondenIdentitas) ?> dari <?= $totalResponden ?> responden</span>
    <?= $pager->links('identitas', 'custom_pager') ?>
</div>
</div>
</div>
</div>
</div>

<!-- Tab: Bobot Kriteria -->
<div class="tab-pane hidden" id="tab-bobot">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">
<div class="p-4 border-b border-outline-variant bg-surface-container-low flex justify-between items-center">
<div class="flex flex-col">
<h3 class="font-title-lg text-title-lg text-on-surface">Bobot Kriteria (W<sub>j</sub>)</h3>
<p class="text-body-sm text-on-surface-variant">Nilai preferensi subjektif dari setiap responden (Dinormalisasi)</p>
</div>
<div class="flex gap-2">
<a href="<?= base_url('responden/export') ?>" class="flex items-center gap-2 text-primary hover:bg-primary/10 px-4 py-2 rounded-lg font-label-md text-label-md transition-all">
<span class="material-symbols-outlined text-[18px]">download</span> Ekspor CSV
</a>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container-high border-b border-outline-variant">
<tr>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface">Responden</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">W1 (Harga)</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">W2 (Berat)</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">W3 (RAM)</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">W4 (Penyimpanan)</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">W5 (Prosesor)</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">W6 (Baterai)</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<?php foreach($respondenBobot as $r): ?>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-6 py-4 text-body-sm font-medium"><?= esc($r['nama']) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-sm"><?= number_format($r['w_harga'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-sm"><?= number_format($r['w_berat'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-sm"><?= number_format($r['w_ram'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-sm"><?= number_format($r['w_storage'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-sm"><?= number_format($r['w_processor'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-sm"><?= number_format($r['w_baterai'], 3) ?></td>
</tr>
<?php endforeach; ?>
<tr class="bg-primary/5 border-t-2 border-primary/20">
<td class="px-6 py-4 text-body-md font-bold text-primary">Rata-rata Bobot</td>
<td class="px-6 py-4 text-center font-mono-data text-body-md font-bold text-primary"><?= number_format($avgWeights['harga'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-md font-bold text-primary"><?= number_format($avgWeights['berat'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-md font-bold text-primary"><?= number_format($avgWeights['ram'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-md font-bold text-primary"><?= number_format($avgWeights['storage'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-md font-bold text-primary"><?= number_format($avgWeights['processor'], 3) ?></td>
<td class="px-6 py-4 text-center font-mono-data text-body-md font-bold text-primary"><?= number_format($avgWeights['baterai'], 3) ?></td>
</tr>
</tbody>
</table>
</div>
<div class="p-4 border-t border-outline-variant bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-4">
    <span class="text-sm font-medium text-on-surface-variant">Menampilkan <?= count($respondenBobot) ?> dari <?= $totalResponden ?> responden</span>
    <?= $pager->links('bobot', 'custom_pager') ?>
</div>
</div>
</div>

<!-- Tab: Penilaian Laptop -->
<div class="tab-pane hidden" id="tab-penilaian">
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">
<div class="p-4 border-b border-outline-variant bg-surface-container-low flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-title-lg text-title-lg text-on-surface">Matriks Penilaian (X<sub>ij</sub>)</h3>
<span class="material-symbols-outlined text-secondary text-[18px] cursor-help" title="Data teknis yang telah dikonversi ke skala ARAS">info</span>
</div>
<!-- Removed legend -->
</div>
<div class="flex items-center bg-surface-container-highest p-1 rounded-lg">
<button class="px-4 py-1.5 rounded-md text-label-md font-label-md bg-surface-container-lowest text-primary shadow-sm transition-all toggle-btn" data-type="label">Label</button>
<button class="px-4 py-1.5 rounded-md text-label-md font-label-md text-on-surface-variant hover:text-on-surface transition-all toggle-btn" data-type="score">Skor Numerik</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left" id="laptop-assessment-table">
<thead class="bg-surface-container-high border-b border-outline-variant">
<tr>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface">Responden / Laptop</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-primary" data-icon="payments">payments</span>
<span class="text-[10px]">C1: Harga</span>
</div>
</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-primary" data-icon="weight">weight</span>
<span class="text-[10px]">C2: Berat</span>
</div>
</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-primary" data-icon="memory">memory</span>
<span class="text-[10px]">C3: RAM</span>
</div>
</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-primary" data-icon="storage">storage</span>
<span class="text-[10px]">C4: Penyimpanan</span>
</div>
</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-primary" data-icon="developer_board">developer_board</span>
<span class="text-[10px]">C5: Prosesor</span>
</div>
</th>
<th class="px-6 py-4 font-label-md text-label-md text-on-surface text-center">
<div class="flex flex-col items-center">
<span class="material-symbols-outlined text-primary" data-icon="battery_full">battery_full</span>
<span class="text-[10px]">C6: Baterai</span>
</div>
</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<?php foreach($respondenPenilaian as $r): ?>
<tr class="hover:bg-primary/5 transition-colors">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded bg-surface-container-high flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[20px]">person</span>
</div>
<span class="font-semibold text-body-md"><?= esc($r['nama']) ?></span>
</div>
</td>
<td class="px-6 py-4 text-center">
<span class="cell-label px-2 py-0.5 bg-primary/10 text-primary rounded text-[11px] font-bold"><?= esc($r['harga_label']) ?></span>
<span class="cell-score hidden font-mono-data text-body-sm font-bold text-primary"><?= esc($r['harga_skor']) ?></span>
</td>
<td class="px-6 py-4 text-center">
<span class="cell-label px-2 py-0.5 bg-primary/10 text-primary rounded text-[11px] font-bold"><?= esc($r['berat_label']) ?></span>
<span class="cell-score hidden font-mono-data text-body-sm font-bold text-primary"><?= esc($r['berat_skor']) ?></span>
</td>
<td class="px-6 py-4 text-center">
<span class="cell-label px-2 py-0.5 bg-primary/10 text-primary rounded text-[11px] font-bold"><?= esc($r['ram_label']) ?></span>
<span class="cell-score hidden font-mono-data text-body-sm font-bold text-primary"><?= esc($r['ram_skor']) ?></span>
</td>
<td class="px-6 py-4 text-center">
<span class="cell-label px-2 py-0.5 bg-primary/10 text-primary rounded text-[11px] font-bold"><?= esc($r['storage_label']) ?></span>
<span class="cell-score hidden font-mono-data text-body-sm font-bold text-primary"><?= esc($r['storage_skor']) ?></span>
</td>
<td class="px-6 py-4 text-center">
<span class="cell-label px-2 py-0.5 bg-primary/10 text-primary rounded text-[11px] font-bold"><?= esc($r['processor_label']) ?></span>
<span class="cell-score hidden font-mono-data text-body-sm font-bold text-primary"><?= esc($r['processor_skor']) ?></span>
</td>
<td class="px-6 py-4 text-center">
<span class="cell-label px-2 py-0.5 bg-primary/10 text-primary rounded text-[11px] font-bold"><?= esc($r['baterai_label']) ?></span>
<span class="cell-score hidden font-mono-data text-body-sm font-bold text-primary"><?= esc($r['baterai_skor']) ?></span>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="p-4 border-t border-outline-variant bg-surface-container-low flex flex-col sm:flex-row items-center justify-between gap-4">
    <span class="text-sm font-medium text-on-surface-variant">Menampilkan <?= count($respondenPenilaian) ?> dari <?= $totalResponden ?> responden</span>
    <?= $pager->links('penilaian', 'custom_pager') ?>
</div>
</div>
</div>

</div>
    </div> <!-- end flex-grow -->
</div> <!-- end flex container -->
</div>
</main>

<script>
    // Tab switching logic
    const tabs = document.querySelectorAll('.active-tab-trigger');
    const panes = document.querySelectorAll('.tab-pane');

    // Restore active tab from sessionStorage if available
    const activeTabId = sessionStorage.getItem('activeRespondenTab');
    if (activeTabId) {
        tabs.forEach(t => {
            if (t.getAttribute('data-target') === activeTabId) {
                t.classList.remove('border-transparent', 'text-on-surface-variant');
                t.classList.add('border-primary', 'text-primary');
            } else {
                t.classList.add('border-transparent', 'text-on-surface-variant');
                t.classList.remove('border-primary', 'text-primary');
            }
        });
        panes.forEach(p => {
            if (p.id === activeTabId) {
                p.classList.add('block');
                p.classList.remove('hidden');
            } else {
                p.classList.add('hidden');
                p.classList.remove('block');
            }
        });
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-target');
            
            // Save to sessionStorage
            sessionStorage.setItem('activeRespondenTab', target);

            // Update tab styles
            tabs.forEach(t => {
                t.classList.remove('border-primary', 'text-primary');
                t.classList.add('border-transparent', 'text-on-surface-variant');
            });
            tab.classList.remove('border-transparent', 'text-on-surface-variant');
            tab.classList.add('border-primary', 'text-primary');

            panes.forEach(pane => {
                if (pane.id === target) {
                    pane.classList.remove('hidden');
                    pane.classList.add('block');
                } else {
                    pane.classList.remove('block');
                    pane.classList.add('hidden');
                }
            });
        });
    });

    // Toggle Label/Score & AJAX Pagination using Event Delegation
    document.addEventListener('click', function(e) {
        // Handle Toggle Label/Score
        const btn = e.target.closest('.toggle-btn');
        if (btn) {
            const type = btn.getAttribute('data-type');
            const tabPane = btn.closest('.tab-pane');
            
            const toggleBtns = tabPane.querySelectorAll('.toggle-btn');
            const labels = tabPane.querySelectorAll('.cell-label');
            const scores = tabPane.querySelectorAll('.cell-score');
            
            toggleBtns.forEach(b => {
                b.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-sm');
                b.classList.add('text-on-surface-variant');
            });
            btn.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm');
            btn.classList.remove('text-on-surface-variant');

            if (type === 'label') {
                labels.forEach(l => l.classList.remove('hidden'));
                scores.forEach(s => s.classList.add('hidden'));
            } else {
                labels.forEach(l => l.classList.add('hidden'));
                scores.forEach(s => s.classList.remove('hidden'));
            }
        }

        // Handle AJAX Pagination
        const link = e.target.closest('nav a');
        if (link && link.closest('.tab-pane')) {
            e.preventDefault();
            const url = link.href;
            
            const activePane = link.closest('.tab-pane');
            const paneId = activePane.id;
            
            activePane.style.opacity = '0.5';
            activePane.style.pointerEvents = 'none';
            
            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    const newPane = doc.getElementById(paneId);
                    if (newPane) {
                        activePane.innerHTML = newPane.innerHTML;
                    }
                    
                    activePane.style.opacity = '1';
                    activePane.style.pointerEvents = 'auto';
                    window.history.pushState({path: url}, '', url);
                })
                .catch(() => {
                    window.location.href = url; // Fallback
                });
        }
    });
</script>
<?= $this->endSection() ?>
