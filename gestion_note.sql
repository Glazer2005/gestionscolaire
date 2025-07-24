-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_notes;
USE gestion_notes;

-- Table des administrateurs (utilisateurs)
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin') DEFAULT 'admin'
);

-- Table des formations
CREATE TABLE IF NOT EXISTS formations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL
);

-- Table des étudiants
CREATE TABLE IF NOT EXISTS etudiants (
    matricule VARCHAR(20) PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    adresse TEXT,
    telephone VARCHAR(20),
    mot_de_passe VARCHAR(255) NOT NULL,
    id_formation INT,
    FOREIGN KEY (id_formation) REFERENCES formations(id) ON DELETE SET NULL
);

-- Table des matières
CREATE TABLE IF NOT EXISTS matieres (
    code VARCHAR(10) PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL,
    id_formation INT,
    FOREIGN KEY (id_formation) REFERENCES formations(id) ON DELETE CASCADE
);

-- Table des notes
CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(20),
    code_matiere VARCHAR(10),
    note DECIMAL(5,2),
    FOREIGN KEY (matricule) REFERENCES etudiants(matricule) ON DELETE CASCADE,
    FOREIGN KEY (code_matiere) REFERENCES matieres(code) ON DELETE CASCADE
);
