<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012093202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE clients_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE ventes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE clients (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ventes (id INT NOT NULL, clients_id INT NOT NULL, nom_produit VARCHAR(255) NOT NULL, description_produit VARCHAR(255) NOT NULL, prix_produit DOUBLE PRECISION NOT NULL, date_vente DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_64EC489AAB014612 ON ventes (clients_id)');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489AAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE clients_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE ventes_id_seq CASCADE');
        $this->addSql('ALTER TABLE ventes DROP CONSTRAINT FK_64EC489AAB014612');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE ventes');
    }
}
