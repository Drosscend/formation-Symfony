<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608125238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, date_naissance DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', INDEX IDX_9C07354FBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_chanson (artiste_id INT NOT NULL, chanson_id INT NOT NULL, INDEX IDX_D5BB76A221D25844 (artiste_id), INDEX IDX_D5BB76A22D0460C5 (chanson_id), PRIMARY KEY(artiste_id, chanson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chanson (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) NOT NULL, date_sortie DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354FBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE artiste_chanson ADD CONSTRAINT FK_D5BB76A221D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_chanson ADD CONSTRAINT FK_D5BB76A22D0460C5 FOREIGN KEY (chanson_id) REFERENCES chanson (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354FBCF5E72D');
        $this->addSql('ALTER TABLE artiste_chanson DROP FOREIGN KEY FK_D5BB76A221D25844');
        $this->addSql('ALTER TABLE artiste_chanson DROP FOREIGN KEY FK_D5BB76A22D0460C5');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE artiste_chanson');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE chanson');
    }
}
