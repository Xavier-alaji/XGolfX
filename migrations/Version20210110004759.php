<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110004759 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hole ADD course_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE hole ADD CONSTRAINT FK_68CD3D9196EF99BF FOREIGN KEY (course_id_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_68CD3D9196EF99BF ON hole (course_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hole DROP FOREIGN KEY FK_68CD3D9196EF99BF');
        $this->addSql('DROP INDEX IDX_68CD3D9196EF99BF ON hole');
        $this->addSql('ALTER TABLE hole DROP course_id_id');
    }
}
