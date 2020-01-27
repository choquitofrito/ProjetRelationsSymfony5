<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personne", inversedBy="supervises")
     */
    private $superviseurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personne", mappedBy="superviseurs")
     */
    private $supervises;

    public function __construct()
    {
        $this->superviseurs = new ArrayCollection();
        $this->supervises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSuperviseurs(): Collection
    {
        return $this->superviseurs;
    }

    public function addSuperviseur(self $superviseur): self
    {
        if (!$this->superviseurs->contains($superviseur)) {
            $this->superviseurs[] = $superviseur;
        }

        return $this;
    }

    public function removeSuperviseur(self $superviseur): self
    {
        if ($this->superviseurs->contains($superviseur)) {
            $this->superviseurs->removeElement($superviseur);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSupervises(): Collection
    {
        return $this->supervises;
    }

    public function addSupervise(self $supervise): self
    {
        if (!$this->supervises->contains($supervise)) {
            $this->supervises[] = $supervise;
            $supervise->addSuperviseur($this);
        }

        return $this;
    }

    public function removeSupervise(self $supervise): self
    {
        if ($this->supervises->contains($supervise)) {
            $this->supervises->removeElement($supervise);
            $supervise->removeSuperviseur($this);
        }

        return $this;
    }
}
