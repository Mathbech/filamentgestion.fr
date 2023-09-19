<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230912144937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bobines_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE consommation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE couleur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE impressions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE imprimantes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bobines (id INT NOT NULL, couleur_id INT NOT NULL, categorie_id INT NOT NULL, utilisateur_id INT NOT NULL, poids DOUBLE PRECISION NOT NULL, prix DOUBLE PRECISION NOT NULL, date_ajout TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4EF4FAD7C31BA576 ON bobines (couleur_id)');
        $this->addSql('CREATE INDEX IDX_4EF4FAD7BCF5E72D ON bobines (categorie_id)');
        $this->addSql('CREATE INDEX IDX_4EF4FAD7FB88E14F ON bobines (utilisateur_id)');
        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, nom_type VARCHAR(255) NOT NULL, propriete VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE consommation (id INT NOT NULL, impressions_id INT DEFAULT NULL, poids DOUBLE PRECISION NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F993F0A2C5D011DA ON consommation (impressions_id)');
        $this->addSql('CREATE TABLE couleur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE impressions (id INT NOT NULL, imprimantes_id INT NOT NULL, utilisateur_id INT NOT NULL, temps TIME(0) WITHOUT TIME ZONE NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A74C17A05E16A326 ON impressions (imprimantes_id)');
        $this->addSql('CREATE INDEX IDX_A74C17A0FB88E14F ON impressions (utilisateur_id)');
        $this->addSql('CREATE TABLE imprimantes (id INT NOT NULL, username_id INT NOT NULL, type_imprimante VARCHAR(255) NOT NULL, nom_imprimante VARCHAR(255) NOT NULL, deleted TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2D40773EED766068 ON imprimantes (username_id)');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE bobines ADD CONSTRAINT FK_4EF4FAD7C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bobines ADD CONSTRAINT FK_4EF4FAD7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bobines ADD CONSTRAINT FK_4EF4FAD7FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE consommation ADD CONSTRAINT FK_F993F0A2C5D011DA FOREIGN KEY (impressions_id) REFERENCES impressions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE impressions ADD CONSTRAINT FK_A74C17A05E16A326 FOREIGN KEY (imprimantes_id) REFERENCES imprimantes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE impressions ADD CONSTRAINT FK_A74C17A0FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE imprimantes ADD CONSTRAINT FK_2D40773EED766068 FOREIGN KEY (username_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('INSERT INTO Users (id, email, roles, password, username) VALUES ("1", "legeek.you@gmail.com", "[\"ROLE_ADMIN\"]","\$2y\$13\$k7ndsnK6w8npfqhtuiS.w.S3OWKHXE5BG6.f9KFH96TEx9cc.fbjy", "Bébech"');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE bobines_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE consommation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE couleur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE impressions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE imprimantes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('ALTER TABLE bobines DROP CONSTRAINT FK_4EF4FAD7C31BA576');
        $this->addSql('ALTER TABLE bobines DROP CONSTRAINT FK_4EF4FAD7BCF5E72D');
        $this->addSql('ALTER TABLE bobines DROP CONSTRAINT FK_4EF4FAD7FB88E14F');
        $this->addSql('ALTER TABLE consommation DROP CONSTRAINT FK_F993F0A2C5D011DA');
        $this->addSql('ALTER TABLE impressions DROP CONSTRAINT FK_A74C17A05E16A326');
        $this->addSql('ALTER TABLE impressions DROP CONSTRAINT FK_A74C17A0FB88E14F');
        $this->addSql('ALTER TABLE imprimantes DROP CONSTRAINT FK_2D40773EED766068');
        $this->addSql('DROP TABLE bobines');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE consommation');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE impressions');
        $this->addSql('DROP TABLE imprimantes');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
