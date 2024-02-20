<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240218051116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Backup entity';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE backup (id BLOB NOT NULL --(DC2Type:uuid)
        , source VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, start_time DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , end_time DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE backup');
    }
}
