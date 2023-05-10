<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509083314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction ADD source_contact VARCHAR(255) NOT NULL, ADD destination_contact VARCHAR(255) NOT NULL, ADD request_status VARCHAR(255) NOT NULL, ADD transaction_date VARCHAR(255) DEFAULT NULL, ADD all_response JSON NOT NULL, ADD id_transaction VARCHAR(255) NOT NULL, CHANGE offer_type offer_type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE transaction DROP source_contact, DROP destination_contact, DROP request_status, DROP transaction_date, DROP all_response, DROP id_transaction, CHANGE offer_type offer_type VARCHAR(255) NOT NULL');
    }
}
