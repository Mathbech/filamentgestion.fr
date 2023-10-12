<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012090905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE impressions ADD couleur_id INT NOT NULL');
        $this->addSql('ALTER TABLE impressions ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE impressions ADD CONSTRAINT FK_A74C17A0C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE impressions ADD CONSTRAINT FK_A74C17A0BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A74C17A0C31BA576 ON impressions (couleur_id)');
        $this->addSql('CREATE INDEX IDX_A74C17A0BCF5E72D ON impressions (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE impressions DROP CONSTRAINT FK_A74C17A0C31BA576');
        $this->addSql('ALTER TABLE impressions DROP CONSTRAINT FK_A74C17A0BCF5E72D');
        $this->addSql('DROP INDEX IDX_A74C17A0C31BA576');
        $this->addSql('DROP INDEX IDX_A74C17A0BCF5E72D');
        $this->addSql('ALTER TABLE impressions DROP couleur_id');
        $this->addSql('ALTER TABLE impressions DROP categorie_id');
    }
}
