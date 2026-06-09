<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RespondenSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->table('skor_laptop')->truncate();
        $this->db->table('bobot_kriteria')->truncate();
        $this->db->table('responden')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        $respondenData = [];
        $bobotData = [];
        $skorData = [];

        $respondenData[] = ['id' => 3, 'nama' => 'Raihan Noor Abimanyu ', 'usia' => 20, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 3, 'harga' => 2, 'berat' => 3, 'ram' => 3, 'storage' => 2, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 3, 'harga_label' => '>25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '> 32 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 1, 'berat_skor' => 2, 'ram_skor' => 4, 'storage_skor' => 3, 'processor_skor' => 3, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 4, 'nama' => 'anonim', 'usia' => 22, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 4, 'harga' => 3, 'berat' => 1, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 4, 'harga_label' => '≤15 juta', 'berat_label' => '>2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 3, 'berat_skor' => 1, 'ram_skor' => 2, 'storage_skor' => 3, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 5, 'nama' => 'Arsya karunia putra', 'usia' => 22, 'status' => 'Bekerja', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 5, 'harga' => 2, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 5, 'harga_label' => '≤15 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '> 32 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i9, Ryzen 9', 'baterai_label' => '≥ 6 jam', 'harga_skor' => 3, 'berat_skor' => 2, 'ram_skor' => 4, 'storage_skor' => 2, 'processor_skor' => 4, 'baterai_skor' => 3];
        $respondenData[] = ['id' => 6, 'nama' => 'Nagisa', 'usia' => 21, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 6, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 6, 'harga_label' => '≤15 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '≤ 2 jam', 'harga_skor' => 3, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 3, 'processor_skor' => 2, 'baterai_skor' => 1];
        $respondenData[] = ['id' => 7, 'nama' => 'Jikian', 'usia' => 23, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 7, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 7, 'harga_label' => '≤15 juta', 'berat_label' => '≤2 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 3, 'berat_skor' => 3, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 8, 'nama' => 'Yuki', 'usia' => 19, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 8, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 8, 'harga_label' => '>25 juta', 'berat_label' => '>2,5 kg', 'ram_label' => '> 32 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i9, Ryzen 9', 'baterai_label' => '≤ 2 jam', 'harga_skor' => 1, 'berat_skor' => 1, 'ram_skor' => 4, 'storage_skor' => 3, 'processor_skor' => 4, 'baterai_skor' => 1];
        $respondenData[] = ['id' => 9, 'nama' => 'Drea', 'usia' => 19, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 9, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 9, 'harga_label' => '>25 juta', 'berat_label' => '≤2 kg', 'ram_label' => '> 32 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '≤ 2 jam', 'harga_skor' => 1, 'berat_skor' => 3, 'ram_skor' => 4, 'storage_skor' => 3, 'processor_skor' => 3, 'baterai_skor' => 1];
        $respondenData[] = ['id' => 10, 'nama' => 'bgs', 'usia' => 22, 'status' => 'Bekerja', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 10, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 10, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '>2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '≥ 6 jam', 'harga_skor' => 2, 'berat_skor' => 1, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 3];
        $respondenData[] = ['id' => 11, 'nama' => 'Syaa', 'usia' => 19, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 11, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 11, 'harga_label' => '≤15 juta', 'berat_label' => '≤2 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '≥ 6 jam', 'harga_skor' => 3, 'berat_skor' => 3, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 3, 'baterai_skor' => 3];
        $respondenData[] = ['id' => 12, 'nama' => 'nay', 'usia' => 20, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 12, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 12, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 2, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 13, 'nama' => 'Salma', 'usia' => 21, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 13, 'harga' => 3, 'berat' => 1, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 13, 'harga_label' => '≤15 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 3, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 14, 'nama' => 'Nazriel ', 'usia' => 22, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 14, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 14, 'harga_label' => '≤15 juta', 'berat_label' => '>2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '≥ 6 jam', 'harga_skor' => 3, 'berat_skor' => 1, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 3, 'baterai_skor' => 3];
        $respondenData[] = ['id' => 15, 'nama' => 'Reza', 'usia' => 33, 'status' => 'Bekerja', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 15, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 15, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 2, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 3, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 16, 'nama' => 'ToodLeer', 'usia' => 23, 'status' => 'Bekerja', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 16, 'harga' => 2, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 16, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 2, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 17, 'nama' => 'Rizky', 'usia' => 23, 'status' => 'Bekerja', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 17, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 17, 'harga_label' => '>25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '> 32 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i9, Ryzen 9', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 1, 'berat_skor' => 2, 'ram_skor' => 4, 'storage_skor' => 3, 'processor_skor' => 4, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 18, 'nama' => 'Coook1es', 'usia' => 21, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 18, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 18, 'harga_label' => '≤15 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 3, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 3, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 19, 'nama' => 'R', 'usia' => 20, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 19, 'harga' => 3, 'berat' => 1, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 19, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '>2,5 kg', 'ram_label' => '> 32 GB', 'storage_label' => '≥ 1 TB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 2, 'berat_skor' => 1, 'ram_skor' => 4, 'storage_skor' => 3, 'processor_skor' => 3, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 20, 'nama' => 'KYY', 'usia' => 20, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 20, 'harga' => 3, 'berat' => 1, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 1];
        $skorData[] = ['responden_id' => 20, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '≤ 2 jam', 'harga_skor' => 2, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 3, 'baterai_skor' => 1];
        $respondenData[] = ['id' => 21, 'nama' => 'Bram', 'usia' => 20, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 21, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 21, 'harga_label' => '≤15 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '≤ 256 GB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 3, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 1, 'processor_skor' => 3, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 22, 'nama' => 'Ihsan H', 'usia' => 20, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 22, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 22, 'harga_label' => '≤15 juta', 'berat_label' => '≤2 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '≤ 2 jam', 'harga_skor' => 3, 'berat_skor' => 3, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 1];
        $respondenData[] = ['id' => 23, 'nama' => 'Al', 'usia' => 17, 'status' => 'Lainnya', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 23, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 23, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '>2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '≥ 6 jam', 'harga_skor' => 2, 'berat_skor' => 1, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 3];
        $respondenData[] = ['id' => 24, 'nama' => 'athif', 'usia' => 19, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 24, 'harga' => 3, 'berat' => 2, 'ram' => 3, 'storage' => 2, 'processor' => 3, 'baterai' => 2];
        $skorData[] = ['responden_id' => 24, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '≤ 2 jam', 'harga_skor' => 2, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 1];
        $respondenData[] = ['id' => 25, 'nama' => 'hamba Allah', 'usia' => 22, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 25, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 25, 'harga_label' => '≤15 juta', 'berat_label' => '≤2 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i5, Ryzen 5', 'baterai_label' => '3 – 5 jam', 'harga_skor' => 3, 'berat_skor' => 3, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 2, 'baterai_skor' => 2];
        $respondenData[] = ['id' => 26, 'nama' => 'Nyxleonz', 'usia' => 18, 'status' => 'Mahasiswa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')];
        $bobotData[] = ['responden_id' => 26, 'harga' => 3, 'berat' => 3, 'ram' => 3, 'storage' => 3, 'processor' => 3, 'baterai' => 3];
        $skorData[] = ['responden_id' => 26, 'harga_label' => '15 juta - 25 juta', 'berat_label' => '2,1 - 2,5 kg', 'ram_label' => '8 - 16 GB', 'storage_label' => '512 GB', 'processor_label' => 'Core i7, Ryzen 7', 'baterai_label' => '≥ 6 jam', 'harga_skor' => 2, 'berat_skor' => 2, 'ram_skor' => 2, 'storage_skor' => 2, 'processor_skor' => 3, 'baterai_skor' => 3];

        // 1. Ambil parsed data dari Responden2.md
        require_once APPPATH . 'Libraries/Responden2Parser.php';
        $parsedData = \App\Libraries\Responden2Parser::parse();
        
        // Buat map ID -> data spesifikasi skor
        $skorMap = [];
        foreach ($parsedData as $pd) {
            $skorMap[$pd['id']] = $pd;
        }

        // 2. Modifikasi skorData dengan nilai dari markdown
        $newSkorData = [];
        foreach ($skorData as $skor) {
            $id = $skor['responden_id'];
            if (isset($skorMap[$id])) {
                $m = $skorMap[$id];
                $newSkorData[] = [
                    'responden_id' => $id,
                    'harga_label' => $m['labels']['harga'] ?? '',
                    'berat_label' => $m['labels']['berat'] ?? '',
                    'ram_label' => $m['labels']['ram'] ?? '',
                    'storage_label' => $m['labels']['storage'] ?? '',
                    'processor_label' => $m['labels']['processor'] ?? '',
                    'baterai_label' => $m['labels']['baterai'] ?? '',
                    'harga_skor' => $m['scores']['harga'] ?? 1,
                    'berat_skor' => $m['scores']['berat'] ?? 1,
                    'ram_skor' => $m['scores']['ram'] ?? 1,
                    'storage_skor' => $m['scores']['storage'] ?? 1,
                    'processor_skor' => $m['scores']['processor'] ?? 1,
                    'baterai_skor' => $m['scores']['baterai'] ?? 1,
                ];
            } else {
                $newSkorData[] = $skor; // fallback ke original if not found
            }
        }

        $this->db->table('responden')->insertBatch($respondenData);
        $this->db->table('bobot_kriteria')->insertBatch($bobotData);
        $this->db->table('skor_laptop')->insertBatch($newSkorData);
    }
}
