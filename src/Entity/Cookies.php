<?php

namespace App\Entity;

use App\Repository\CookiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CookiesRepository::class)
 */
class Cookies
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
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Commandes::class, mappedBy="cookie")
     */
    private $commandes;

    /**
     * @ORM\ManyToMany(targetEntity=Commandes::class, mappedBy="id_commandes")
     */
    private $commands_cookies;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $color;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->commands_cookies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Commandes[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commandes $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->addCookie($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeCookie($this);
        }

        return $this;
    }

    /**
     * @return Collection|Commandes[]
     */
    public function getCommandsCookies(): Collection
    {
        return $this->commands_cookies;
    }

    public function addCommandsCookie(Commandes $commandsCookie): self
    {
        if (!$this->commands_cookies->contains($commandsCookie)) {
            $this->commands_cookies[] = $commandsCookie;
            $commandsCookie->addIdCommande($this);
        }

        return $this;
    }

    public function removeCommandsCookie(Commandes $commandsCookie): self
    {
        if ($this->commands_cookies->removeElement($commandsCookie)) {
            $commandsCookie->removeIdCommande($this);
        }

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }
}
