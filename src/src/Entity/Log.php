<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logs
 *
 * @ORM\Table(name="logs", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Log
{
    /**
     * @var \Datas
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Data")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Dediers
     *
     * @ORM\ManyToOne(targetEntity="Dediers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="name", referencedColumnName="name")
     * })
     */
    private $name;

    public function getId(): ?Data
    {
        return $this->id;
    }

    public function setId(?Data $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?Dediers
    {
        return $this->name;
    }

    public function setName(?Dediers $name): self
    {
        $this->name = $name;

        return $this;
    }


}
