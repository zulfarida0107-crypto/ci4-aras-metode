/**
 * ============================================
 * SPK ARAS - Eksperimen Mandiri (Tab 4)
 * ============================================
 * Menangani logika UI interaktif untuk eksperimen:
 * - Update nilai bobot slider
 * - Toggle tipe kriteria (Cost/Benefit)
 * - Tambah/Hapus baris laptop dinamis
 * - Perhitungan ARAS (Client-side fallback)
 * - Visualisasi hasil dengan Chart.js
 * ============================================
 */

document.addEventListener('DOMContentLoaded', function() {
    // ===== 1. INISIALISASI VARIABEL & EVENT LISTENER =====
    const tbodyAlternatif = document.getElementById('tbody-alternatif');
    const btnTambah = document.getElementById('btn-tambah-laptop');
    const btnHitung = document.getElementById('btn-hitung-aras');
    const altCount = document.getElementById('alt-count');
    
    // Bind event ke slider bobot
    document.querySelectorAll('.bobot-slider').forEach(slider => {
        slider.addEventListener('input', function() {
            const id = this.id.replace('bobot_', 'val_');
            document.getElementById(id).textContent = this.value;
        });
    });

    // Bind event ke toggle tipe kriteria (Cost/Benefit)
    document.querySelectorAll('.tipe-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            const currentType = this.getAttribute('data-tipe');
            const newType = currentType === 'cost' ? 'benefit' : 'cost';
            
            this.setAttribute('data-tipe', newType);
            this.querySelector('.tipe-text').textContent = newType === 'cost' ? 'Cost' : 'Benefit';
            this.querySelector('.tipe-icon').textContent = newType === 'cost' ? '↓' : '↑';
            
            if (newType === 'cost') {
                this.classList.remove('bg-emerald-100', 'dark:bg-emerald-900/40', 'text-emerald-600', 'dark:text-emerald-400');
                this.classList.add('bg-red-100', 'dark:bg-red-900/40', 'text-red-600', 'dark:text-red-400');
            } else {
                this.classList.remove('bg-red-100', 'dark:bg-red-900/40', 'text-red-600', 'dark:text-red-400');
                this.classList.add('bg-emerald-100', 'dark:bg-emerald-900/40', 'text-emerald-600', 'dark:text-emerald-400');
            }
        });
    });

    // Bind event tambah laptop
    btnTambah.addEventListener('click', addLaptopRow);

    // Bind event hapus menggunakan event delegation
    tbodyAlternatif.addEventListener('click', function(e) {
        const btnHapus = e.target.closest('.btn-hapus');
        if (btnHapus) {
            removeLaptopRow(btnHapus.closest('tr'));
        }
    });

    // Bind event hitung
    btnHitung.addEventListener('click', prosesHitungARAS);

    // Bind event toggle detail tabel
    const btnToggleDetail = document.getElementById('btn-toggle-detail');
    if(btnToggleDetail) {
        btnToggleDetail.addEventListener('click', function() {
            const detailContainer = document.getElementById('detail-tabel');
            const chevron = document.getElementById('detail-chevron');
            detailContainer.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180');
        });
    }


    // ===== 2. MANAJEMEN BARIS ALTERNATIF =====
    function addLaptopRow() {
        const rows = tbodyAlternatif.querySelectorAll('tr');
        const nextNo = rows.length + 1;
        
        const tr = document.createElement('tr');
        tr.className = 'alt-row hover:bg-slate-50 dark:hover:bg-surface-700/30 transition-colors';
        tr.innerHTML = `
            <td class="px-3 py-2 text-slate-500 dark:text-slate-400 font-medium alt-no">${nextNo}</td>
            <td class="px-3 py-2"><input type="text" class="alt-nama w-full px-3 py-1.5 text-sm rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" placeholder="Nama laptop..."></td>
            <td class="px-3 py-2"><input type="number" value="1" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="harga"></td>
            <td class="px-3 py-2"><input type="number" value="1" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="berat"></td>
            <td class="px-3 py-2"><input type="number" value="1" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="ram"></td>
            <td class="px-3 py-2"><input type="number" value="1" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="storage"></td>
            <td class="px-3 py-2"><input type="number" value="1" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="processor"></td>
            <td class="px-3 py-2"><input type="number" value="1" min="1" max="5" class="alt-skor w-full px-2 py-1.5 text-sm text-center rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-surface-700 text-slate-800 dark:text-white focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 outline-none transition-all" data-kriteria="baterai"></td>
            <td class="px-3 py-2"><button type="button" class="btn-hapus p-1.5 rounded-lg text-red-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition-all" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button></td>
        `;
        tbodyAlternatif.appendChild(tr);
        updateAltCount();
    }

    function removeLaptopRow(row) {
        const rows = tbodyAlternatif.querySelectorAll('tr');
        if (rows.length <= 2) {
            showNotification('Minimal harus ada 2 alternatif laptop untuk dibandingkan.', 'error');
            return;
        }
        
        row.remove();
        
        // Re-number remaining rows
        const newRows = tbodyAlternatif.querySelectorAll('tr');
        newRows.forEach((tr, index) => {
            tr.querySelector('.alt-no').textContent = index + 1;
        });
        
        updateAltCount();
    }

    function updateAltCount() {
        const count = tbodyAlternatif.querySelectorAll('tr').length;
        altCount.textContent = `${count} alternatif`;
    }

    // ===== 3. PENGUMPULAN & VALIDASI DATA =====
    function collectFormData() {
        const kriteriaList = ['harga', 'berat', 'ram', 'storage', 'processor', 'baterai'];
        const data = {
            bobot: {},
            tipe: {},
            alternatif: []
        };

        // Kumpulkan bobot
        kriteriaList.forEach(k => {
            data.bobot[k] = parseInt(document.getElementById(`bobot_${k}`).value);
        });

        // Kumpulkan tipe
        document.querySelectorAll('.tipe-toggle').forEach(btn => {
            const k = btn.getAttribute('data-kriteria');
            data.tipe[k] = btn.getAttribute('data-tipe');
        });

        // Kumpulkan alternatif
        const rows = tbodyAlternatif.querySelectorAll('tr');
        let isValid = true;

        rows.forEach((row, i) => {
            const namaInput = row.querySelector('.alt-nama');
            const nama = namaInput.value.trim() || `Laptop ${i+1}`; // Fallback jika kosong
            
            const altData = { nama: nama };
            
            row.querySelectorAll('.alt-skor').forEach(input => {
                const k = input.getAttribute('data-kriteria');
                let val = parseInt(input.value);
                if(isNaN(val) || val < 1) val = 1;
                if(val > 5) val = 5;
                altData[k] = val;
            });
            
            data.alternatif.push(altData);
        });

        return { data, isValid };
    }

    // ===== 4. LOGIKA PERHITUNGAN ARAS (CLIENT-SIDE) =====
    // Fallback jika API backend belum siap, menghitung 8 langkah metode ARAS di JS
    function hitungARAS(data) {
        const { bobot, tipe, alternatif } = data;
        const kriteria = Object.keys(bobot);
        const m = alternatif.length;
        
        // --- Langkah 1 & 2: Matriks Keputusan (X) dan Alternatif Optimal (A0) ---
        // Mencari nilai optimal per kriteria (A0)
        const A0 = {};
        kriteria.forEach(k => {
            const values = alternatif.map(a => a[k]);
            if (tipe[k] === 'benefit') {
                A0[k] = Math.max(...values); // Benefit: cari nilai max
            } else {
                A0[k] = Math.min(...values); // Cost: cari nilai min
            }
        });

        // Gabungkan A0 ke matriks keputusan sebagai baris pertama (index 0)
        const X = [ { nama: 'A0 (Optimal)', ...A0 }, ...alternatif ];
        
        // --- Langkah 3: Matriks Normalisasi (R) ---
        const R = [];
        
        // Hitung sumbangan per kriteria
        const sumKriteria = {};
        kriteria.forEach(k => {
            let sum = 0;
            X.forEach(row => {
                if (tipe[k] === 'benefit') {
                    sum += row[k];
                } else {
                    sum += (1 / row[k]);
                }
            });
            sumKriteria[k] = sum;
        });

        // Lakukan normalisasi
        X.forEach((row, i) => {
            const rRow = { nama: row.nama };
            kriteria.forEach(k => {
                if (tipe[k] === 'benefit') {
                    rRow[k] = row[k] / sumKriteria[k];
                } else {
                    rRow[k] = (1 / row[k]) / sumKriteria[k];
                }
            });
            R.push(rRow);
        });

        // --- Langkah 4: Matriks Terbobot (D) ---
        // Normalisasi bobot dulu (wj = Wj / sum(W))
        const sumBobot = kriteria.reduce((sum, k) => sum + bobot[k], 0);
        const bobotNorm = {};
        kriteria.forEach(k => bobotNorm[k] = bobot[k] / sumBobot);

        const D = [];
        R.forEach((row, i) => {
            const dRow = { nama: row.nama };
            kriteria.forEach(k => {
                dRow[k] = row[k] * bobotNorm[k];
            });
            D.push(dRow);
        });

        // --- Langkah 5 & 6: Menghitung Nilai Optimasi (Si) & (S0) ---
        const S = [];
        D.forEach(row => {
            let si = 0;
            kriteria.forEach(k => {
                si += row[k];
            });
            S.push({ nama: row.nama, si: si });
        });

        const S0 = S[0].si; // Nilai Si dari A0

        // --- Langkah 7 & 8: Menghitung Nilai Utility (Ki) dan Perankingan ---
        const Ki = [];
        // Mulai dari index 1 karena index 0 adalah A0
        for (let i = 1; i <= m; i++) {
            const ki = S[i].si / S0;
            Ki.push({
                index: i - 1, // index merujuk ke data alternatif asli
                nama: S[i].nama,
                ki: ki
            });
        }

        // Urutkan berdasarkan Ki descending (dari tertinggi)
        const Ranking = [...Ki].sort((a, b) => b.ki - a.ki);
        
        // Tambahkan rank number
        Ranking.forEach((item, index) => {
            item.rank = index + 1;
        });

        return { A0, X, R, D, S, S0, Ki, Ranking, kriteria, tipe, bobotNorm };
    }

    // ===== 5. PROSES UTAMA (AJAX / CALC) =====
    function prosesHitungARAS() {
        const { data, isValid } = collectFormData();
        if (!isValid) return;

        // Tampilkan loading spinner
        btnHitung.disabled = true;
        document.getElementById('loading-spinner').classList.remove('hidden');
        document.getElementById('hasil-container').classList.add('hidden');

        // Simulasi delay proses agar terasa seperti memproses data berat
        setTimeout(() => {
            try {
                // Lakukan perhitungan
                const hasil = hitungARAS(data);
                
                // Tampilkan hasil
                displayResults(hasil);
                
                showNotification('Perhitungan ARAS berhasil diselesaikan!', 'success');
            } catch (e) {
                console.error("Error calculating ARAS:", e);
                showNotification('Terjadi kesalahan saat menghitung data.', 'error');
            } finally {
                btnHitung.disabled = false;
                document.getElementById('loading-spinner').classList.add('hidden');
            }
        }, 800);
    }

    // ===== 6. TAMPILKAN HASIL =====
    let chartRanking = null;
    let chartRadar = null;

    function displayResults(hasil) {
        document.getElementById('hasil-container').classList.remove('hidden');

        // Render Ranking Cards (Top 3 or all)
        const cardsContainer = document.getElementById('ranking-cards');
        cardsContainer.innerHTML = '';
        
        hasil.Ranking.forEach((item, index) => {
            // Styling based on rank
            let medal = '';
            let colorClass = 'from-slate-400 to-slate-500';
            let borderClass = 'border-slate-200 dark:border-slate-700';
            
            if (item.rank === 1) {
                medal = '🥇'; colorClass = 'from-amber-400 to-yellow-500'; borderClass = 'border-amber-300 dark:border-amber-600/50 shadow-amber-500/20';
            } else if (item.rank === 2) {
                medal = '🥈'; colorClass = 'from-slate-300 to-slate-400'; borderClass = 'border-slate-300 dark:border-slate-600/50 shadow-slate-500/20';
            } else if (item.rank === 3) {
                medal = '🥉'; colorClass = 'from-orange-400 to-amber-600'; borderClass = 'border-orange-300 dark:border-orange-600/50 shadow-orange-500/20';
            }

            const card = document.createElement('div');
            card.className = `bg-white dark:bg-surface-800 rounded-2xl p-5 border-2 ${borderClass} shadow-md transition-all hover:shadow-lg relative overflow-hidden group`;
            
            // BG decorative for rank 1
            const deco = item.rank === 1 ? `<div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-400/10 rounded-full blur-xl group-hover:bg-amber-400/20 transition-all"></div>` : '';

            const pct = (item.ki * 100).toFixed(2);
            
            card.innerHTML = `
                ${deco}
                <div class="relative z-10 flex justify-between items-start mb-4">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-gradient-to-r ${colorClass} text-white flex items-center justify-center font-bold shadow-sm">${medal || item.rank}</span>
                        <h4 class="font-bold text-slate-800 dark:text-white truncate max-w-[150px] sm:max-w-[180px]">${item.nama}</h4>
                    </div>
                </div>
                <div class="relative z-10">
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-1">Nilai Utility (Ki)</p>
                    <p class="text-3xl font-extrabold bg-gradient-to-r ${colorClass} bg-clip-text text-transparent mb-3">${item.ki.toFixed(4)}</p>
                    <div class="w-full bg-slate-100 dark:bg-surface-700 rounded-full h-2">
                        <div class="h-2 rounded-full bg-gradient-to-r ${colorClass}" style="width: ${pct}%"></div>
                    </div>
                    <p class="text-[10px] text-right text-slate-400 mt-1">${pct}% dari ideal</p>
                </div>
            `;
            cardsContainer.appendChild(card);
        });

        // Initialize/Update Charts
        initCharts(hasil);

        // Render Detail Table
        renderDetailTable(hasil);

        // Smooth scroll ke hasil
        document.getElementById('hasil-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function initCharts(hasil) {
        const isDark = document.documentElement.classList.contains('dark');
        const textColor = isDark ? '#94a3b8' : '#64748b';
        const gridColor = isDark ? 'rgba(148,163,184,0.1)' : 'rgba(0,0,0,0.06)';

        // 1. Horizontal Bar Chart (Ki Values)
        const labels = hasil.Ranking.map(item => item.nama);
        const dataKi = hasil.Ranking.map(item => item.ki);
        const bgColors = hasil.Ranking.map(item => {
            if(item.rank === 1) return 'rgba(245, 158, 11, 0.85)'; // Amber/Gold
            if(item.rank === 2) return 'rgba(148, 163, 184, 0.85)'; // Silver
            if(item.rank === 3) return 'rgba(249, 115, 22, 0.85)'; // Bronze
            return 'rgba(99, 102, 241, 0.6)'; // Default Indigo
        });

        const ctxBar = document.getElementById('chart-ranking').getContext('2d');
        if (chartRanking) chartRanking.destroy();
        chartRanking = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nilai Ki',
                    data: dataKi,
                    backgroundColor: bgColors,
                    borderRadius: 4,
                }]
            },
            options: {
                indexAxis: 'y', // Make it horizontal
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { beginAtZero: true, max: 1, grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Inter' } } },
                    y: { grid: { display: false }, ticks: { color: textColor, font: { family: 'Inter' } } }
                }
            }
        });

        // 2. Radar Chart (Comparing Top 3)
        const top3 = hasil.Ranking.slice(0, 3);
        const kriteriaLabels = hasil.kriteria;
        
        // Setup datasets for radar
        // We use normalized data (R matrix) so they fit nicely on radar (0-1 scale relatively)
        // Wait, better to use the original X values divided by max possible (5) for standard 1-5 scale visualization
        const radarDatasets = top3.map((item, index) => {
            // Find original data row
            const origRow = hasil.X.find(r => r.nama === item.nama);
            // Convert to 0-1 scale for radar by dividing by 5 (since max score is 5)
            const radarData = kriteriaLabels.map(k => origRow[k]); 
            
            let color, bgColor;
            if(index === 0) { color = 'rgba(245, 158, 11, 1)'; bgColor = 'rgba(245, 158, 11, 0.2)'; }
            else if(index === 1) { color = 'rgba(99, 102, 241, 1)'; bgColor = 'rgba(99, 102, 241, 0.2)'; }
            else { color = 'rgba(16, 185, 129, 1)'; bgColor = 'rgba(16, 185, 129, 0.2)'; }

            return {
                label: item.nama,
                data: radarData,
                backgroundColor: bgColor,
                borderColor: color,
                pointBackgroundColor: color,
                pointBorderColor: '#fff',
                borderWidth: 2
            };
        });

        const ctxRadar = document.getElementById('chart-radar').getContext('2d');
        if (chartRadar) chartRadar.destroy();
        chartRadar = new Chart(ctxRadar, {
            type: 'radar',
            data: {
                labels: kriteriaLabels.map(k => k.charAt(0).toUpperCase() + k.slice(1)),
                datasets: radarDatasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        angleLines: { color: gridColor },
                        grid: { color: gridColor },
                        pointLabels: { color: textColor, font: { family: 'Inter', size: 11 } },
                        ticks: { display: false, min: 0, max: 5 } // 1-5 scale
                    }
                },
                plugins: {
                    legend: { position: 'bottom', labels: { color: textColor, usePointStyle: true, boxWidth: 8, font: { family: 'Inter', size: 10 } } }
                }
            }
        });
    }

    function renderDetailTable(hasil) {
        const container = document.getElementById('detail-tabel');
        
        let html = `
            <div class="overflow-x-auto border border-slate-200 dark:border-slate-700 rounded-lg">
                <table class="w-full text-xs text-left">
                    <thead class="bg-slate-50 dark:bg-surface-700">
                        <tr>
                            <th class="px-3 py-2 font-semibold text-slate-700 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">Alternatif</th>
                            <th class="px-3 py-2 font-semibold text-slate-700 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">Nilai Optimasi (Si)</th>
                            <th class="px-3 py-2 font-semibold text-slate-700 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">Nilai S0 (Ideal)</th>
                            <th class="px-3 py-2 font-semibold text-slate-700 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700 text-primary-600 dark:text-primary-400">Utility (Ki = Si/S0)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
        `;

        hasil.Ranking.forEach(item => {
            // Cari nilai Si dari array S
            const siItem = hasil.S.find(s => s.nama === item.nama);
            
            html += `
                <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                    <td class="px-3 py-2 font-medium text-slate-800 dark:text-slate-200">${item.nama}</td>
                    <td class="px-3 py-2 text-slate-600 dark:text-slate-400 font-mono">${siItem.si.toFixed(6)}</td>
                    <td class="px-3 py-2 text-slate-600 dark:text-slate-400 font-mono">${hasil.S0.toFixed(6)}</td>
                    <td class="px-3 py-2 font-bold text-primary-600 dark:text-primary-400 font-mono">${item.ki.toFixed(6)}</td>
                </tr>
            `;
        });

        html += `
                    </tbody>
                </table>
            </div>
            <div class="mt-3 p-3 bg-blue-50 dark:bg-blue-900/10 rounded-lg border border-blue-100 dark:border-blue-900/30">
                <p class="text-xs text-blue-800 dark:text-blue-300"><span class="font-bold">Info:</span> Data telah dinormalisasi menggunakan bobot dan tipe kriteria (Cost/Benefit) yang Anda atur. Matriks lengkap tahap 1-4 berjalan di belakang layar untuk efisiensi tampilan UI.</p>
            </div>
        `;
        
        container.innerHTML = html;
    }

    // ===== 7. UTILITY FUNCTIONS =====
    function showNotification(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if(!container) return;

        const toast = document.createElement('div');
        const isSuccess = type === 'success';
        
        const bgColor = isSuccess ? 'bg-emerald-500' : 'bg-red-500';
        const icon = isSuccess 
            ? '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
            : '<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />';

        toast.className = `flex items-center gap-3 px-4 py-3 rounded-xl text-white shadow-lg shadow-black/10 transform transition-all translate-y-10 opacity-0 ${bgColor}`;
        toast.innerHTML = `
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">${icon}</svg>
            <p class="text-sm font-medium">${message}</p>
        `;

        container.appendChild(toast);

        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-y-10', 'opacity-0');
        }, 10);

        // Animate out after 3.5s
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-10');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3500);
    }
});
