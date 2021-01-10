<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210110003953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shot ADD created_by_id INT NOT NULL, ADD updated_by_id INT NOT NULL');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BBB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE shot ADD CONSTRAINT FK_AB0788BB896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AB0788BBB03A8386 ON shot (created_by_id)');
        $this->addSql('CREATE INDEX IDX_AB0788BB896DBBDE ON shot (updated_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BBB03A8386');
        $this->addSql('ALTER TABLE shot DROP FOREIGN KEY FK_AB0788BB896DBBDE');
        $this->addSql('DROP INDEX IDX_AB0788BBB03A8386 ON shot');
        $this->addSql('DROP INDEX IDX_AB0788BB896DBBDE ON shot');
        $this->addSql('ALTER TABLE shot DROP created_by_id, DROP updated_by_id');
    }
}
