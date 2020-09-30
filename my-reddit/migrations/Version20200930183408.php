<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200930183408 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote_post ADD post_id INT NOT NULL, ADD user_id INT NOT NULL, ADD vote TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE vote_post ADD CONSTRAINT FK_EDE89DBC4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE vote_post ADD CONSTRAINT FK_EDE89DBCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EDE89DBC4B89032C ON vote_post (post_id)');
        $this->addSql('CREATE INDEX IDX_EDE89DBCA76ED395 ON vote_post (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote_post DROP FOREIGN KEY FK_EDE89DBC4B89032C');
        $this->addSql('ALTER TABLE vote_post DROP FOREIGN KEY FK_EDE89DBCA76ED395');
        $this->addSql('DROP INDEX IDX_EDE89DBC4B89032C ON vote_post');
        $this->addSql('DROP INDEX IDX_EDE89DBCA76ED395 ON vote_post');
        $this->addSql('ALTER TABLE vote_post DROP post_id, DROP user_id, DROP vote');
    }
}
