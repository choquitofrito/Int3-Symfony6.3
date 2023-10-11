<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010123630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, categorie_age INT NOT NULL, categorie_genre VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe_evenement (equipe_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_57570DE56D861B89 (equipe_id), INDEX IDX_57570DE5FD02F13 (evenement_id), PRIMARY KEY(equipe_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, start DATE NOT NULL, end DATE NOT NULL, background_color VARCHAR(7) NOT NULL, border_color VARCHAR(7) NOT NULL, text_color VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, contact1 VARCHAR(255) DEFAULT NULL, contact2 VARCHAR(255) DEFAULT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipeCoach (personne_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_AAF4A32DA21BD112 (personne_id), INDEX IDX_AAF4A32D6D861B89 (equipe_id), PRIMARY KEY(personne_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipeJoueur (personne_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_2AE9D6E5A21BD112 (personne_id), INDEX IDX_2AE9D6E56D861B89 (equipe_id), PRIMARY KEY(personne_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presence (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, joueur_id INT NOT NULL, etat VARCHAR(255) NOT NULL, complement VARCHAR(255) NOT NULL, INDEX IDX_6977C7A5FD02F13 (evenement_id), INDEX IDX_6977C7A5A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe_evenement ADD CONSTRAINT FK_57570DE56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe_evenement ADD CONSTRAINT FK_57570DE5FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipeCoach ADD CONSTRAINT FK_AAF4A32DA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipeCoach ADD CONSTRAINT FK_AAF4A32D6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipeJoueur ADD CONSTRAINT FK_2AE9D6E5A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipeJoueur ADD CONSTRAINT FK_2AE9D6E56D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A5FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A5A9E2D76C FOREIGN KEY (joueur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649217BBB47 FOREIGN KEY (person_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe_evenement DROP FOREIGN KEY FK_57570DE56D861B89');
        $this->addSql('ALTER TABLE equipe_evenement DROP FOREIGN KEY FK_57570DE5FD02F13');
        $this->addSql('ALTER TABLE equipeCoach DROP FOREIGN KEY FK_AAF4A32DA21BD112');
        $this->addSql('ALTER TABLE equipeCoach DROP FOREIGN KEY FK_AAF4A32D6D861B89');
        $this->addSql('ALTER TABLE equipeJoueur DROP FOREIGN KEY FK_2AE9D6E5A21BD112');
        $this->addSql('ALTER TABLE equipeJoueur DROP FOREIGN KEY FK_2AE9D6E56D861B89');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A5FD02F13');
        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A5A9E2D76C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649217BBB47');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE equipe_evenement');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE equipeCoach');
        $this->addSql('DROP TABLE equipeJoueur');
        $this->addSql('DROP TABLE presence');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
