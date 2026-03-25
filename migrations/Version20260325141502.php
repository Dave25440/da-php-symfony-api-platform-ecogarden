<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260325141502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE month (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8EB6100696901F54 (number), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tip (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tip_month (tip_id INT NOT NULL, month_id INT NOT NULL, INDEX IDX_DDC6B0F5476C47F6 (tip_id), INDEX IDX_DDC6B0F5A0CBDE4 (month_id), PRIMARY KEY (tip_id, month_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE tip_month ADD CONSTRAINT FK_DDC6B0F5476C47F6 FOREIGN KEY (tip_id) REFERENCES tip (id)');
        $this->addSql('ALTER TABLE tip_month ADD CONSTRAINT FK_DDC6B0F5A0CBDE4 FOREIGN KEY (month_id) REFERENCES month (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tip_month DROP FOREIGN KEY FK_DDC6B0F5476C47F6');
        $this->addSql('ALTER TABLE tip_month DROP FOREIGN KEY FK_DDC6B0F5A0CBDE4');
        $this->addSql('DROP TABLE month');
        $this->addSql('DROP TABLE tip');
        $this->addSql('DROP TABLE tip_month');
        $this->addSql('DROP TABLE user');
    }
}
