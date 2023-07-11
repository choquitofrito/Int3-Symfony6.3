<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210308112245 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vol ADD aeroport_depart_id INT DEFAULT NULL, ADD aeroport_arrivee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EBE3CBAF6E FOREIGN KEY (aeroport_depart_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EBA1B96354 FOREIGN KEY (aeroport_arrivee_id) REFERENCES aeroport (id)');
        $this->addSql('CREATE INDEX IDX_95C97EBE3CBAF6E ON vol (aeroport_depart_id)');
        $this->addSql('CREATE INDEX IDX_95C97EBA1B96354 ON vol (aeroport_arrivee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EBE3CBAF6E');
        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EBA1B96354');
        $this->addSql('DROP INDEX IDX_95C97EBE3CBAF6E ON vol');
        $this->addSql('DROP INDEX IDX_95C97EBA1B96354 ON vol');
        $this->addSql('ALTER TABLE vol DROP aeroport_depart_id, DROP aeroport_arrivee_id');
    }
}
