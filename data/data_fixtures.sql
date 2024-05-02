INSERT INTO users (id, email, roles, password, username, created_at) OVERRIDING SYSTEM VALUE VALUES (1, 'admin@filamentgestion.fr', '["ROLE_ADMIN"]', '$2y$13$PMmIKGniwzPNsDCOj.LsrO/3ePp2XsqPgDfHYJNAYEK91LOmo0rom', 'Admin', NOW());
INSERT INTO users (id, email, roles, password, username, created_at) OVERRIDING SYSTEM VALUE VALUES (2, 'user@filamentgestion.fr', '[]', '$2y$13$PMmIKGniwzPNsDCOj.LsrO/3ePp2XsqPgDfHYJNAYEK91LOmo0rom', 'User', NOW());

-- couleurs
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (1, 'Blanc');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (2, 'Noir');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (3, 'Rouge');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (4, 'Vert');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (5, 'Bleu');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (6, 'Jaune');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (7, 'Orange');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (8, 'Violet');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (9, 'Rose');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (10, 'Marron');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (11, 'Gris');
INSERT INTO couleur (id, nom) OVERRIDING SYSTEM VALUE VALUES (12, 'Beige');

-- Catégorie de filament
INSERT INTO categorie (id, nom_type, propriete) OVERRIDING SYSTEM VALUE VALUES (1, 'PLA', 'Température extrudeur: Compris entre 180 et 230 degrés, température plateau: Entre 20 et 60 degrés, ventilateurs de refroidissement: Oui');
INSERT INTO categorie (id, nom_type, propriete) OVERRIDING SYSTEM VALUE VALUES (2, 'ABS', 'Température extrudeur: Compris entre 210 et 250 degrés, température plateau: Entre 80 et 110 degrés, ventilateurs de refroidissement: Non');
INSERT INTO categorie (id, nom_type, propriete) OVERRIDING SYSTEM VALUE VALUES (3, 'PETG', 'Température extrudeur: Compris entre 220 et 250 degrés, température plateau: Entre 60 et 80 degrés, ventilateurs de refroidissement: Oui');
INSERT INTO categorie (id, nom_type, propriete) OVERRIDING SYSTEM VALUE VALUES (4, 'TPU', 'Température extrudeur: Compris entre 210 et 230 degrés, température plateau: Entre 20 et 60 degrés, ventilateurs de refroidissement: Oui');
INSERT INTO categorie (id, nom_type, propriete) OVERRIDING SYSTEM VALUE VALUES (5, 'PLA+, ABS+, PETG+', 'Température extrudeur: Compris entre 200 et 240 degrés, température plateau: Entre 20 et 60 degrés, ventilateurs de refroidissement: Oui');
INSERT INTO categorie (id, nom_type, propriete) OVERRIDING SYSTEM VALUE VALUES (6, 'ASA', 'Température extrudeur: Compris entre 230 et 260 degrés, température plateau: Entre 80 et 110 degrés, ventilateurs de refroidissement: Oui');
