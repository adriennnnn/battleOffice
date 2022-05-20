<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519114829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP delivery_adress, DROP billing_adress, DROP country, DROP complement_adress, DROP city, DROP postal_code, DROP phone');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD delivery_adress VARCHAR(255) DEFAULT NULL, ADD billing_adress VARCHAR(255) DEFAULT NULL, ADD country VARCHAR(255) DEFAULT NULL, ADD complement_adress VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD postal_code VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL');
    }
}
