-- =============================================
-- DATABASE SPK ARAS - Pemilihan Laptop Gaming
-- Dibuat berdasarkan survei_laptop_gaming.xlsx & dokumen Word
-- =============================================

CREATE DATABASE IF NOT EXISTS `spk_aras` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

USE `spk_aras`;

-- =============================================
-- TABEL 1: RESPONDEN (Bagian 1 Kuesioner)
-- =============================================
CREATE TABLE `responden` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `timestamp` DATETIME NULL,
    `nama` VARCHAR(100) NOT NULL,
    `usia` INT NOT NULL,
    `status` ENUM('Mahasiswa', 'Bekerja', 'Lainnya') NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =============================================
-- TABEL 2: BOBOT KRITERIA (Bagian 2 Kuesioner)
-- =============================================
CREATE TABLE `bobot_kriteria` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `responden_id` INT NOT NULL,
    `harga` TINYINT(1) NOT NULL,      -- 1-3
    `berat` TINYINT(1) NOT NULL,
    `ram` TINYINT(1) NOT NULL,
    `storage` TINYINT(1) NOT NULL,
    `processor` TINYINT(1) NOT NULL,
    `baterai` TINYINT(1) NOT NULL,
    FOREIGN KEY (`responden_id`) REFERENCES `responden`(`id`) ON DELETE CASCADE
);

-- =============================================
-- TABEL 3: SKOR LAPTOP (Bagian 3 Kuesioner)
-- =============================================
CREATE TABLE `skor_laptop` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `responden_id` INT NOT NULL,
    
    -- Label asli dari kuesioner
    `harga_label` VARCHAR(50),
    `berat_label` VARCHAR(50),
    `ram_label` VARCHAR(50),
    `storage_label` VARCHAR(50),
    `processor_label` VARCHAR(50),
    `baterai_label` VARCHAR(50),
    
    -- Skor numerik hasil konversi
    `harga_skor` TINYINT(1),
    `berat_skor` TINYINT(1),
    `ram_skor` TINYINT(1),
    `storage_skor` TINYINT(1),
    `processor_skor` TINYINT(1),
    `baterai_skor` TINYINT(1),
    
    FOREIGN KEY (`responden_id`) REFERENCES `responden`(`id`) ON DELETE CASCADE
);

-- =============================================
-- TABEL 4: HASIL EKSPERIMEN (untuk Tab 4)
-- =============================================
CREATE TABLE `eksperimen_hasil` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nama_eksperimen` VARCHAR(100) NOT NULL,
    `bobot_json` JSON NOT NULL,                    -- Simpan bobot user
    `criteria_types_json` JSON NOT NULL,           -- Cost/Benefit user
    `alternatives_json` JSON NOT NULL,             -- Data laptop user
    `hasil_json` JSON NOT NULL,                    -- Hasil ranking + Ki dll
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =============================================
-- VIEW UNTUK MEMUDAHKAN QUERY
-- =============================================
CREATE VIEW `v_responden_lengkap` AS
SELECT 
    r.id,
    r.nama,
    r.usia,
    r.status,
    b.harga, b.berat, b.ram, b.storage, b.processor, b.baterai,
    s.harga_label, s.harga_skor,
    s.berat_label, s.berat_skor,
    s.ram_label, s.ram_skor,
    s.storage_label, s.storage_skor,
    s.processor_label, s.processor_skor,
    s.baterai_label, s.baterai_skor
FROM responden r
LEFT JOIN bobot_kriteria b ON r.id = b.responden_id
LEFT JOIN skor_laptop s ON r.id = s.responden_id;

-- =============================================
-- INDEX untuk performa
-- =============================================
CREATE INDEX idx_responden_status ON responden(status);
CREATE INDEX idx_responden_usia ON responden(usia);