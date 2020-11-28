<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128172805 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649550872C ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E39E52A0 ON user');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(180) NOT NULL, ADD firstname VARCHAR(50) DEFAULT NULL, ADD lastname VARCHAR(50) DEFAULT NULL, ADD steam_id VARCHAR(30) DEFAULT NULL, DROP user_email, DROP user_lastname, DROP user_pseudo, DROP is_verified, DROP user_firstname, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD user_email VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD user_lastname VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD user_pseudo VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD is_verified TINYINT(1) NOT NULL, ADD user_firstname VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP email, DROP firstname, DROP lastname, DROP steam_id, CHANGE id id SMALLINT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649550872C ON user (user_email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E39E52A0 ON user (user_pseudo)');
    }
}
