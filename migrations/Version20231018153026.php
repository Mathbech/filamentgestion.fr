<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018153026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ventes DROP CONSTRAINT fk_64ec489aab014612');
        $this->addSql('ALTER TABLE ventes DROP CONSTRAINT fk_64ec489a858c065e');
        $this->addSql('DROP INDEX idx_64ec489a858c065e');
        $this->addSql('DROP INDEX idx_64ec489aab014612');
        $this->addSql('ALTER TABLE ventes DROP clients_id');
        $this->addSql('ALTER TABLE ventes DROP vendeur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ventes ADD clients_id INT NOT NULL');
        $this->addSql('ALTER TABLE ventes ADD vendeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT fk_64ec489aab014612 FOREIGN KEY (clients_id) REFERENCES clients (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT fk_64ec489a858c065e FOREIGN KEY (vendeur_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_64ec489a858c065e ON ventes (vendeur_id)');
        $this->addSql('CREATE INDEX idx_64ec489aab014612 ON ventes (clients_id)');
    }
}
