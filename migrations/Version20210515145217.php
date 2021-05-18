<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515145217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commandes_cookies (commandes_id INT NOT NULL, cookies_id INT NOT NULL, INDEX IDX_79F8638C8BF5C2E6 (commandes_id), INDEX IDX_79F8638C44598687 (cookies_id), PRIMARY KEY(commandes_id, cookies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes_cookies ADD CONSTRAINT FK_79F8638C8BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commandes_cookies ADD CONSTRAINT FK_79F8638C44598687 FOREIGN KEY (cookies_id) REFERENCES cookies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commandes_cookies');
    }
}
