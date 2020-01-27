<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneMMARepository")
 */
class PersonneMMA
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
     * @ORM\OneToMany(targetEntity="App\Entity\SupervisionMMA", mappedBy="superviseur")
     */
    private $supervisionSuperviseur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SupervisionMMA", mappedBy="supervise")
     */
    private $supervisionsSupervise;


   

    public function __construct()
    {
        $this->supervisionSuperviseur = new ArrayCollection();
        $this->supervisionsSupervise = new ArrayCollection();
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
     * @return Collection|SupervisionMMA[]
     */
    public function getSupervisionSuperviseur(): Collection
    {
        return $this->supervisionSuperviseur;
    }

    public function addSupervisionSuperviseur(SupervisionMMA $supervisionSuperviseur): self
    {
        if (!$this->supervisionSuperviseur->contains($supervisionSuperviseur)) {
            $this->supervisionSuperviseur[] = $supervisionSuperviseur;
            $supervisionSuperviseur->setSuperviseur($this);
        }

        return $this;
    }

    public function removeSupervisionSuperviseur(SupervisionMMA $supervisionSuperviseur): self
    {
        if ($this->supervisionSuperviseur->contains($supervisionSuperviseur)) {
            $this->supervisionSuperviseur->removeElement($supervisionSuperviseur);
            // set the owning side to null (unless already changed)
            if ($supervisionSuperviseur->getSuperviseur() === $this) {
                $supervisionSuperviseur->setSuperviseur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SupervisionMMA[]
     */
    public function getSupervisionsSupervise(): Collection
    {
        return $this->supervisionsSupervise;
    }

    public function addSupervisionsSupervise(SupervisionMMA $supervisionsSupervise): self
    {
        if (!$this->supervisionsSupervise->contains($supervisionsSupervise)) {
            $this->supervisionsSupervise[] = $supervisionsSupervise;
            $supervisionsSupervise->setSupervise($this);
        }

        return $this;
    }

    public function removeSupervisionsSupervise(SupervisionMMA $supervisionsSupervise): self
    {
        if ($this->supervisionsSupervise->contains($supervisionsSupervise)) {
            $this->supervisionsSupervise->removeElement($supervisionsSupervise);
            // set the owning side to null (unless already changed)
            if ($supervisionsSupervise->getSupervise() === $this) {
                $supervisionsSupervise->setSupervise(null);
            }
        }

        return $this;
    }

    
}
