<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305123312 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bobines DROP CONSTRAINT fk_4ef4fad7fb88e14f');
        $this->addSql('DROP INDEX idx_4ef4fad7fb88e14f');
        $this->addSql('ALTER TABLE bobines DROP utilisateur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE bobines ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE bobines ADD CONSTRAINT fk_4ef4fad7fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_4ef4fad7fb88e14f ON bobines (utilisateur_id)');
    }
}
