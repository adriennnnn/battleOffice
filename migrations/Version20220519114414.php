<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220519114414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biling_adress ADD biling_adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE biling_adress ADD CONSTRAINT FK_D520589CDB4473E5 FOREIGN KEY (biling_adress_id) REFERENCES `order` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D520589CDB4473E5 ON biling_adress (biling_adress_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE biling_adress DROP FOREIGN KEY FK_D520589CDB4473E5');
        $this->addSql('DROP INDEX UNIQ_D520589CDB4473E5 ON biling_adress');
        $this->addSql('ALTER TABLE biling_adress DROP biling_adress_id');
    }
}
