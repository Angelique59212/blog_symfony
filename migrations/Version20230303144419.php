<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303144419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD user_id INT DEFAULT NULL, ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E667294869C FOREIGN KEY (article_id) REFERENCES comments (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66A76ED395 ON article (user_id)');
        $this->addSql('CREATE INDEX IDX_23A0E667294869C ON article (article_id)');
        $this->addSql('ALTER TABLE role ADD role_using_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A40C9283C FOREIGN KEY (role_using_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A40C9283C ON role (role_using_id)');
        $this->addSql('ALTER TABLE user ADD user_using_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498A972A0D FOREIGN KEY (user_using_id) REFERENCES comments (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498A972A0D ON user (user_using_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E667294869C');
        $this->addSql('DROP INDEX IDX_23A0E66A76ED395 ON article');
        $this->addSql('DROP INDEX IDX_23A0E667294869C ON article');
        $this->addSql('ALTER TABLE article DROP user_id, DROP article_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498A972A0D');
        $this->addSql('DROP INDEX IDX_8D93D6498A972A0D ON user');
        $this->addSql('ALTER TABLE user DROP user_using_id');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A40C9283C');
        $this->addSql('DROP INDEX IDX_57698A6A40C9283C ON role');
        $this->addSql('ALTER TABLE role DROP role_using_id');
    }
}
