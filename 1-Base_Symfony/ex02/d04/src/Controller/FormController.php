<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Attribute\Route;

final class FormController extends AbstractController
{
    #[Route('/e02', name: 'app_form')]
    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('Message', TextType::class)
            ->add('timestamp', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'Send'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $message = $data['Message'];
            $includeTimestamp = $data['timestamp'];
        
            $content = $message;
            if ($includeTimestamp)
                $content .= "[" . (new \DateTime())->format('Y-m-d H:i:s') . "]";
            
            $content .= PHP_EOL;

            $file = $this->getParameter('app.fileName');
            file_put_contents($file, $content, FILE_APPEND);
        }

        return $this->render('form/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
