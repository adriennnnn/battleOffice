<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519102006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery_adress (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, complement_adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, payement VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, ref_comande VARCHAR(255) NOT NULL, adress_client VARCHAR(255) NOT NULL, client VARCHAR(255) NOT NULL, product VARCHAR(255) NOT NULL, amount VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, delivery VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE item_chose CHANGE item_name item_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD country VARCHAR(255) DEFAULT NULL, ADD complement_adress VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD postal_code VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD add_another_delivery_adress TINYINT(1) NOT NULL, CHANGE commande commande VARCHAR(255) DEFAULT NULL, CHANGE delivery_adress delivery_adress VARCHAR(255) DEFAULT NULL, CHANGE name_user name_user VARCHAR(255) DEFAULT NULL, CHANGE firstname_user firstname_user VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE product_by product_by VARCHAR(255) DEFAULT NULL, CHANGE method_of_payment method_of_payment VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE delivery_adress');
        $this->addSql('DROP TABLE payment');
        $this->addSql('ALTER TABLE item_chose CHANGE item_name item_name INT NOT NULL');
        $this->addSql('ALTER TABLE `order` DROP country, DROP complement_adress, DROP city, DROP postal_code, DROP phone, DROP add_another_delivery_adress, CHANGE commande commande VARCHAR(255) NOT NULL, CHANGE delivery_adress delivery_adress VARCHAR(255) NOT NULL, CHANGE name_user name_user VARCHAR(255) NOT NULL, CHANGE firstname_user firstname_user VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE product_by product_by VARCHAR(255) NOT NULL, CHANGE method_of_payment method_of_payment VARCHAR(255) NOT NULL');
    }
}
