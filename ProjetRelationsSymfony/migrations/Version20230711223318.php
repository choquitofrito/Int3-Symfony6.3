<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711223318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, categorie_parent_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, INDEX IDX_497DD634DF25C577 (categorie_parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_exemplaire (client_id INT NOT NULL, exemplaire_id INT NOT NULL, INDEX IDX_CEAC01D319EB6921 (client_id), INDEX IDX_CEAC01D35843AA21 (exemplaire_id), PRIMARY KEY(client_id, exemplaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe_employe (employe_source INT NOT NULL, employe_target INT NOT NULL, INDEX IDX_3C0BBF1A31AC648A (employe_source), INDEX IDX_3C0BBF1A28493405 (employe_target), PRIMARY KEY(employe_source, employe_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe_mma (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exemplaire (id INT AUTO_INCREMENT NOT NULL, livre_id INT NOT NULL, etat VARCHAR(10) DEFAULT NULL, INDEX IDX_5EF83C9237D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT NULL, prix NUMERIC(8, 2) DEFAULT NULL, description LONGTEXT NOT NULL, date_publication DATETIME DEFAULT NULL, isbn VARCHAR(30) DEFAULT NULL, date_edition DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_h (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, discr VARCHAR(255) NOT NULL, nationalite VARCHAR(255) DEFAULT NULL, numero INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_mma (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supervision_mma (id INT AUTO_INCREMENT NOT NULL, superviseur_id INT DEFAULT NULL, supervisee_id INT DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, INDEX IDX_D334C8D1B7BB80FF (superviseur_id), INDEX IDX_D334C8D19E97DBD8 (supervisee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634DF25C577 FOREIGN KEY (categorie_parent_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE client_exemplaire ADD CONSTRAINT FK_CEAC01D319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_exemplaire ADD CONSTRAINT FK_CEAC01D35843AA21 FOREIGN KEY (exemplaire_id) REFERENCES exemplaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employe_employe ADD CONSTRAINT FK_3C0BBF1A31AC648A FOREIGN KEY (employe_source) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employe_employe ADD CONSTRAINT FK_3C0BBF1A28493405 FOREIGN KEY (employe_target) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C9237D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE supervision_mma ADD CONSTRAINT FK_D334C8D1B7BB80FF FOREIGN KEY (superviseur_id) REFERENCES employe_mma (id)');
        $this->addSql('ALTER TABLE supervision_mma ADD CONSTRAINT FK_D334C8D19E97DBD8 FOREIGN KEY (supervisee_id) REFERENCES employe_mma (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634DF25C577');
        $this->addSql('ALTER TABLE client_exemplaire DROP FOREIGN KEY FK_CEAC01D319EB6921');
        $this->addSql('ALTER TABLE client_exemplaire DROP FOREIGN KEY FK_CEAC01D35843AA21');
        $this->addSql('ALTER TABLE employe_employe DROP FOREIGN KEY FK_3C0BBF1A31AC648A');
        $this->addSql('ALTER TABLE employe_employe DROP FOREIGN KEY FK_3C0BBF1A28493405');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C9237D925CB');
        $this->addSql('ALTER TABLE supervision_mma DROP FOREIGN KEY FK_D334C8D1B7BB80FF');
        $this->addSql('ALTER TABLE supervision_mma DROP FOREIGN KEY FK_D334C8D19E97DBD8');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_exemplaire');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE employe_employe');
        $this->addSql('DROP TABLE employe_mma');
        $this->addSql('DROP TABLE exemplaire');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE personne_h');
        $this->addSql('DROP TABLE personne_mma');
        $this->addSql('DROP TABLE supervision_mma');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
