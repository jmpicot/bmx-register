<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302214256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reg_registrant DROP FOREIGN KEY reg_registrant_FK');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, dt_subscribe DATETIME NOT NULL, dt_last_connection DATETIME DEFAULT NULL, is_admin SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE reg_category_COUPE_REGION');
        $this->addSql('DROP TABLE reg_club');
        $this->addSql('DROP TABLE reg_event');
        $this->addSql('DROP TABLE reg_event_type');
        $this->addSql('DROP TABLE reg_registrant');
        $this->addSql('DROP TABLE reg_user');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reg_category_COUPE_REGION (ID BIGINT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant\', NAME VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom catégorie\', DISPLAY_NAME VARCHAR(60) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom affiché\', DESCRIPTION VARCHAR(200) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci` COMMENT \'Description\', RATE DOUBLE PRECISION DEFAULT \'0\' NOT NULL COMMENT \'Prix inscription\', PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reg_club (NAME VARCHAR(30) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci` COMMENT \'Nom\', DISPLAY_NAME VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom affiché\', DESCRIPTION VARCHAR(500) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Description\', ADRESS VARCHAR(150) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Adresse\') DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reg_event (ID BIGINT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant\', ID_EVENT_TYPE INT NOT NULL COMMENT \'Type d\'\'evènement\', NAME VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom\', DISPLAY_NAME VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom affiché\', DESCRIPTION VARCHAR(500) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci` COMMENT \'Description\', DT_START DATE NOT NULL COMMENT \'Date de début\', DT_STARTTIME TIME DEFAULT \'NULL\' COMMENT \'Heure de début\', DT_END DATE NOT NULL COMMENT \'Date de fin\', DT_END_TIME TIME DEFAULT \'NULL\' COMMENT \'Heure de fin\', COUNTRY VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Pays\', TOWN VARCHAR(25) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Ville\', STREET VARCHAR(150) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_swedish_ci` COMMENT \'Rue\', IS_OPEN_REGISTRATION TINYINT(1) NOT NULL COMMENT \'Ouvert à l\'\'inscription\', DT_LIMIT_REGISTRATION DATETIME DEFAULT \'NULL\' COMMENT \'Date limite d\'\'inscription\', NB_MAX_REGISTRANT INT DEFAULT NULL COMMENT \'Nombre maximum d\'\'inscrits\', PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'Liste des évènements\' ');
        $this->addSql('CREATE TABLE reg_event_type (ID INT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant\', NAME VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom du type\', DISPLAY_NAME VARCHAR(200) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom affichable du type\', IS_RACE TINYINT(1) NOT NULL COMMENT \'Le type d\'\'evènement est une race ou pas ?\', IS_TRAINING TINYINT(1) NOT NULL COMMENT \'Le type d\'\'évènement est un entrainement\', PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'Type de course\' ');
        $this->addSql('CREATE TABLE reg_registrant (ID BIGINT NOT NULL COMMENT \'Identifiant\', ID_USER BIGINT NOT NULL COMMENT \'Identifiant du user associé\', LASTNAME VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Nom\', FIRSTNAME VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Prénom\', DT_BIRTH DATE NOT NULL COMMENT \'Date de naissance\', LICENCE_NUMBER VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Numéo de licence\', NUMBER_PLATE VARCHAR(5) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Numéro de plaque\', UNIQUE INDEX reg_registrant_UNIQUE_NAME (ID_USER, FIRSTNAME, LASTNAME), INDEX IDX_FB73F9B1F8371B55 (ID_USER), PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'Les inscrits aux évènements\' ');
        $this->addSql('CREATE TABLE reg_user (ID BIGINT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant\', LOG_EMAIL VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Login sous forme de mail\', PASSWORD VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci` COMMENT \'Mot de passe\', DT_SUBSCRIBE DATETIME NOT NULL COMMENT \'Date d\'\'inscription\', DT_LAST_CONNECTION DATETIME DEFAULT \'NULL\' COMMENT \'Date dernière connexion\', IS_ADMIN TINYINT(1) NOT NULL COMMENT \'Est administrateur ?\', PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'Utilisateurs de la plateforme\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, email VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, type VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, password VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reg_registrant ADD CONSTRAINT reg_registrant_FK FOREIGN KEY (ID_USER) REFERENCES reg_user (ID) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user');
    }
}
