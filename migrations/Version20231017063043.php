<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017063043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ventes ADD vendeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489A858C065E FOREIGN KEY (vendeur_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_64EC489A858C065E ON ventes (vendeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ventes DROP CONSTRAINT FK_64EC489A858C065E');
        $this->addSql('DROP INDEX IDX_64EC489A858C065E');
        $this->addSql('ALTER TABLE ventes DROP vendeur_id');
    }
}
