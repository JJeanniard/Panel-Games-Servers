<?php

namespace App\Entity;

use App\Repository\DedierDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DedierDataRepository::class)
 */
class DedierData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="json")
     */
    private $cache = [];

    /**
     * @ORM\ManyToOne(targetEntity=Dedier::class, inversedBy="dedierData")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dedier;

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

    public function getCache(): ?array
    {
        return $this->cache;
    }

    public function setCache(array $cache): self
    {
        $this->cache = $cache;

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
