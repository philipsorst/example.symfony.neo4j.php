<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;

/**
 * @author Philip Washington Sorst <philip@sorst.net>
 */
class Group
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
     * @OGM\Relationship(type="BELONGS_TO", direction="INCOMING", collection=true, mappedBy="groups", targetEntity="App\Entity\Person")
     *
     * @var Person[]|Collection
     */
    protected $persons;

    public function getId(): ?int
    {
        return $this->id;
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
