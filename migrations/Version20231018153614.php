<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018153614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ventes_clients (ventes_id INT NOT NULL, clients_id INT NOT NULL, PRIMARY KEY(ventes_id, clients_id))');
        $this->addSql('CREATE INDEX IDX_B010565A7D9932C ON ventes_clients (ventes_id)');
        $this->addSql('CREATE INDEX IDX_B010565AAB014612 ON ventes_clients (clients_id)');
        $this->addSql('CREATE TABLE ventes_users (ventes_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(ventes_id, users_id))');
        $this->addSql('CREATE INDEX IDX_99B2F2A47D9932C ON ventes_users (ventes_id)');
        $this->addSql('CREATE INDEX IDX_99B2F2A467B3B43D ON ventes_users (users_id)');
        $this->addSql('ALTER TABLE ventes_clients ADD CONSTRAINT FK_B010565A7D9932C FOREIGN KEY (ventes_id) REFERENCES ventes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ventes_clients ADD CONSTRAINT FK_B010565AAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ventes_users ADD CONSTRAINT FK_99B2F2A47D9932C FOREIGN KEY (ventes_id) REFERENCES ventes (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ventes_users ADD CONSTRAINT FK_99B2F2A467B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ventes_clients DROP CONSTRAINT FK_B010565A7D9932C');
        $this->addSql('ALTER TABLE ventes_clients DROP CONSTRAINT FK_B010565AAB014612');
        $this->addSql('ALTER TABLE ventes_users DROP CONSTRAINT FK_99B2F2A47D9932C');
        $this->addSql('ALTER TABLE ventes_users DROP CONSTRAINT FK_99B2F2A467B3B43D');
        $this->addSql('DROP TABLE ventes_clients');
        $this->addSql('DROP TABLE ventes_users');
    }
}
