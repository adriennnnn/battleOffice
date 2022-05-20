<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519120848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biling_adress DROP FOREIGN KEY FK_D520589C586DFF2');
        $this->addSql('DROP INDEX IDX_D520589C586DFF2 ON biling_adress');
        $this->addSql('ALTER TABLE biling_adress DROP user_info_id');
        $this->addSql('ALTER TABLE `order` ADD shipping_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984887F3F8 FOREIGN KEY (shipping_id) REFERENCES delivery_adress (id)');
        $this->addSql('CREATE INDEX IDX_F52993984887F3F8 ON `order` (shipping_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biling_adress ADD user_info_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE biling_adress ADD CONSTRAINT FK_D520589C586DFF2 FOREIGN KEY (user_info_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_D520589C586DFF2 ON biling_adress (user_info_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984887F3F8');
        $this->addSql('DROP INDEX IDX_F52993984887F3F8 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP shipping_id');
    }
}
