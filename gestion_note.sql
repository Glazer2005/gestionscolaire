-- 1. Création de la base
DROP DATABASE IF EXISTS gestion_notes;
CREATE DATABASE gestion_notes;
USE gestion_notes;

-- 2. Table des admins
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(100) NOT NULL
);

-- Ajout d’un admin
INSERT INTO admin (nom, email, mot_de_passe) VALUES
('Administrateur Principal', 'admin@example.com', 'admin1234');

-- 3. Table des formations
CREATE TABLE formations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Ajout des formations
INSERT INTO formations (nom) VALUES
('Informatique'),
('Génie Civil'),
('Sciences Économiques');

-- 4. Table des étudiants
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    matricule VARCHAR(20) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(100) NOT NULL,
    id_formation INT,
    FOREIGN KEY (id_formation) REFERENCES formations(id)
);

-- Insertion des étudiants personnalisés
INSERT INTO etudiants (nom, prenom, matricule, mot_de_passe, id_formation) VALUES
('Sow', 'Moussa', 'ETU001', 'sow1234', 1),
('Fall', 'Aminata', 'ETU002', 'fall1234', 2),
('Diallo', 'Ibrahima', 'ETU003', 'diallo1234', 1),
('Ndoye', 'Fatou', 'ETU004', 'ndoye1234', 3);

-- 5. Table des matières
CREATE TABLE matieres (
    code VARCHAR(10) PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL,
    id_formation INT NOT NULL,
    FOREIGN KEY (id_formation) REFERENCES formations(id)
);

-- Insertion des matières selon les formations
INSERT INTO matieres (code, libelle, id_formation) VALUES
('INF101', 'Programmation Web', 1),
('INF102', 'Algorithmes', 1),
('GC101', 'Résistance des matériaux', 2),
('GC102', 'Topographie', 2),
('ECO101', 'Macroéconomie', 3),
('ECO102', 'Comptabilité Générale', 3);

-- 6. Table des notes
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(20) NOT NULL,
    code_matiere VARCHAR(10) NOT NULL,
    note DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (matricule) REFERENCES etudiants(matricule),
    FOREIGN KEY (code_matiere) REFERENCES matieres(code)
);

-- Insertion des notes personnalisées
INSERT INTO notes (matricule, code_matiere, note) VALUES
('ETU001', 'INF101', 14.5),
('ETU001', 'INF102', 16.0),
('ETU002', 'GC101', 13.5),
('ETU002', 'GC102', 12.0),
('ETU003', 'INF101', 15.0),
('ETU003', 'INF102', 14.0),
('ETU004', 'ECO101', 17.0),
('ETU004', 'ECO102', 16.5);
