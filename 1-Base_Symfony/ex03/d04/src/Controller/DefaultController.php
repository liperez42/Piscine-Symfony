<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/e03', name: 'shades')]
    public function colors() : Response
    {
        $nb_shades = $this->getParameter('e03.number_of_colors');

        $colors = ['black', 'red', 'blue', 'green'];

        $shades = [];
        foreach($colors as $color)
        {
            $shades[$color] = $this->generateShades($color, $nb_shades);
        }

        return $this->render('shades.html.twig', [
            'nb_shades' => $nb_shades,
            'colors' => $colors,
            'shades' => $shades,
        ]);
    }

    private function generateShades(string $color, int $nbr): array
    {
        $shades = [];
        for ($i = 0; $i < $nbr; $i++) 
        {
            switch ($color) {
                case 'black':
                    $luminosity = 0 + ($i * (200 / $nbr));
                    $shades[] = sprintf('#%02x%02x%02x', $luminosity, $luminosity, $luminosity);
                    break;
                case 'red':
                    $shadeValue = 255 - ($i * (255 / $nbr));
                    $shades[] = sprintf('#ff%02x%02x', $shadeValue, $shadeValue);
                    break;
                case 'blue':
                    $shadeValue = 255 - ($i * (255 / $nbr));
                    $shades[] = sprintf('#%02x%02xff', $shadeValue, $shadeValue);
                    break;
                case 'green':
                    $shadeValue = 255 - ($i * (255 / $nbr));
                    $shades[] = sprintf('#%02xff%02x', $shadeValue, $shadeValue);
                    break;
            }
        }
        return $shades;
    }
}