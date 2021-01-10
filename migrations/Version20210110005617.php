<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110005617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shot ADD hole_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BBB8146759 FOREIGN KEY (hole_id_id) REFERENCES hole (id)');
        $this->addSql('CREATE INDEX IDX_AB0788BBB8146759 ON shot (hole_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BBB8146759');
        $this->addSql('DROP INDEX IDX_AB0788BBB8146759 ON shot');
        $this->addSql('ALTER TABLE shot DROP hole_id_id');
    }
}
