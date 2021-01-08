<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107171213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mark (id INT AUTO_INCREMENT NOT NULL, mark INT DEFAULT NULL, student_id INT NOT NULL, subject_id INT NOT NULL, INDEX fk_mark_subject_id_idx (subject_id), INDEX fk_mark_student_id_idx (student_id), PRIMARY KEY(id))
DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, university_id INT NOT NULL, first_name VARCHAR(45) NOT NULL, last_name VARCHAR(45) NOT NULL, INDEX fk_sudent_university_id_idx (university_id), PRIMARY KEY(id)) DEFAULT CHAR
ACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) DEFAULT \'NULL\', code VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE university (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE marks');
    }
}
