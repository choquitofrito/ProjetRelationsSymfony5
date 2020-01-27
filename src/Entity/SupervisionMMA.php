<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupervisionMMARepository")
 */
class SupervisionMMA
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
    private $evaluation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PersonneMMA", inversedBy="supervisionSuperviseur")
     */
    private $superviseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PersonneMMA", inversedBy="supervisionsSupervise")
     */
    private $supervise;

    
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvaluation(): ?string
    {
        return $this->evaluation;
    }

    public function setEvaluation(string $evaluation): self
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function getSuperviseur(): ?PersonneMMA
    {
        return $this->superviseur;
    }

    public function setSuperviseur(?PersonneMMA $superviseur): self
    {
        $this->superviseur = $superviseur;

        return $this;
    }

    public function getSupervise(): ?PersonneMMA
    {
        return $this->supervise;
    }

    public function setSupervise(?PersonneMMA $supervise): self
    {
        $this->supervise = $supervise;

        return $this;
    }

    
}
