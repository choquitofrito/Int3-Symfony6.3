<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210314213931 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exemplaire_mm_client_mm DROP FOREIGN KEY FK_57B1B22454A1EBAA');
        $this->addSql('ALTER TABLE exemplaire_mm_client_mm DROP FOREIGN KEY FK_57B1B2246C7B44BC');
        $this->addSql('CREATE TABLE avatar (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, lien VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1677722FFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avatar ADD CONSTRAINT FK_1677722FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES client (id)');
        $this->addSql('DROP TABLE client_mm');
        $this->addSql('DROP TABLE exemplaire_mm');
        $this->addSql('DROP TABLE exemplaire_mm_client_mm');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D719EB6921');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D75843AA21');
        $this->addSql('DROP INDEX IDX_364071D719EB6921 ON emprunt');
        $this->addSql('DROP INDEX IDX_364071D75843AA21 ON emprunt');
        $this->addSql('ALTER TABLE emprunt ADD client_emprunteur_id INT NOT NULL, ADD exemplaire_emprunte_id INT DEFAULT NULL, DROP client_id, DROP exemplaire_id');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D787323A03 FOREIGN KEY (client_emprunteur_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D720EDBCFB FOREIGN KEY (exemplaire_emprunte_id) REFERENCES exemplaire (id)');
        $this->addSql('CREATE INDEX IDX_364071D787323A03 ON emprunt (client_emprunteur_id)');
        $this->addSql('CREATE INDEX IDX_364071D720EDBCFB ON emprunt (exemplaire_emprunte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_mm (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exemplaire_mm (id INT AUTO_INCREMENT NOT NULL, etat VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exemplaire_mm_client_mm (exemplaire_mm_id INT NOT NULL, client_mm_id INT NOT NULL, INDEX IDX_57B1B2246C7B44BC (exemplaire_mm_id), INDEX IDX_57B1B22454A1EBAA (client_mm_id), PRIMARY KEY(exemplaire_mm_id, client_mm_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE exemplaire_mm_client_mm ADD CONSTRAINT FK_57B1B22454A1EBAA FOREIGN KEY (client_mm_id) REFERENCES client_mm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exemplaire_mm_client_mm ADD CONSTRAINT FK_57B1B2246C7B44BC FOREIGN KEY (exemplaire_mm_id) REFERENCES exemplaire_mm (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D787323A03');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D720EDBCFB');
        $this->addSql('DROP INDEX IDX_364071D787323A03 ON emprunt');
        $this->addSql('DROP INDEX IDX_364071D720EDBCFB ON emprunt');
        $this->addSql('ALTER TABLE emprunt ADD exemplaire_id INT DEFAULT NULL, DROP client_emprunteur_id, CHANGE exemplaire_emprunte_id client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D719EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D75843AA21 FOREIGN KEY (exemplaire_id) REFERENCES exemplaire (id)');
        $this->addSql('CREATE INDEX IDX_364071D719EB6921 ON emprunt (client_id)');
        $this->addSql('CREATE INDEX IDX_364071D75843AA21 ON emprunt (exemplaire_id)');
    }
}
