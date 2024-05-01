<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ObjectManager;
use RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class AppFixtures extends Fixture
{
    private $projectDir;

    public function __construct(private Connection $connection, ParameterBagInterface $parameterBag)
    {
        $this->projectDir = $parameterBag->get('kernel.project_dir');
    }

    public function load(ObjectManager $manager): void
    {
        // charger un fichier sql de fixtures
        $sql = file_get_contents($this->projectDir . '/data/data_fixtures.sql');
        try {
            $this->connection->executeStatement($sql);
        } catch (Exception $e) {
            throw new RuntimeException('Erreur lors de l\'exécution de la requête SQL', 0, $e);
        }
    }
}