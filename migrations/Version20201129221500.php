<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129221500 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO user (id, email, roles, password) VALUES (2, 'jean@michel.com', '[\"ROLE_USER\"]', '".password_hash('Azerty123!', PASSWORD_BCRYPT, ['cost' => 13])."');");
    }

    public function down(Schema $schema) : void
    {
    }
}
