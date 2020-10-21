<?php

namespace App\Entity;

use App\Repository\ComputerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComputerRepository::class)
 */
class Computer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Assign::class, mappedBy="id_computer")
     */
    private $assigns;

    public function __construct()
    {
        $this->assigns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Assign[]
     */
    public function getAssigns(): Collection
    {
        return $this->assigns;
    }

    public function addAssign(Assign $assign): self
    {
        if (!$this->assigns->contains($assign)) {
            $this->assigns[] = $assign;
            $assign->setIdComputer($this);
        }

        return $this;
    }

    public function removeAssign(Assign $assign): self
    {
        if ($this->assigns->contains($assign)) {
            $this->assigns->removeElement($assign);
            // set the owning side to null (unless already changed)
            if ($assign->getIdComputer() === $this) {
                $assign->setIdComputer(null);
            }
        }

        return $this;
    }
}
