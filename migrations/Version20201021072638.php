<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201021072638 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assign (id INT AUTO_INCREMENT NOT NULL, id_client INT NOT NULL, id_computer INT NOT NULL, date DATE NOT NULL, hour VARCHAR(255) NOT NULL, INDEX IDX_7222A9A199DED506 (id_client), INDEX IDX_7222A9A1BC3418EF (id_computer), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assign ADD CONSTRAINT FK_7222A9A199DED506 FOREIGN KEY (id_client) REFERENCES client (id)');
        $this->addSql('ALTER TABLE assign ADD CONSTRAINT FK_7222A9A1BC3418EF FOREIGN KEY (id_computer) REFERENCES computer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assign');
    }
}
