<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501114504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE domain_offer (id INT AUTO_INCREMENT NOT NULL, extension VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email_offer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hosting_offer (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_offer (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, duration INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE hosting');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('ALTER TABLE offer ADD hosting_id INT DEFAULT NULL, ADD promotion_id INT DEFAULT NULL, ADD domain_id INT DEFAULT NULL, ADD email_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EAE9044EA FOREIGN KEY (hosting_id) REFERENCES hosting_offer (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion_offer (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain_offer (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA832C1C9 FOREIGN KEY (email_id) REFERENCES email_offer (id)');
        $this->addSql('CREATE INDEX IDX_29D6873EAE9044EA ON offer (hosting_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E139DF194 ON offer (promotion_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E115F0EE5 ON offer (domain_id)');
        $this->addSql('CREATE INDEX IDX_29D6873EA832C1C9 ON offer (email_id)');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E115F0EE5');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EA832C1C9');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EAE9044EA');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E139DF194');
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, extension VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE hosting (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, level INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, duration INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE domain_offer');
        $this->addSql('DROP TABLE email_offer');
        $this->addSql('DROP TABLE hosting_offer');
        $this->addSql('DROP TABLE promotion_offer');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP INDEX IDX_29D6873EAE9044EA ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E139DF194 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E115F0EE5 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873EA832C1C9 ON offer');
        $this->addSql('ALTER TABLE offer DROP hosting_id, DROP promotion_id, DROP domain_id, DROP email_id');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(255) DEFAULT NULL');
    }
}
