<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Main Content Area -->
<main class="max-w-full px-6 py-6">
<!-- Introduction Section -->
<section class="mb-20 scroll-mt-24" id="intro">
<div class="mb-8">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-4">Pengenalan Metode ARAS</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    Additive Ratio Assessment (ARAS) adalah metode pengambilan keputusan multi-kriteria (MCDM) yang diperkenalkan oleh Zavadskas dan Turskis pada tahun 2010. Metode ini sangat efektif untuk membandingkan berbagai alternatif (laptop) berdasarkan serangkaian kriteria yang memiliki bobot berbeda, dengan tujuan menentukan pilihan yang paling optimal atau mendekati kondisi ideal.
                </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-lg">
<div class="p-6 border border-outline-variant rounded-2xl bg-white shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-4 text-primary">
<span class="material-symbols-outlined">analytics</span>
<h3 class="font-title-lg text-title-lg">Kekuatan Analisis</h3>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">ARAS mampu menangani kriteria yang bersifat kualitatif dan kuantitatif secara bersamaan melalui proses normalisasi yang presisi.</p>
</div>
<div class="p-6 border border-outline-variant rounded-2xl bg-white shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-4 text-primary">
<span class="material-symbols-outlined">track_changes</span>
<h3 class="font-title-lg text-title-lg">Pendekatan Optimal</h3>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Metode ini menggunakan 'Nilai Optimal' (A0) sebagai referensi pembanding bagi setiap alternatif yang ada di dalam dataset.</p>
</div>
</div>
</section>
<!-- Relationship Section -->
<section class="mb-20 scroll-mt-24" id="relationship">
<div class="mb-8">
<h2 class="font-headline-md text-headline-md text-on-surface mb-2">Hubungan Kuesioner &amp; Kriteria</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Bagaimana preferensi subjektif Anda diterjemahkan ke dalam parameter teknis.</p>
</div>
<div class="p-6 border border-outline-variant rounded-2xl bg-white shadow-sm">
<div class="grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-8 items-center">
<div class="flex flex-col gap-2 p-6 bg-surface-container-low rounded-lg">
<div class="flex items-center gap-2 text-primary font-bold mb-2">
<span class="material-symbols-outlined text-[20px]">poll</span>
<span class="font-title-lg text-base">Kuesioner Responden</span>
</div>
<p class="text-body-sm text-on-surface-variant">Mengumpulkan data subjektif mengenai kebutuhan penggunaan, preferensi merek, dan batasan anggaran.</p>
</div>
<div class="flex items-center justify-center">
<span class="material-symbols-outlined text-outline-variant text-4xl hidden md:block">arrow_forward</span>
<span class="material-symbols-outlined text-outline-variant text-4xl block md:hidden">arrow_downward</span>
</div>
<div class="flex flex-col gap-2 p-6 bg-surface-container-low rounded-lg">
<div class="flex items-center gap-2 text-secondary font-bold mb-2">
<span class="material-symbols-outlined text-[20px]">settings_input_component</span>
<span class="font-title-lg text-base">Kriteria ARAS</span>
</div>
<p class="text-body-sm text-on-surface-variant">Transformasi data menjadi bobot numerik (Wj) untuk RAM, CPU, GPU, Harga, dan Daya Tahan Baterai.</p>
</div>
</div>
</div>
</section>
<!-- Visual Stepper Section -->
<section class="mb-20 scroll-mt-24" id="stepper">
<div class="mb-12">
<h2 class="font-headline-md text-headline-md text-on-surface mb-2">8 Langkah Visual Analisis ARAS</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Ikuti alur kerja algoritmik untuk mencapai keputusan akhir yang presisi.</p>
</div>
<div class="relative space-y-12 pl-8">
<div class="absolute left-[15px] top-4 bottom-4 w-[2px] stepper-line"></div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">1</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Pembentukan Matriks Keputusan (X)</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Susun data laptop ke dalam tabel di mana baris mewakili alternatif dan kolom mewakili kriteria penilaian.</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
X = [x<sub>ij</sub>]<sub>m×n</sub>
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">2</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Menentukan Alternatif Optimal (A0)</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Tentukan nilai terbaik untuk setiap kriteria (Max untuk benefit, Min untuk cost) sebagai referensi pembanding ideal.</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
x<sub>0j</sub> = max<sub>i</sub> x<sub>ij</sub> (Benefit) &nbsp;|&nbsp; x<sub>0j</sub> = min<sub>i</sub> x<sub>ij</sub> (Cost)
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">3</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Normalisasi Matriks Keputusan (R)</h4>
<div class="text-on-surface-variant max-w-2xl space-y-1 mb-3">
<p>Transformasikan semua nilai ke dalam skala 0-1 agar kriteria dengan satuan berbeda dapat dibandingkan secara adil.</p>
<ul class="list-disc pl-5 mt-2">
<li><strong class="text-emerald-600">Benefit:</strong> dibagi dengan total nilai pada kolom</li>
<li><strong class="text-amber-600">Cost:</strong> menggunakan invers (1/x) kemudian dinormalisasi</li>
</ul>
</div>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
r<sub>ij</sub> = x<sub>ij</sub> / &sum; x<sub>ij</sub> (Benefit) &nbsp;|&nbsp; r<sub>ij</sub> = (1/x<sub>ij</sub>) / &sum; (1/x<sub>ij</sub>) (Cost)
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">4</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Menghitung Matriks Ternormalisasi Terbobot (D)</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Kalikan nilai yang sudah dinormalisasi dengan bobot kriteria yang telah ditentukan pada langkah awal.</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
d<sub>ij</sub> = r<sub>ij</sub> &times; w<sub>j</sub>
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">5</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Menentukan Nilai Fungsi Optimalitas (Si)</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Jumlahkan seluruh nilai terbobot untuk setiap alternatif guna mendapatkan skor optimasi mentah.</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
S<sub>i</sub> = &sum; d<sub>ij</sub>
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">6</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Menentukan Nilai Fungsi Alternatif Optimal (S0)</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Hitung skor optimasi mentah dari alternatif optimal (A0).</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
S<sub>0</sub> = &sum; d<sub>0j</sub>
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">7</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Menghitung Tingkat Utilitas (Ki)</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Bandingkan skor Si dari setiap alternatif dengan nilai optimasi dari alternatif ideal (S0) untuk mendapatkan persentase kedekatan.</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
K<sub>i</sub> = S<sub>i</sub> / S<sub>0</sub>
</div>
</div>
</div>
<div class="relative group cursor-default">
<div class="absolute -left-[33px] w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm ring-4 ring-background transition-all group-hover:scale-110">8</div>
<div>
<h4 class="font-title-lg text-title-lg text-primary mb-2 transition-colors group-hover:text-primary-container">Menentukan Ranking</h4>
<p class="text-on-surface-variant max-w-2xl mb-3">Urutkan alternatif berdasarkan nilai Ki tertinggi. Laptop dengan nilai Ki mendekati 1.0 adalah pilihan terbaik.</p>
<div class="inline-block p-2 px-4 bg-surface-container rounded-lg border border-outline-variant font-mono-data text-sm text-on-surface">
K<sub>1</sub> &gt; K<sub>2</sub> &gt; ... &gt; K<sub>m</sub>
</div>
</div>
</div>
</div>
</section>
<!-- Conversion Table Section -->
<section class="mb-20 scroll-mt-24" id="conversion">
<div class="mb-8">
<h2 class="font-headline-md text-headline-md text-on-surface mb-2">Tabel Konversi Skor Kriteria</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Standarisasi nilai kualitatif menjadi angka kuantitatif (1-3) untuk perhitungan algoritma berdasarkan konvensi spesifikasi laptop gaming.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-lg">

    <!-- Harga -->
    <div class="overflow-hidden border border-outline-variant rounded-2xl bg-white shadow-sm">
        <div class="bg-surface-container px-4 py-3 border-b border-outline-variant font-title-md font-bold text-primary">Harga (C1)</div>
        <table class="w-full text-left border-collapse text-sm">
            <thead class="bg-surface-container-low text-on-surface-variant font-label-sm">
                <tr><th class="px-4 py-2">Skor</th><th class="px-4 py-2">Harga Laptop Gaming</th></tr>
            </thead>
            <tbody class="divide-y divide-outline-variant font-body-sm text-on-surface">
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">1</td><td class="px-4 py-2">&gt; Rp 25.000.000</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">2</td><td class="px-4 py-2">Rp 15.000.001 – Rp 25.000.000</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">3</td><td class="px-4 py-2">≤ Rp 15.000.000</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Berat -->
    <div class="overflow-hidden border border-outline-variant rounded-2xl bg-white shadow-sm">
        <div class="bg-surface-container px-4 py-3 border-b border-outline-variant font-title-md font-bold text-primary">Berat (C2)</div>
        <table class="w-full text-left border-collapse text-sm">
            <thead class="bg-surface-container-low text-on-surface-variant font-label-sm">
                <tr><th class="px-4 py-2">Skor</th><th class="px-4 py-2">Berat Laptop Gaming</th></tr>
            </thead>
            <tbody class="divide-y divide-outline-variant font-body-sm text-on-surface">
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">1</td><td class="px-4 py-2">&gt; 2,5 kg</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">2</td><td class="px-4 py-2">2,1 – 2,5 kg</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">3</td><td class="px-4 py-2">≤ 2,0 kg</td></tr>
            </tbody>
        </table>
    </div>

    <!-- RAM -->
    <div class="overflow-hidden border border-outline-variant rounded-2xl bg-white shadow-sm">
        <div class="bg-surface-container px-4 py-3 border-b border-outline-variant font-title-md font-bold text-primary">RAM (C3)</div>
        <table class="w-full text-left border-collapse text-sm">
            <thead class="bg-surface-container-low text-on-surface-variant font-label-sm">
                <tr><th class="px-4 py-2">Skor</th><th class="px-4 py-2">Kapasitas RAM</th></tr>
            </thead>
            <tbody class="divide-y divide-outline-variant font-body-sm text-on-surface">
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">1</td><td class="px-4 py-2">&gt; 32 GB</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">2</td><td class="px-4 py-2">8 - 16 GB</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">3</td><td class="px-4 py-2">≤ 8 GB</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Storage -->
    <div class="overflow-hidden border border-outline-variant rounded-2xl bg-white shadow-sm">
        <div class="bg-surface-container px-4 py-3 border-b border-outline-variant font-title-md font-bold text-primary">Storage (C4)</div>
        <table class="w-full text-left border-collapse text-sm">
            <thead class="bg-surface-container-low text-on-surface-variant font-label-sm">
                <tr><th class="px-4 py-2">Skor</th><th class="px-4 py-2">Kapasitas Storage</th></tr>
            </thead>
            <tbody class="divide-y divide-outline-variant font-body-sm text-on-surface">
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">1</td><td class="px-4 py-2">≥ 1 TB</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">2</td><td class="px-4 py-2">512 GB</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">3</td><td class="px-4 py-2">≤ 256 GB</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Processor -->
    <div class="overflow-hidden border border-outline-variant rounded-2xl bg-white shadow-sm">
        <div class="bg-surface-container px-4 py-3 border-b border-outline-variant font-title-md font-bold text-primary">Processor (C5)</div>
        <table class="w-full text-left border-collapse text-sm">
            <thead class="bg-surface-container-low text-on-surface-variant font-label-sm">
                <tr><th class="px-4 py-2">Skor</th><th class="px-4 py-2">Prosesor Laptop Gaming</th></tr>
            </thead>
            <tbody class="divide-y divide-outline-variant font-body-sm text-on-surface">
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">1</td><td class="px-4 py-2">Core i9, Ryzen 9</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">2</td><td class="px-4 py-2">Core i7, Ryzen 7</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">3</td><td class="px-4 py-2">Core i5, Ryzen 5</td></tr>
            </tbody>
        </table>
    </div>

    <!-- Baterai -->
    <div class="overflow-hidden border border-outline-variant rounded-2xl bg-white shadow-sm">
        <div class="bg-surface-container px-4 py-3 border-b border-outline-variant font-title-md font-bold text-primary">Baterai (C6)</div>
        <table class="w-full text-left border-collapse text-sm">
            <thead class="bg-surface-container-low text-on-surface-variant font-label-sm">
                <tr><th class="px-4 py-2">Skor</th><th class="px-4 py-2">Ketahanan Baterai</th></tr>
            </thead>
            <tbody class="divide-y divide-outline-variant font-body-sm text-on-surface">
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">1</td><td class="px-4 py-2">≥ 6 jam</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">2</td><td class="px-4 py-2">3 – 5 jam</td></tr>
                <tr><td class="px-4 py-2 text-center font-bold text-blue-600 bg-blue-50">3</td><td class="px-4 py-2">≤ 2 jam</td></tr>
            </tbody>
        </table>
    </div>

</div>
</section>
<!-- Glossary & FAQ -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-stack-lg mb-20">
<section class="scroll-mt-24" id="glossary">
<h2 class="font-headline-md text-headline-md text-on-surface mb-6">Glosarium</h2>
<div class="space-y-6 bg-white p-6 rounded-2xl border border-outline-variant shadow-sm">
<div>
<h5 class="font-bold text-primary mb-1">MCDM</h5>
<p class="text-body-sm text-on-surface-variant">Multi-Criteria Decision Making, metode untuk mengevaluasi beberapa kriteria yang saling bertentangan dalam satu keputusan.</p>
</div>
<div>
<h5 class="font-bold text-primary mb-1">Kriteria Benefit</h5>
<p class="text-body-sm text-on-surface-variant">Kriteria di mana nilai yang lebih besar dianggap lebih baik (Contoh: Kapasitas RAM, Daya Tahan Baterai).</p>
</div>
<div>
<h5 class="font-bold text-primary mb-1">Kriteria Cost</h5>
<p class="text-body-sm text-on-surface-variant">Kriteria di mana nilai yang lebih kecil dianggap lebih baik (Contoh: Harga, Berat Laptop).</p>
</div>
<div>
<h5 class="font-bold text-primary mb-1">Nilai Optimal (A0)</h5>
<p class="text-body-sm text-on-surface-variant">Titik referensi imajiner yang menggabungkan nilai-nilai terbaik dari seluruh alternatif yang ada.</p>
</div>
</div>
</section>
<section class="scroll-mt-24" id="faq">
<h2 class="font-headline-md text-headline-md text-on-surface mb-6">FAQ</h2>
<div class="space-y-4">
<details class="group border border-outline-variant rounded-2xl bg-white p-4 transition-all duration-300 [&amp;_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md">
<summary class="flex items-center justify-between font-semibold text-on-surface">
<span class="">Apakah ARAS lebih akurat dari SAW?</span>
<span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<div class="mt-3 text-body-sm text-on-surface-variant leading-relaxed">
                            ARAS dianggap lebih unggul karena adanya pembanding 'Nilai Optimal' (A0), yang memberikan konteks sejauh mana alternatif mendekati kesempurnaan dibanding hanya membandingkan antar alternatif yang ada.
                        </div>
</details>
<details class="group border border-outline-variant rounded-2xl bg-white p-4 transition-all duration-300 [&amp;_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md">
<summary class="flex items-center justify-between font-semibold text-on-surface">
<span class="">Apa arti skor Ki = 1.0?</span>
<span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<div class="mt-3 text-body-sm text-on-surface-variant leading-relaxed">
                            Skor Ki 1.0 berarti alternatif tersebut identik dengan nilai ideal (A0) yang Anda inginkan. Semakin dekat ke 1.0, semakin sempurna pilihan tersebut sesuai kriteria Anda.
                        </div>
</details>
<details class="group border border-outline-variant rounded-2xl bg-white p-4 transition-all duration-300 [&amp;_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md">
<summary class="flex items-center justify-between font-semibold text-on-surface">
<span class="">Bagaimana jika bobot kriteria berubah?</span>
<span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<div class="mt-3 text-body-sm text-on-surface-variant leading-relaxed">
                            Perubahan bobot akan langsung mengubah nilai Normalisasi Terbobot, yang pada akhirnya akan mengubah peringkat akhir laptop. Sistem ini dinamis terhadap prioritas pengguna.
                        </div>
</details>
</div>
</section>
</div>
<!-- Visual Framework Section -->
<div class="relative h-[400px] w-full rounded-2xl overflow-hidden mb-20 group">
<img alt="Metodologi Kerangka Kerja" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5cSSnn69IL9PwU09V147Ew6d8cALxM_5RGGUvCvGf25aFZNdNT-4oVzKABm9Pplz7_qC30BoKmWwff8LwMpAoerZfHU8InXVVSujvEYS1BnDXS9u7pozSVrRx0H41H2Z_NwL8sw5kuGgOxxlAtrm3JiC1wruXLGNYOOELsYB3401gazgYz33kHsSSlHNjOJkBV0Mock-LqqMVIhISLKX7uwNKMTFrPds7pBxeNI1DQo1PBvV0vW5shKHfz3ofIYUkphIlfOrasXo">
<div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest/95 via-surface-container-lowest/50 to-transparent"></div>
<div class="absolute bottom-8 left-8 right-8">
<h3 class="font-headline-md text-headline-md text-on-surface mb-2">Kerangka Kerja MCDM</h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">Dibangun di atas dasar matematika yang kokoh untuk meminimalisir bias dalam pemilihan perangkat keras yang krusial bagi produktivitas Anda.</p>
</div>
</div>
</main>
<?= $this->endSection() ?>
