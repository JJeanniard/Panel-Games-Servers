<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DedierIPRepository")
 */
class DedierIP
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
    private $Ip;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Dedier", inversedBy="dedierIPs")
     */
    private $dedier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIp(): ?string
    {
        return $this->Ip;
    }

    public function setIp(string $Ip): self
    {
        $this->Ip = $Ip;

        return $this;
    }

    public function getDedier(): ?Dedier
    {
        return $this->dedier;
    }

    public function setDedier(?Dedier $dedier): self
    {
        $this->dedier = $dedier;

        return $this;
    }
}
