<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214215732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_post_id INT NOT NULL, text VARCHAR(255) NOT NULL, up_votes INT NOT NULL, down_votes INT NOT NULL, INDEX IDX_9474526C79F37AE5 (id_user_id), INDEX IDX_9474526C9514AA5C (id_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE identify (id INT AUTO_INCREMENT NOT NULL, id_post_id INT NOT NULL, id_tag_id INT NOT NULL, INDEX IDX_126199179514AA5C (id_post_id), INDEX IDX_126199179CE5D6FC (id_tag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, text VARCHAR(255) NOT NULL, up_votes INT NOT NULL, down_votes INT NOT NULL, INDEX IDX_5A8A6C8DC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, full_name VARCHAR(30) NOT NULL, color VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, mail_adress VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE identify ADD CONSTRAINT FK_126199179514AA5C FOREIGN KEY (id_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE identify ADD CONSTRAINT FK_126199179CE5D6FC FOREIGN KEY (id_tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9514AA5C');
        $this->addSql('ALTER TABLE identify DROP FOREIGN KEY FK_126199179514AA5C');
        $this->addSql('ALTER TABLE identify DROP FOREIGN KEY FK_126199179CE5D6FC');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C79F37AE5');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DC6EE5C49');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE identify');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE `user`');
    }
}
