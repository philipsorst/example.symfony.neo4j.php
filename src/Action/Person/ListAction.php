<?php

namespace App\Action\Person;

use App\Entity\Person;
use GraphAware\Neo4j\OGM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/persons/", name="app.person.list")
 *
 * @author Philip Washington Sorst <philip@sorst.net>
 */
class ListAction extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke()
    {
        $repository = $this->entityManager->getRepository(Person::class);
        $persons = $repository->findAll();
        return $this->render('Person/list.html.twig', ['persons' => $persons]);
    }
}
