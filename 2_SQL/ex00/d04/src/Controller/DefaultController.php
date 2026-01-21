<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\DBAL\DriverManager;

final class DefaultController extends AbstractController
{
    #[Route('/create-table', name: 'create_table')]
    public function create_table(): Response
    {
        $message = '';
        $connectionParams = [
            'url' => $_ENV['DATABASE_URL'],
        ];

        try {

            $conn = DriverManager::getConnection($connectionParams);

            $sql = "
                CREATE TABLE `newTable`(
                id INT PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(50) UNIQUE NOT NULL,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                enable BOOLEAN DEFAULT TRUE,
                birthdate DATETIME
            )";

            $conn->executeStatement($sql);
            $message = 'Table created successfully!';
        }
        catch (\Exception $e) {
            $message = 'Error creating table ...';
        }

        return $this->render('create.html.twig', [
            'message' => $message,
        ]);
    }
}
