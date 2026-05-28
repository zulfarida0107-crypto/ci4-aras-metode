<!-- ============================================
     Tab 5: Panduan Metode
     Penjelasan ARAS, tahapan, tabel konversi skor,
     glosarium, dan FAQ.
     ============================================ -->

<!-- ===== PAGE HEADER ===== -->
<section class="mb-8 animate-fade-in">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 dark:text-white flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/25">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                </span>
                Panduan Metode ARAS
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Pelajari metode Additive Ratio Assessment dan cara kerja sistem ini</p>
        </div>
    </div>
</section>

<!-- ===== WHAT IS ARAS ===== -->
<section class="mb-8 animate-slide-up" style="animation-delay: 100ms">
    <div class="flex flex-col md:flex-row gap-6 bg-white dark:bg-surface-800 rounded-2xl p-6 md:p-8 border border-slate-200/60 dark:border-slate-700/50 shadow-sm relative overflow-hidden">
        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-gradient-to-b from-primary-500 to-cyan-500"></div>
        <div class="flex-shrink-0">
            <div class="w-16 h-16 rounded-2xl bg-primary-50 dark:bg-primary-900/20 flex items-center justify-center">
                <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.82 1.508-2.316a7.5 7.5 0 10-7.516 0c.85.496 1.508 1.333 1.508 2.316v.192m4.5 0v.192c0 .983-.658 1.82-1.508 2.316a14.406 14.406 0 01-3 0c-.85-.496-1.508-1.333-1.508-2.316v-.192"/>
                </svg>
            </div>
        </div>
        <div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-3">Apa itu Metode ARAS?</h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-4">
                Metode ARAS (Additive Ratio Assessment) adalah salah satu metode pengambilan keputusan multi-kriteria (MCDM) yang dikembangkan oleh Zavadskas dan Turskis pada tahun 2010. Metode ini membandingkan setiap alternatif dengan alternatif optimal (ideal) untuk menentukan peringkat.
            </p>
            <div class="bg-primary-50 dark:bg-primary-900/10 rounded-xl p-4 border border-primary-100 dark:border-primary-800/30">
                <p class="text-sm font-medium text-primary-800 dark:text-primary-300">
                    <span class="font-bold text-primary-600 dark:text-primary-400">Prinsip Utama:</span> utility function value (nilai Ki) menentukan efisiensi relatif setiap alternatif terhadap alternatif optimal. Semakin tinggi nilai Ki, semakin baik alternatif tersebut.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ===== 8 TAHAP ARAS ===== -->
<section class="mb-10 animate-slide-up" style="animation-delay: 200ms">
    <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-6 flex items-center gap-2">
        <span class="text-xl">🔢</span> 8 Tahap Perhitungan ARAS
    </h3>
    
    <div class="relative pl-6 md:pl-8 border-l-2 border-slate-200 dark:border-slate-700 space-y-8">
        <?php
        $tahapan = [
            ['title' => 'Membentuk Matriks Keputusan (X)', 'desc' => 'Menyusun matriks m×n dimana m = alternatif, n = kriteria', 'formula' => 'X = [xij] dimana i=0,1,...,m dan j=1,2,...,n'],
            ['title' => 'Menentukan Nilai Optimal (A0)', 'desc' => 'Menentukan nilai terbaik untuk setiap kriteria pada baris ke-0', 'formula' => 'Benefit: max(xij), Cost: min(xij)'],
            ['title' => 'Normalisasi Matriks (R)', 'desc' => 'Mengubah nilai ke skala yang sebanding agar bisa dijumlahkan', 'formula' => 'Benefit: rij = xij / Σxi<br>Cost: rij = (1/xij) / Σ(1/xi)'],
            ['title' => 'Menghitung Matriks Terbobot (D)', 'desc' => 'Mengalikan matriks normalisasi dengan bobot kriteria', 'formula' => 'dij = rij × wj'],
            ['title' => 'Menghitung Nilai Optimasi (Si)', 'desc' => 'Menjumlahkan nilai terbobot setiap alternatif', 'formula' => 'Si = Σ dij (j=1 to n)'],
            ['title' => 'Menentukan Nilai S0', 'desc' => 'Nilai optimasi dari alternatif optimal (baris A0)', 'formula' => 'S0 = Σ d0j'],
            ['title' => 'Menghitung Nilai Utility (Ki)', 'desc' => 'Rasio setiap alternatif terhadap alternatif optimal', 'formula' => 'Ki = Si / S0'],
            ['title' => 'Menentukan Ranking', 'desc' => 'Mengurutkan alternatif berdasarkan nilai Ki', 'formula' => 'Ranking = Ki descending (tertinggi ke terendah)'],
        ];
        foreach ($tahapan as $index => $tahap): 
            $num = $index + 1;
        ?>
        <div class="relative">
            <!-- Bubble Number -->
            <div class="absolute -left-[41px] md:-left-[49px] w-8 h-8 rounded-full bg-white dark:bg-surface-900 border-2 border-primary-500 flex items-center justify-center text-xs font-bold text-primary-600 dark:text-primary-400 shadow-sm">
                <?= $num ?>
            </div>
            
            <div class="bg-white dark:bg-surface-800 rounded-xl p-5 border border-slate-200/60 dark:border-slate-700/50 shadow-sm hover:shadow-md transition-shadow">
                <h4 class="text-base font-bold text-slate-800 dark:text-white mb-2"><?= $tahap['title'] ?></h4>
                <p class="text-sm text-slate-600 dark:text-slate-400 mb-3"><?= $tahap['desc'] ?></p>
                <div class="bg-slate-50 dark:bg-surface-900 rounded-lg p-3 border border-slate-100 dark:border-slate-700">
                    <code class="text-xs font-mono text-pink-600 dark:text-pink-400"><?= $tahap['formula'] ?></code>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===== HUBUNGAN KUESIONER ===== -->
<section class="mb-8 animate-slide-up" style="animation-delay: 300ms">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                🔗 Hubungan Kuesioner dengan ARAS
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-50 dark:bg-surface-700/50">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-slate-700 dark:text-slate-300 rounded-tl-lg">Bagian Kuesioner</th>
                            <th class="px-4 py-3 font-semibold text-slate-700 dark:text-slate-300">Data</th>
                            <th class="px-4 py-3 font-semibold text-slate-700 dark:text-slate-300 rounded-tr-lg">Digunakan di Tahap</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                        <tr>
                            <td class="px-4 py-3 font-medium text-slate-800 dark:text-white">1: Identitas</td>
                            <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Nama, Usia, Status</td>
                            <td class="px-4 py-3 text-slate-500">Profil responden (visualisasi)</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium text-slate-800 dark:text-white">2: Bobot</td>
                            <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Bobot kriteria (1-3)</td>
                            <td class="px-4 py-3 text-primary-600 dark:text-primary-400 font-medium">Tahap 4: Matriks Terbobot</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium text-slate-800 dark:text-white">3: Penilaian</td>
                            <td class="px-4 py-3 text-slate-600 dark:text-slate-400">Skor laptop per kriteria</td>
                            <td class="px-4 py-3 text-emerald-600 dark:text-emerald-400 font-medium">Tahap 1: Matriks Keputusan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Cost vs Benefit -->
        <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 border border-slate-200/60 dark:border-slate-700/50 shadow-sm flex flex-col justify-center">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                ⚖️ Tipe Kriteria
            </h3>
            <div class="space-y-4">
                <div class="bg-emerald-50 dark:bg-emerald-900/10 rounded-xl p-4 border border-emerald-200 dark:border-emerald-800/50">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full bg-emerald-200 dark:bg-emerald-800/50 text-emerald-700 dark:text-emerald-400 flex items-center justify-center text-sm font-bold">↑</span>
                        <h4 class="font-bold text-emerald-800 dark:text-emerald-400">Benefit (Keuntungan)</h4>
                    </div>
                    <p class="text-xs text-emerald-700/80 dark:text-emerald-300/80 mb-2">Semakin tinggi nilainya, semakin baik.</p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-2 py-1 rounded bg-white dark:bg-surface-800 text-xs font-medium shadow-sm">RAM</span>
                        <span class="px-2 py-1 rounded bg-white dark:bg-surface-800 text-xs font-medium shadow-sm">Storage</span>
                        <span class="px-2 py-1 rounded bg-white dark:bg-surface-800 text-xs font-medium shadow-sm">Processor</span>
                        <span class="px-2 py-1 rounded bg-white dark:bg-surface-800 text-xs font-medium shadow-sm">Baterai</span>
                    </div>
                </div>

                <div class="bg-red-50 dark:bg-red-900/10 rounded-xl p-4 border border-red-200 dark:border-red-800/50">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full bg-red-200 dark:bg-red-800/50 text-red-700 dark:text-red-400 flex items-center justify-center text-sm font-bold">↓</span>
                        <h4 class="font-bold text-red-800 dark:text-red-400">Cost (Biaya)</h4>
                    </div>
                    <p class="text-xs text-red-700/80 dark:text-red-300/80 mb-2">Semakin rendah nilainya, semakin baik.</p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-2 py-1 rounded bg-white dark:bg-surface-800 text-xs font-medium shadow-sm">Harga</span>
                        <span class="px-2 py-1 rounded bg-white dark:bg-surface-800 text-xs font-medium shadow-sm">Berat</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== TABEL KONVERSI ===== -->
<section class="mb-8 animate-slide-up" style="animation-delay: 400ms">
    <div class="bg-white dark:bg-surface-800 rounded-2xl border border-slate-200/60 dark:border-slate-700/50 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-700/50">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white flex items-center gap-2">
                🔄 Tabel Konversi Label ke Skor
            </h3>
        </div>
        <div class="overflow-x-auto p-0">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 dark:bg-surface-700/50">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-slate-700 dark:text-slate-300">Kriteria</th>
                        <th class="px-6 py-3 font-semibold text-slate-700 dark:text-slate-300">Skor 1 (Terburuk)</th>
                        <th class="px-6 py-3 font-semibold text-slate-700 dark:text-slate-300">Skor 2</th>
                        <th class="px-6 py-3 font-semibold text-slate-700 dark:text-slate-300">Skor 3</th>
                        <th class="px-6 py-3 font-semibold text-slate-700 dark:text-slate-300">Skor 4</th>
                        <th class="px-6 py-3 font-semibold text-slate-700 dark:text-slate-300">Skor 5 (Terbaik)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                    <!-- Cost -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Harga (Cost)</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">> 25 Juta</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">20 - 25 Juta</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">15 - 20 Juta</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">10 - 15 Juta</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">< 10 Juta</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Berat (Cost)</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">> 3 kg</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">2.5 - 3 kg</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">2 - 2.5 kg</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">1.5 - 2 kg</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">< 1.5 kg</td>
                    </tr>
                    <!-- Benefit -->
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">RAM (Benefit)</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">4GB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">8GB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">16GB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">32GB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">64GB</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Storage (Benefit)</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">256GB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">512GB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">1TB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">1.5TB</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">2TB</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Processor (Benefit)</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">i3 / Ryzen 3</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">i5 / Ryzen 5</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">i7 / Ryzen 7</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">i9 / Ryzen 9</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">Ultra / Threadripper</td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-surface-700/30">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-white">Baterai (Benefit)</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">< 3 jam</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">3 - 5 jam</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">5 - 7 jam</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">7 - 9 jam</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">> 9 jam</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ===== FAQ ===== -->
<section class="animate-slide-up" style="animation-delay: 500ms">
    <div class="bg-white dark:bg-surface-800 rounded-2xl p-6 md:p-8 border border-slate-200/60 dark:border-slate-700/50 shadow-sm">
        <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-6 flex items-center gap-2">
            ❓ Frequently Asked Questions (FAQ)
        </h3>
        
        <div class="space-y-3" id="faq-container">
            <!-- FAQ 1 -->
            <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">
                <button class="faq-btn w-full px-5 py-4 text-left bg-slate-50 dark:bg-surface-700/50 hover:bg-slate-100 dark:hover:bg-surface-700 transition-colors flex justify-between items-center">
                    <span class="font-bold text-slate-800 dark:text-white text-sm">Apa bedanya Mode Survei dan Mode Eksperimen?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="faq-content hidden px-5 py-4 bg-white dark:bg-surface-800 text-sm text-slate-600 dark:text-slate-300">
                    <p><strong>Mode Survei</strong> menampilkan hasil perhitungan yang sudah tetap berdasarkan data yang dikumpulkan dari 26 responden. Anda tidak bisa mengubah data ini.</p>
                    <p class="mt-2"><strong>Mode Eksperimen</strong> (Tab 4) adalah fitur interaktif di mana Anda bisa bebas mengatur bobot, tipe kriteria, dan memasukkan spesifikasi laptop sendiri untuk melihat hasil ranking secara real-time.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">
                <button class="faq-btn w-full px-5 py-4 text-left bg-slate-50 dark:bg-surface-700/50 hover:bg-slate-100 dark:hover:bg-surface-700 transition-colors flex justify-between items-center">
                    <span class="font-bold text-slate-800 dark:text-white text-sm">Mengapa ada kriteria Cost dan Benefit?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="faq-content hidden px-5 py-4 bg-white dark:bg-surface-800 text-sm text-slate-600 dark:text-slate-300">
                    <p>Karena tidak semua kriteria memiliki sifat "semakin besar nilainya semakin baik".</p>
                    <p class="mt-2">Misalnya, untuk kriteria <strong>Harga</strong>, pembeli biasanya mencari harga termurah (semakin rendah nilainya, semakin baik → <strong>Cost</strong>). Sebaliknya, untuk <strong>RAM</strong>, pembeli mencari kapasitas terbesar (semakin besar nilainya, semakin baik → <strong>Benefit</strong>).</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden">
                <button class="faq-btn w-full px-5 py-4 text-left bg-slate-50 dark:bg-surface-700/50 hover:bg-slate-100 dark:hover:bg-surface-700 transition-colors flex justify-between items-center">
                    <span class="font-bold text-slate-800 dark:text-white text-sm">Bagaimana cara menginterpretasi nilai Ki (Utility)?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="faq-content hidden px-5 py-4 bg-white dark:bg-surface-800 text-sm text-slate-600 dark:text-slate-300">
                    <p>Nilai Ki selalu berada di rentang 0 hingga 1. Nilai ini menunjukkan seberapa dekat suatu alternatif dengan "kondisi ideal" (alternatif optimal / A0).</p>
                    <p class="mt-2">Jika sebuah laptop mendapat nilai Ki 0.9500, itu berarti laptop tersebut memiliki efisiensi 95% dibandingkan laptop sempurna (yang memiliki harga termurah, RAM terbesar, dll secara bersamaan).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inline JS for FAQ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqBtns = document.querySelectorAll('.faq-btn');
    faqBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('svg');
            
            // Close all others
            document.querySelectorAll('.faq-content').forEach(c => {
                if (c !== content && !c.classList.contains('hidden')) {
                    c.classList.add('hidden');
                    c.previousElementSibling.querySelector('svg').classList.remove('rotate-180');
                }
            });

            // Toggle current
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>
