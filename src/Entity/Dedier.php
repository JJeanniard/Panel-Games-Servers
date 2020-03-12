<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DedierRepository")
 */
class Dedier
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
    private $name;

    /**
     * @ORM\Column(type="blob")
     */
    private $username;

    /**
     * @ORM\Column(type="blob")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $system;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $port;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DedierIP", mappedBy="dedier")
     */
    private $dedierIPs;

    public function __construct()
    {
        $this->dedierIPs = new ArrayCollection();
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

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSystem(): ?string
    {
        return $this->system;
    }

    public function setSystem(string $system): self
    {
        $this->system = $system;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getPort(): ?string
    {
        return $this->port;
    }

    public function setPort(string $port): self
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return Collection|DedierIP[]
     */
    public function getDedierIPs(): Collection
    {
        return $this->dedierIPs;
    }

    public function addDedierIP(DedierIP $dedierIP): self
    {
        if (!$this->dedierIPs->contains($dedierIP)) {
            $this->dedierIPs[] = $dedierIP;
            $dedierIP->setDedier($this);
        }

        return $this;
    }

    public function removeDedierIP(DedierIP $dedierIP): self
    {
        if ($this->dedierIPs->contains($dedierIP)) {
            $this->dedierIPs->removeElement($dedierIP);
            // set the owning side to null (unless already changed)
            if ($dedierIP->getDedier() === $this) {
                $dedierIP->setDedier(null);
            }
        }

        return $this;
    }
}
