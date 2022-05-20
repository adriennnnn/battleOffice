<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519121024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_adress DROP FOREIGN KEY FK_42FD3E30C273A89B');
        $this->addSql('DROP INDEX IDX_42FD3E30C273A89B ON delivery_adress');
        $this->addSql('ALTER TABLE delivery_adress DROP shipping_adress_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_adress ADD shipping_adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_adress ADD CONSTRAINT FK_42FD3E30C273A89B FOREIGN KEY (shipping_adress_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_42FD3E30C273A89B ON delivery_adress (shipping_adress_id)');
    }
}
