CREATE DATABASE IF NOT EXISTS usm_tracking_test;
USE usm_tracking_test;

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_staf VARCHAR(255) NOT NULL,
    jenis_perkhidmatan TEXT NOT NULL,
    kos DECIMAL(10,2) NOT NULL,
    tarikh_cipta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);