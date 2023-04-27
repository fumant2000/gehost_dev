<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425135454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer ADD hostings_id INT DEFAULT NULL, ADD domains_id INT DEFAULT NULL, ADD emails_id INT DEFAULT NULL, ADD promotions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA7002607 FOREIGN KEY (hostings_id) REFERENCES hosting (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E3700F4DC FOREIGN KEY (domains_id) REFERENCES domain (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E561F5F0 FOREIGN KEY (emails_id) REFERENCES email (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E10007789 FOREIGN KEY (promotions_id) REFERENCES promotion (id)');
        $this->addSql('CREATE INDEX IDX_29D6873EA7002607 ON offer (hostings_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E3700F4DC ON offer (domains_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E561F5F0 ON offer (emails_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E10007789 ON offer (promotions_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EA7002607');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E3700F4DC');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E561F5F0');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E10007789');
        $this->addSql('DROP INDEX IDX_29D6873EA7002607 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E3700F4DC ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E561F5F0 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E10007789 ON offer');
        $this->addSql('ALTER TABLE offer DROP hostings_id, DROP domains_id, DROP emails_id, DROP promotions_id');
    }
}
