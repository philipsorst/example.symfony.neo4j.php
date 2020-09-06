<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @author Philip Washington Sorst <philip@sorst.net>
 */
class Department
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
     * @var Person[]|Collection
     *
     * @OGM\Relationship(type="WORKS_AT", direction="INCOMING", collection=true, mappedBy="departments", targetEntity="App\Entity\Person")
     */
    protected $persons;

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
     * @return Person[]|Collection
     */
    public function getPersons()
    {
        return $this->persons;
    }
}
