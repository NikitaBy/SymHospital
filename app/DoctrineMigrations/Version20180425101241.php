<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425101241 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE history_symptoms DROP FOREIGN KEY FK_8DC7C25967CA3534');
        $this->addSql('ALTER TABLE symptoms_history DROP FOREIGN KEY FK_D46FE47167CA3534');
        $this->addSql('DROP TABLE history_patient');
        $this->addSql('DROP TABLE history_symptoms');
        $this->addSql('DROP TABLE patient_history');
        $this->addSql('DROP TABLE symptoms');
        $this->addSql('DROP TABLE symptoms_history');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE history CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE cureperiod cureperiod DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE patient CHANGE user_id user_id INT DEFAULT NULL, CHANGE birth_date birth_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule CHANGE work_time work_time VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE doctor_id doctor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE doctor CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE specialty CHANGE domain domain VARCHAR(15) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE doctor_id doctor_id INT DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user_role CHANGE user_id user_id INT DEFAULT NULL, CHANGE role_id role_id INT DEFAULT NULL');
        $this->addSql('INSERT INTO role (code,code_name) VALUE (ROLE_PATIENT, Patient)');
        $this->addSql('INSERT INTO role (code,code_name) VALUE (ROLE_DOCTOR, Doctor)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE history_patient (history_id INT NOT NULL, patient_id INT NOT NULL, INDEX IDX_3EBDFB011E058452 (history_id), INDEX IDX_3EBDFB016B899279 (patient_id), PRIMARY KEY(history_id, patient_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE history_symptoms (history_id INT NOT NULL, symptoms_id INT NOT NULL, INDEX IDX_8DC7C2591E058452 (history_id), INDEX IDX_8DC7C25967CA3534 (symptoms_id), PRIMARY KEY(history_id, symptoms_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_history (patient_id INT NOT NULL, history_id INT NOT NULL, INDEX IDX_7AD925A06B899279 (patient_id), INDEX IDX_7AD925A01E058452 (history_id), PRIMARY KEY(patient_id, history_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptoms (id INT AUTO_INCREMENT NOT NULL, Description VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptoms_history (symptoms_id INT NOT NULL, history_id INT NOT NULL, INDEX IDX_D46FE47167CA3534 (symptoms_id), INDEX IDX_D46FE4711E058452 (history_id), PRIMARY KEY(symptoms_id, history_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL COLLATE utf8_unicode_ci, username_canonical VARCHAR(180) NOT NULL COLLATE utf8_unicode_ci, email VARCHAR(180) NOT NULL COLLATE utf8_unicode_ci, email_canonical VARCHAR(180) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, last_login DATETIME DEFAULT \'NULL\', confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, password_requested_at DATETIME DEFAULT \'NULL\', roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', first_name VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, middle_name VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, last_name VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history_patient ADD CONSTRAINT FK_3EBDFB011E058452 FOREIGN KEY (history_id) REFERENCES history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE history_patient ADD CONSTRAINT FK_3EBDFB016B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE history_symptoms ADD CONSTRAINT FK_8DC7C2591E058452 FOREIGN KEY (history_id) REFERENCES history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE history_symptoms ADD CONSTRAINT FK_8DC7C25967CA3534 FOREIGN KEY (symptoms_id) REFERENCES symptoms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_history ADD CONSTRAINT FK_7AD925A01E058452 FOREIGN KEY (history_id) REFERENCES history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_history ADD CONSTRAINT FK_7AD925A06B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE symptoms_history ADD CONSTRAINT FK_D46FE4711E058452 FOREIGN KEY (history_id) REFERENCES history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE symptoms_history ADD CONSTRAINT FK_D46FE47167CA3534 FOREIGN KEY (symptoms_id) REFERENCES symptoms (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE doctor CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE doctor_id doctor_id INT DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE history CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE cureperiod cureperiod DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE patient CHANGE user_id user_id INT DEFAULT NULL, CHANGE birth_date birth_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE schedule CHANGE work_time work_time VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE specialty CHANGE domain domain VARCHAR(15) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE ticket CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE doctor_id doctor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_role CHANGE user_id user_id INT DEFAULT NULL, CHANGE role_id role_id INT DEFAULT NULL');
    }
}
