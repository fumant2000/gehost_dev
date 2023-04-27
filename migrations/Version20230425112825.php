<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425112825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_user DROP FOREIGN KEY FK_736BF85E53C674EE');
        $this->addSql('ALTER TABLE offer_user DROP FOREIGN KEY FK_736BF85EA76ED395');
        $this->addSql('DROP TABLE offer_user');
        $this->addSql('ALTER TABLE offer CHANGE priority priority VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer_user (offer_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_736BF85E53C674EE (offer_id), INDEX IDX_736BF85EA76ED395 (user_id), PRIMARY KEY(offer_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE offer_user ADD CONSTRAINT FK_736BF85E53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer_user ADD CONSTRAINT FK_736BF85EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer CHANGE priority priority INT NOT NULL');
    }
}
