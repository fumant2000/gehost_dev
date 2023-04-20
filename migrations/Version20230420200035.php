<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230420200035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, reduction INT NOT NULL, price INT NOT NULL, priority INT NOT NULL, renewal_payement INT DEFAULT NULL, features JSON DEFAULT NULL, payment_method JSON DEFAULT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE domain CHANGE updated_at updated_at DATETIME NOT NULL, CHANGE ceated_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE email CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE hosting ADD type VARCHAR(255) NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE promotion CHANGE updated_at updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offer');
        $this->addSql('ALTER TABLE domain CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE created_at ceated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE email CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE hosting DROP type, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }
}
