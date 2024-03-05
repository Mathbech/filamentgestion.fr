<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305123900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bobines ADD gestionnaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE bobines ADD CONSTRAINT FK_4EF4FAD76885AC1B FOREIGN KEY (gestionnaire_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4EF4FAD76885AC1B ON bobines (gestionnaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE bobines DROP CONSTRAINT FK_4EF4FAD76885AC1B');
        $this->addSql('DROP INDEX IDX_4EF4FAD76885AC1B');
        $this->addSql('ALTER TABLE bobines DROP gestionnaire_id');
    }
}
