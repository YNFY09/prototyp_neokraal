<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012161044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE operations');
        $this->addSql('DROP INDEX UNIQ_CAC89EACB1A4D127 ON accounts');
        $this->addSql('ALTER TABLE accounts DROP roles, CHANGE account_number account_number VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operations (id INT AUTO_INCREMENT NOT NULL, operation_type VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, operation_date DATETIME NOT NULL, amount DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_28145348A3AE0AB8 (operation_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE accounts ADD roles JSON NOT NULL, CHANGE account_number account_number VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CAC89EACB1A4D127 ON accounts (account_number)');
    }
}
