<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241111113802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD name VARCHAR(255)');
        $this->addSql('ALTER TABLE "user" ADD surname VARCHAR(255)');
        $this->addSql('ALTER TABLE "user" ADD email VARCHAR(255)');
        $this->addSql("UPDATE \"user\" SET name='John', surname='Doe', email='-'");
        $this->addSql('ALTER TABLE "user" ALTER COLUMN name SET NOT NULL');
        $this->addSql('ALTER TABLE "user" ALTER COLUMN surname SET NOT NULL');
        $this->addSql('ALTER TABLE "user" ALTER COLUMN email SET NOT NULL');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" DROP name');
        $this->addSql('ALTER TABLE "user" DROP surname');
        $this->addSql('ALTER TABLE "user" DROP email');
    }
}
