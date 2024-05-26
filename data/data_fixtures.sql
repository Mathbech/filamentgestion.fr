INSERT INTO users (id, email, roles, password, username, created_at) OVERRIDING SYSTEM VALUE VALUES (1, 'admin@filamentgestion.fr', '["ROLE_ADMIN"]', '$2y$13$PMmIKGniwzPNsDCOj.LsrO/3ePp2XsqPgDfHYJNAYEK91LOmo0rom', 'Admin', TIMESTAMP '2024-04-01 12:00:00');
INSERT INTO users (id, email, roles, password, username, created_at) OVERRIDING SYSTEM VALUE VALUES (2, 'user@filamentgestion.fr', '[]', '$2y$13$PMmIKGniwzPNsDCOj.LsrO/3ePp2XsqPgDfHYJNAYEK91LOmo0rom', 'User', TIMESTAMP '2022-05-01 08:00:00');

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

-- imprimantes
INSERT INTO imprimantes (id, username_id, type_imprimante, nom_imprimante, deleted, marque, prix, date_ajout) OVERRIDING SYSTEM VALUE VALUES (1, 2, 'imprimante1', 'Ender 3 Pro', null, 'Creality', 200, '2024-04-15');
INSERT INTO imprimantes (id, username_id, type_imprimante, nom_imprimante, deleted, marque, prix, date_ajout) OVERRIDING SYSTEM VALUE VALUES (2, 2, 'imprimante2', 'Mars 2 Pro', null, 'Elegoo', 300, '2024-04-18');
INSERT INTO imprimantes (id, username_id, type_imprimante, nom_imprimante, deleted, marque, prix, date_ajout) OVERRIDING SYSTEM VALUE VALUES (3, 2, 'imprimante3', 'Prusa i3 MK3S', null, 'Prusa', 800, '2024-04-20');
INSERT INTO imprimantes (id, username_id, type_imprimante, nom_imprimante, deleted, marque, prix, date_ajout) OVERRIDING SYSTEM VALUE VALUES (4, 2, 'imprimante4', 'CR-10 V3', null, 'Creality', 500, '2024-04-30');
INSERT INTO imprimantes (id, username_id, type_imprimante, nom_imprimante, deleted, marque, prix, date_ajout) OVERRIDING SYSTEM VALUE VALUES (5, 2, 'imprimante5', 'Ender 3 V2', null, 'Creality', 200, '2024-05-21');

-- bobines
INSERT INTO bobines (id, poids, prix, date_ajout, couleur_id, categorie_id, gestionnaire_id) OVERRIDING SYSTEM VALUE VALUES (1, 1, 25.50, '2024-04-15', 1, 1, 2);
INSERT INTO bobines (id, poids, prix, date_ajout, couleur_id, categorie_id, gestionnaire_id) OVERRIDING SYSTEM VALUE VALUES (2, 1.5, 30.00, '2024-05-15', 2, 2, 2);
INSERT INTO bobines (id, poids, prix, date_ajout, couleur_id, categorie_id, gestionnaire_id) OVERRIDING SYSTEM VALUE VALUES (3, 2, 35.00, '2024-06-15', 3, 3, 2);
INSERT INTO bobines (id, poids, prix, date_ajout, couleur_id, categorie_id, gestionnaire_id) OVERRIDING SYSTEM VALUE VALUES (4, 2.5, 40.00, '2024-07-15', 4, 4, 2);
INSERT INTO bobines (id, poids, prix, date_ajout, couleur_id, categorie_id, gestionnaire_id) OVERRIDING SYSTEM VALUE VALUES (5, 3, 45.00, '2024-08-15', 5, 5, 2);
INSERT INTO bobines (id, poids, prix, date_ajout, couleur_id, categorie_id, gestionnaire_id) OVERRIDING SYSTEM VALUE VALUES (6, 3.5, 50.00, '2024-09-15', 6, 6, 2);

-- impression
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (1, 1, 2, '00:10:00', '2024-04-15', 1, 1, 0.1);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (2, 2, 2, '01:10:00', '2024-05-15', 2, 2, 0.5);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (3, 3, 2, '00:50:00', '2024-06-15', 3, 3, 0.2);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (4, 4, 2, '00:40:00', '2024-07-15', 4, 4, 0.5);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (5, 5, 2, '02:10:00', '2024-08-15', 5, 5, 0.3);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (6, 1, 2, '12:10:00', '2024-09-15', 1, 1, 3.4);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (7, 2, 2, '00:35:00', '2024-10-15', 2, 2, 0.5);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (8, 3, 2, '01:25:00', '2024-11-15', 3, 3, 0.6);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (9, 4, 2, '01:30:00', '2024-12-15', 4, 4, 0.7);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (10, 5, 2, '01:10:00', '2025-01-15', 5, 5, 0.8);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (11, 1, 2, '02:10:00', '2025-02-15', 1, 1, 0.9);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (12, 2, 2, '03:20:00', '2025-03-15', 2, 2, 0.4);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (13, 3, 2, '01:00:00', '2025-04-15', 3, 3, 0.5);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (14, 4, 2, '02:00:00', '2025-05-15', 4, 4, 0.6);
INSERT INTO impressions (id, imprimantes_id, utilisateur_id, temps, date, couleur_id, categorie_id, poids) OVERRIDING SYSTEM VALUE VALUES (15, 5, 2, '03:00:00', '2025-06-15', 5, 5, 0.7);

-- clients
INSERT INTO clients (id, nom, prenom, date_inscription) OVERRIDING SYSTEM VALUE VALUES (1, 'Dupont', 'Jean', '2024-04-15');
INSERT INTO clients (id, nom, prenom, date_inscription) OVERRIDING SYSTEM VALUE VALUES (2, 'Durand', 'Pierre', '2024-05-15');
INSERT INTO clients (id, nom, prenom, date_inscription) OVERRIDING SYSTEM VALUE VALUES (3, 'Duchemin', 'Paul', '2024-05-20');
INSERT INTO clients (id, nom, prenom, date_inscription) OVERRIDING SYSTEM VALUE VALUES (4, 'Dutronc', 'Jacques', '2024-05-25');
INSERT INTO clients (id, nom, prenom, date_inscription) OVERRIDING SYSTEM VALUE VALUES (5, 'Dumas', 'Alexandre', '2024-05-28');

-- ventes
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (1, 'Figurine Mario', 'Taille: 15 cm, Couleurs: Rouge, Noir et Blanc', 15, '2024-04-15', 1, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (2, 'Figurine Luigi', 'Taille: 15 cm, Couleurs: Vert, Noir et Blanc', 15, '2024-05-15', 2, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (3, 'Figurine Peach', 'Taille: 15 cm, Couleurs: Rose, Noir et Blanc', 15, '2024-06-15', 3, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (4, 'Figurine Bowser', 'Taille: 15 cm, Couleurs: Vert, Noir et Blanc', 15, '2024-07-15', 4, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (5, 'Figurine Toad', 'Taille: 15 cm, Couleurs: Rouge, Noir et Blanc', 15, '2024-08-15', 5, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (6, 'Figurine Yoshi', 'Taille: 15 cm, Couleurs: Vert, Noir et Blanc', 15, '2024-09-15', 1, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (7, 'Figurine Wario', 'Taille: 15 cm, Couleurs: Jaune, Noir et Blanc', 15, '2024-10-15', 2, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (8, 'Figurine Waluigi', 'Taille: 15 cm, Couleurs: Violet, Noir et Blanc', 15, '2024-11-15', 3, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (9, 'Figurine Donkey Kong', 'Taille: 15 cm, Couleurs: Marron, Noir et Blanc', 15, '2024-12-15', 4, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (10, 'Figurine Diddy Kong', 'Taille: 15 cm, Couleurs: Orange, Noir et Blanc', 15, '2025-01-15', 5, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (11, 'Figurine Koopa', 'Taille: 15 cm, Couleurs: Vert, Noir et Blanc', 15, '2025-02-15', 1, 2);
INSERT INTO ventes (id, nom_produit, description_produit, prix_produit, date_vente, clients_id, vendeur_id) OVERRIDING SYSTEM VALUE VALUES (12, 'Figurine Boo', 'Taille: 15 cm, Couleurs: Blanc, Noir et Bleu', 15, '2025-03-15', 2, 2);

-- mettre l'autoincrément a la dernière valeur de chaque table
SELECT setval('users_id_seq', (SELECT MAX(id) FROM users));
SELECT setval('couleur_id_seq', (SELECT MAX(id) FROM couleur));
SELECT setval('categorie_id_seq', (SELECT MAX(id) FROM categorie));
SELECT setval('imprimantes_id_seq', (SELECT MAX(id) FROM imprimantes));
SELECT setval('bobines_id_seq', (SELECT MAX(id) FROM bobines));
SELECT setval('impressions_id_seq', (SELECT MAX(id) FROM impressions));
SELECT setval('clients_id_seq', (SELECT MAX(id) FROM clients));
SELECT setval('ventes_id_seq', (SELECT MAX(id) FROM ventes));
