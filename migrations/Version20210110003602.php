<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110003602 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hole ADD created_by_id INT NOT NULL, ADD updated_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE hole ADD CONSTRAINT FK_68CD3D91B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hole ADD CONSTRAINT FK_68CD3D91896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_68CD3D91B03A8386 ON hole (created_by_id)');
        $this->addSql('CREATE INDEX IDX_68CD3D91896DBBDE ON hole (updated_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hole DROP FOREIGN KEY FK_68CD3D91B03A8386');
        $this->addSql('ALTER TABLE hole DROP FOREIGN KEY FK_68CD3D91896DBBDE');
        $this->addSql('DROP INDEX IDX_68CD3D91B03A8386 ON hole');
        $this->addSql('DROP INDEX IDX_68CD3D91896DBBDE ON hole');
        $this->addSql('ALTER TABLE hole DROP created_by_id, DROP updated_by_id');
    }
}
