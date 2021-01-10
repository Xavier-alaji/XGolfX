<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110001855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD created_by_id INT NOT NULL, ADD updated_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9B03A8386 ON course (created_by_id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9896DBBDE ON course (updated_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9B03A8386');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9896DBBDE');
        $this->addSql('DROP INDEX IDX_169E6FB9B03A8386 ON course');
        $this->addSql('DROP INDEX IDX_169E6FB9896DBBDE ON course');
        $this->addSql('ALTER TABLE course DROP created_by_id, DROP updated_by_id');
    }
}
