<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220517092020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE delivery_adress (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, complement_adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, payement VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE item_chose (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, item_name VARCHAR(255) NOT NULL, item_price INTEGER NOT NULL, img VARCHAR(255) NOT NULL, price_promo INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE payment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ref_comande VARCHAR(255) NOT NULL, adress_client VARCHAR(255) NOT NULL, client VARCHAR(255) NOT NULL, product VARCHAR(255) NOT NULL, amount VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, delivery VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__order AS SELECT id, commande, delivery_adress, billing_adress, name_user, firstname_user, email, product_by, method_of_payment, country FROM "order"');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commande VARCHAR(255) DEFAULT NULL, delivery_adress VARCHAR(255) DEFAULT NULL, billing_adress VARCHAR(255) DEFAULT NULL, name_user VARCHAR(255) DEFAULT NULL, firstname_user VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, product_by VARCHAR(255) DEFAULT NULL, method_of_payment VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, complement_adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, add_another_delivery_adress BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO "order" (id, commande, delivery_adress, billing_adress, name_user, firstname_user, email, product_by, method_of_payment, country) SELECT id, commande, delivery_adress, billing_adress, name_user, firstname_user, email, product_by, method_of_payment, country FROM __temp__order');
        $this->addSql('DROP TABLE __temp__order');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE delivery_adress');
        $this->addSql('DROP TABLE item_chose');
        $this->addSql('DROP TABLE payment');
        $this->addSql('CREATE TEMPORARY TABLE __temp__order AS SELECT id, commande, delivery_adress, billing_adress, name_user, firstname_user, email, product_by, method_of_payment, country FROM "order"');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, commande VARCHAR(255) NOT NULL, delivery_adress VARCHAR(255) NOT NULL, billing_adress VARCHAR(255) DEFAULT NULL, name_user VARCHAR(255) NOT NULL, firstname_user VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, product_by VARCHAR(255) NOT NULL, method_of_payment VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO "order" (id, commande, delivery_adress, billing_adress, name_user, firstname_user, email, product_by, method_of_payment, country) SELECT id, commande, delivery_adress, billing_adress, name_user, firstname_user, email, product_by, method_of_payment, country FROM __temp__order');
        $this->addSql('DROP TABLE __temp__order');
    }
}
