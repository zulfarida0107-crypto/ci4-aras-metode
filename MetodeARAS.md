# Metode ARAS (Additive Ratio Assessment)

Metode ARAS (Additive Ratio Assessment) adalah salah satu metode pengambilan keputusan multikriteria (MCDM) yang berfokus pada rasio penjumlahan dalam mengevaluasi dan merangking alternatif. Berikut adalah tahapan perhitungan dalam metode ARAS:

## 1. Pembentukan Matriks Keputusan (X)
Langkah pertama adalah membentuk matriks keputusan berukuran *m x n*, di mana *m* adalah jumlah alternatif (termasuk alternatif optimal A0) dan *n* adalah jumlah kriteria. Setiap elemen *x_ij* merepresentasikan nilai performa dari alternatif *i* terhadap kriteria *j*.

## 2. Menentukan Alternatif Optimal (A0)
Setelah matriks keputusan terbentuk, langkah selanjutnya adalah menentukan nilai optimal (A0) untuk setiap kriteria:
- Untuk kriteria **Benefit** (keuntungan): nilai optimal diambil dari nilai **maksimum** (*max x_ij*) pada kriteria tersebut.
- Untuk kriteria **Cost** (biaya): nilai optimal diambil dari nilai **minimum** (*min x_ij*) pada kriteria tersebut.

Nilai A0 ini akan dimasukkan sebagai baris pertama (baris ke-0) dalam matriks keputusan.

## 3. Normalisasi Matriks Keputusan (R)
Matriks keputusan yang telah memiliki baris alternatif optimal (A0) kemudian dinormalisasi untuk mengubah skala nilai menjadi seragam, membentuk matriks normalisasi *R* dengan elemen *r_ij*:
- **Kriteria Benefit**:
  Nilai dinormalisasi dengan membagi setiap nilai (*x_ij*) dengan total penjumlahan seluruh nilai pada kolom/kriteria tersebut.
- **Kriteria Cost**:
  Pertama-tama, nilai dicari inversnya (1 / *x_ij*). Setelah itu, hasil invers tersebut dinormalisasi dengan cara membaginya dengan total penjumlahan hasil invers pada kolom/kriteria tersebut.

## 4. Menghitung Matriks Ternormalisasi Terbobot (D)
Matriks normalisasi (*R*) kemudian dikalikan dengan bobot kriteria (*Wj*) untuk menghasilkan matriks ternormalisasi terbobot *D*. Setiap bobot kriteria (*Wj*) sebelumnya harus dipastikan memiliki total jumlah sama dengan 1 (atau dinormalisasi terlebih dahulu).

*d_ij = r_ij × Wj*

## 5. Menentukan Nilai Fungsi Optimalitas (Si)
Nilai fungsi optimalitas (*Si*) dari setiap alternatif dihitung dengan menjumlahkan seluruh elemen matriks ternormalisasi terbobot (*d_ij*) pada baris alternatif tersebut.

*Si = Σ d_ij*

Semakin besar nilai *Si*, maka semakin baik alternatif tersebut.

## 6. Menentukan Nilai Fungsi Alternatif Optimal (S0)
Nilai fungsi alternatif optimal (*S0*) didapatkan dengan cara yang sama seperti menghitung *Si*, yaitu dengan menjumlahkan seluruh nilai pada baris ke-0 (baris alternatif optimal A0) pada matriks *D*. 

## 7. Menghitung Tingkat Utilitas (Ki)
Tingkat utilitas (*Ki*) menunjukkan sejauh mana sebuah alternatif mendekati nilai alternatif optimal. Nilai *Ki* diperoleh dengan membagi nilai fungsi optimalitas alternatif (*Si*) dengan nilai fungsi alternatif optimal (*S0*).

*Ki = Si / S0*

Nilai *Ki* berada pada rentang [0, 1].

## 8. Menentukan Ranking
Langkah terakhir adalah melakukan perangkingan berdasarkan nilai tingkat utilitas (*Ki*). Alternatif dengan nilai *Ki* tertinggi menempati peringkat pertama (pilihan terbaik), diikuti dengan nilai tertinggi kedua, dan seterusnya.
