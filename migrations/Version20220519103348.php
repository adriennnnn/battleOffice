<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519103348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_adress DROP payement');
        $this->addSql('ALTER TABLE item_chose ADD orderlink_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item_chose ADD CONSTRAINT FK_B6C40D439718F527 FOREIGN KEY (orderlink_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_B6C40D439718F527 ON item_chose (orderlink_id)');
        $this->addSql('ALTER TABLE `order` ADD delivry_address_id INT DEFAULT NULL, DROP commande');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993982A8103E2 FOREIGN KEY (delivry_address_id) REFERENCES delivery_adress (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F52993982A8103E2 ON `order` (delivry_address_id)');
        $this->addSql('ALTER TABLE payment ADD payment_method_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D5AA1164F FOREIGN KEY (payment_method_id) REFERENCES `order` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D28840D5AA1164F ON payment (payment_method_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_adress ADD payement VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE item_chose DROP FOREIGN KEY FK_B6C40D439718F527');
        $this->addSql('DROP INDEX IDX_B6C40D439718F527 ON item_chose');
        $this->addSql('ALTER TABLE item_chose DROP orderlink_id');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993982A8103E2');
        $this->addSql('DROP INDEX UNIQ_F52993982A8103E2 ON `order`');
        $this->addSql('ALTER TABLE `order` ADD commande VARCHAR(255) DEFAULT NULL, DROP delivry_address_id');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D5AA1164F');
        $this->addSql('DROP INDEX UNIQ_6D28840D5AA1164F ON payment');
        $this->addSql('ALTER TABLE payment DROP payment_method_id');
    }
}
