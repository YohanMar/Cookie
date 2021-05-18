<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandesRepository::class)
 */
class Commandes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parent;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Paiements::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paiement;

    /**
     * @ORM\ManyToMany(targetEntity=Cookies::class, inversedBy="commands_cookies")
     */
    private $id_commandes;

    public function __construct()
    {
        $this->id_commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getParent(): ?Users
    {
        return $this->parent;
    }

    public function setParent(?Users $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getPaiement(): ?Paiements
    {
        return $this->paiement;
    }

    public function setPaiement(?Paiements $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * @return Collection|Cookies[]
     */
    public function getIdCommandes(): Collection
    {
        return $this->id_commandes;
    }

    public function addIdCommande(Cookies $idCommande): self
    {
        if (!$this->id_commandes->contains($idCommande)) {
            $this->id_commandes[] = $idCommande;
        }

        return $this;
    }

    public function removeIdCommande(Cookies $idCommande): self
    {
        $this->id_commandes->removeElement($idCommande);

        return $this;
    }
}
