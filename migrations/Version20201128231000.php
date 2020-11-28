<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128231000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO running_session_type (id, name) VALUES (1, 'Entraînement');");
        $this->addSql("INSERT INTO running_session_type (id, name) VALUES (2, 'Course');");
        $this->addSql("INSERT INTO running_session_type (id, name) VALUES (3, 'Loisir');");
        $this->addSql("INSERT INTO user (id, email, roles, password) VALUES (1, 'jean@bond.com', '[\"ROLE_USER\"]', '".password_hash('Azerty123!', PASSWORD_BCRYPT, ['cost' => 13])."');");
    }

    public function down(Schema $schema) : void
    {
    }
}
