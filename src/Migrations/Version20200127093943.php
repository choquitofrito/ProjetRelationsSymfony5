<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200127093943 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE personne_h (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, nationalite VARCHAR(255) DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avatar (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, fichier LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_1677722F19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, categorie_parent_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_497DD634DF25C577 (categorie_parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_exemplaire (client_id INT NOT NULL, exemplaire_id INT NOT NULL, INDEX IDX_CEAC01D319EB6921 (client_id), INDEX IDX_CEAC01D35843AA21 (exemplaire_id), PRIMARY KEY(client_id, exemplaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exemplaire (id INT AUTO_INCREMENT NOT NULL, etat LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_personne (personne_source INT NOT NULL, personne_target INT NOT NULL, INDEX IDX_CC1CC8AA6BF0479E (personne_source), INDEX IDX_CC1CC8AA72151711 (personne_target), PRIMARY KEY(personne_source, personne_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_mma (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supervision_mma (id INT AUTO_INCREMENT NOT NULL, superviseur_id INT DEFAULT NULL, supervise_id INT DEFAULT NULL, evaluation VARCHAR(255) NOT NULL, INDEX IDX_D334C8D1B7BB80FF (superviseur_id), INDEX IDX_D334C8D1227586CB (supervise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avatar ADD CONSTRAINT FK_1677722F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634DF25C577 FOREIGN KEY (categorie_parent_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE client_exemplaire ADD CONSTRAINT FK_CEAC01D319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_exemplaire ADD CONSTRAINT FK_CEAC01D35843AA21 FOREIGN KEY (exemplaire_id) REFERENCES exemplaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_personne ADD CONSTRAINT FK_CC1CC8AA6BF0479E FOREIGN KEY (personne_source) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne_personne ADD CONSTRAINT FK_CC1CC8AA72151711 FOREIGN KEY (personne_target) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE supervision_mma ADD CONSTRAINT FK_D334C8D1B7BB80FF FOREIGN KEY (superviseur_id) REFERENCES personne_mma (id)');
        $this->addSql('ALTER TABLE supervision_mma ADD CONSTRAINT FK_D334C8D1227586CB FOREIGN KEY (supervise_id) REFERENCES personne_mma (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634DF25C577');
        $this->addSql('ALTER TABLE avatar DROP FOREIGN KEY FK_1677722F19EB6921');
        $this->addSql('ALTER TABLE client_exemplaire DROP FOREIGN KEY FK_CEAC01D319EB6921');
        $this->addSql('ALTER TABLE client_exemplaire DROP FOREIGN KEY FK_CEAC01D35843AA21');
        $this->addSql('ALTER TABLE personne_personne DROP FOREIGN KEY FK_CC1CC8AA6BF0479E');
        $this->addSql('ALTER TABLE personne_personne DROP FOREIGN KEY FK_CC1CC8AA72151711');
        $this->addSql('ALTER TABLE supervision_mma DROP FOREIGN KEY FK_D334C8D1B7BB80FF');
        $this->addSql('ALTER TABLE supervision_mma DROP FOREIGN KEY FK_D334C8D1227586CB');
        $this->addSql('DROP TABLE personne_h');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_exemplaire');
        $this->addSql('DROP TABLE exemplaire');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE personne_personne');
        $this->addSql('DROP TABLE personne_mma');
        $this->addSql('DROP TABLE supervision_mma');
    }
}
