<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012163922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operations ADD accounts_id INT NOT NULL');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_28145348CC5E8CE8 FOREIGN KEY (accounts_id) REFERENCES accounts (id)');
        $this->addSql('CREATE INDEX IDX_28145348CC5E8CE8 ON operations (accounts_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_28145348CC5E8CE8');
        $this->addSql('DROP INDEX IDX_28145348CC5E8CE8 ON operations');
        $this->addSql('ALTER TABLE operations DROP accounts_id');
    }
}
