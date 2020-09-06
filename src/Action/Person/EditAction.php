<?php

namespace App\Action\Person;

use App\Entity\Person;
use App\Form\Type\PersonType;
use GraphAware\Neo4j\OGM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/persons/__NEW__/edit", name="app.person.create")
 * @Route(path="/persons/{id}/edit", name="app.person.edit")
 *
 * @author Philip Washington Sorst <philip@sorst.net>
 */
class EditAction extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(Request $request, int $id = null): Response
    {
        $person = new Person();
        $form = $this->createForm(PersonType::class, $person);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (null === $person->getId()) {
                $this->entityManager->persist($person);
            }
            $this->entityManager->flush();
            return $this->redirectToRoute('app.person.list');
        }

        return $this->render('Person/edit.html.twig', ['form' => $form->createView()]);
    }
}
