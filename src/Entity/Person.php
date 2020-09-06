<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="Person")
 *
 * @author Philip Washington Sorst <philip@sorst.net>
 */
class Person
{
    /**
     * @OGM\GraphId()
     */
    protected ?int $id = null;

    /**
     * @OGM\Property(type="string")
     */
    protected ?string $name = null;

    /**
     * @OGM\Relationship(type="WORKS_AT", direction="OUTGOING", collection=true, mappedBy="persons", targetEntity="App\Entity\Department")
     *
     * @var Department[]|Collection
     */
    protected $departments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Department[]|Collection
     */
    public function getDepartments()
    {
        return $this->departments;
    }
}
