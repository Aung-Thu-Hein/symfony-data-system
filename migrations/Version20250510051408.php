<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250510051408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE invoices (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE invoices_items (id SERIAL NOT NULL, invoice_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D80DCB6A2989F1FD ON invoices_items (invoice_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE invoices_items ADD CONSTRAINT FK_D80DCB6A2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoices (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A4B89032C FOREIGN KEY (post_id) REFERENCES posts (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5F9E962A4B89032C ON comments (post_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE invoices_items DROP CONSTRAINT FK_D80DCB6A2989F1FD
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE invoices
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE invoices_items
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE comments DROP CONSTRAINT FK_5F9E962A4B89032C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_5F9E962A4B89032C
        SQL);
    }
}
