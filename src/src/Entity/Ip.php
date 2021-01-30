<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ips
 *
 * @ORM\Table(name="ips", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Ip
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=39, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \Dedier
     *
     * @ORM\ManyToOne(targetEntity="Dediers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="name", referencedColumnName="name")
     * })
     */
    private $name;

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getName(): ?Dedier
    {
        return $this->name;
    }

    public function setName(?Dedier $name): self
    {
        $this->name = $name;

        return $this;
    }


}
