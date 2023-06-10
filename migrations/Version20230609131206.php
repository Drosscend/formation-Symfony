<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230609131206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_category (article_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_53A4EDAA7294869C (article_id), INDEX IDX_53A4EDAA12469DE2 (category_id), PRIMARY KEY(article_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chanson_artiste (chanson_id INT NOT NULL, artiste_id INT NOT NULL, INDEX IDX_77F23BCD2D0460C5 (chanson_id), INDEX IDX_77F23BCD21D25844 (artiste_id), PRIMARY KEY(chanson_id, artiste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chanson_artiste ADD CONSTRAINT FK_77F23BCD2D0460C5 FOREIGN KEY (chanson_id) REFERENCES chanson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chanson_artiste ADD CONSTRAINT FK_77F23BCD21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_chanson DROP FOREIGN KEY FK_D5BB76A221D25844');
        $this->addSql('ALTER TABLE artiste_chanson DROP FOREIGN KEY FK_D5BB76A22D0460C5');
        $this->addSql('ALTER TABLE category_article DROP FOREIGN KEY FK_C5E24E1812469DE2');
        $this->addSql('ALTER TABLE category_article DROP FOREIGN KEY FK_C5E24E187294869C');
        $this->addSql('DROP TABLE artiste_chanson');
        $this->addSql('DROP TABLE category_article');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste_chanson (artiste_id INT NOT NULL, chanson_id INT NOT NULL, INDEX IDX_D5BB76A22D0460C5 (chanson_id), INDEX IDX_D5BB76A221D25844 (artiste_id), PRIMARY KEY(artiste_id, chanson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category_article (category_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_C5E24E1812469DE2 (category_id), INDEX IDX_C5E24E187294869C (article_id), PRIMARY KEY(category_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE artiste_chanson ADD CONSTRAINT FK_D5BB76A221D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_chanson ADD CONSTRAINT FK_D5BB76A22D0460C5 FOREIGN KEY (chanson_id) REFERENCES chanson (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_article ADD CONSTRAINT FK_C5E24E1812469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_article ADD CONSTRAINT FK_C5E24E187294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA7294869C');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA12469DE2');
        $this->addSql('ALTER TABLE chanson_artiste DROP FOREIGN KEY FK_77F23BCD2D0460C5');
        $this->addSql('ALTER TABLE chanson_artiste DROP FOREIGN KEY FK_77F23BCD21D25844');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE chanson_artiste');
    }
}
