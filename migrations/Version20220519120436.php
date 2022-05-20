<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519120436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biling_adress DROP FOREIGN KEY FK_D520589CDB4473E5');
        $this->addSql('DROP INDEX UNIQ_D520589CDB4473E5 ON biling_adress');
        $this->addSql('ALTER TABLE biling_adress CHANGE biling_adress_id user_info_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE biling_adress ADD CONSTRAINT FK_D520589C586DFF2 FOREIGN KEY (user_info_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_D520589C586DFF2 ON biling_adress (user_info_id)');
        $this->addSql('ALTER TABLE delivery_adress ADD shipping_adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_adress ADD CONSTRAINT FK_42FD3E30C273A89B FOREIGN KEY (shipping_adress_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_42FD3E30C273A89B ON delivery_adress (shipping_adress_id)');
        $this->addSql('ALTER TABLE item_chose DROP FOREIGN KEY FK_B6C40D439718F527');
        $this->addSql('DROP INDEX IDX_B6C40D439718F527 ON item_chose');
        $this->addSql('ALTER TABLE item_chose DROP orderlink_id');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993982A8103E2');
        $this->addSql('DROP INDEX UNIQ_F52993982A8103E2 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP name_user, DROP firstname_user, DROP product_by, DROP method_of_payment, CHANGE delivry_address_id user_informations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993988284110D FOREIGN KEY (user_informations_id) REFERENCES biling_adress (id)');
        $this->addSql('CREATE INDEX IDX_F52993988284110D ON `order` (user_informations_id)');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D5AA1164F');
        $this->addSql('DROP INDEX UNIQ_6D28840D5AA1164F ON payment');
        $this->addSql('ALTER TABLE payment ADD method_of_payment VARCHAR(255) DEFAULT NULL, DROP payment_method_id, DROP ref_comande, DROP adress_client, DROP client, DROP product, DROP delivery');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biling_adress DROP FOREIGN KEY FK_D520589C586DFF2');
        $this->addSql('DROP INDEX IDX_D520589C586DFF2 ON biling_adress');
        $this->addSql('ALTER TABLE biling_adress CHANGE user_info_id biling_adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE biling_adress ADD CONSTRAINT FK_D520589CDB4473E5 FOREIGN KEY (biling_adress_id) REFERENCES `order` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D520589CDB4473E5 ON biling_adress (biling_adress_id)');
        $this->addSql('ALTER TABLE delivery_adress DROP FOREIGN KEY FK_42FD3E30C273A89B');
        $this->addSql('DROP INDEX IDX_42FD3E30C273A89B ON delivery_adress');
        $this->addSql('ALTER TABLE delivery_adress DROP shipping_adress_id');
        $this->addSql('ALTER TABLE item_chose ADD orderlink_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE item_chose ADD CONSTRAINT FK_B6C40D439718F527 FOREIGN KEY (orderlink_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_B6C40D439718F527 ON item_chose (orderlink_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993988284110D');
        $this->addSql('DROP INDEX IDX_F52993988284110D ON `order`');
        $this->addSql('ALTER TABLE `order` ADD name_user VARCHAR(255) DEFAULT NULL, ADD firstname_user VARCHAR(255) DEFAULT NULL, ADD product_by VARCHAR(255) DEFAULT NULL, ADD method_of_payment VARCHAR(255) DEFAULT NULL, CHANGE user_informations_id delivry_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993982A8103E2 FOREIGN KEY (delivry_address_id) REFERENCES delivery_adress (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F52993982A8103E2 ON `order` (delivry_address_id)');
        $this->addSql('ALTER TABLE payment ADD payment_method_id INT DEFAULT NULL, ADD ref_comande VARCHAR(255) NOT NULL, ADD adress_client VARCHAR(255) NOT NULL, ADD client VARCHAR(255) NOT NULL, ADD product VARCHAR(255) NOT NULL, ADD delivery VARCHAR(255) NOT NULL, DROP method_of_payment');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D5AA1164F FOREIGN KEY (payment_method_id) REFERENCES `order` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D28840D5AA1164F ON payment (payment_method_id)');
    }
}
