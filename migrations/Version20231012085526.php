<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012085526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE consommation_id_seq CASCADE');
        $this->addSql('ALTER TABLE consommation DROP CONSTRAINT fk_f993f0a2c5d011da');
        $this->addSql('DROP TABLE consommation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE consommation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE consommation (id INT NOT NULL, impressions_id INT DEFAULT NULL, poids DOUBLE PRECISION NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_f993f0a2c5d011da ON consommation (impressions_id)');
        $this->addSql('ALTER TABLE consommation ADD CONSTRAINT fk_f993f0a2c5d011da FOREIGN KEY (impressions_id) REFERENCES impressions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
