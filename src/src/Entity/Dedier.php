<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dediers
 *
 * @ORM\Table(name="dediers")
 * @ORM\Entity
 */
class Dedier
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private string $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ssh_login", type="string", length=50, nullable=false)
     */
    private string $sshLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ssh_password", type="string", length=50, nullable=true)
     */
    private string $sshPassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ssh_key", type="string", length=50, nullable=true)
     */
    private string $sshKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private string $description;

    /**
     * @ORM\Column(type="integer")
     */
    private int $sshPort;

    /**
     * @ORM\OneToMany(targetEntity=Ip::class, mappedBy="name", orphanRemoval=true)
     */
    private Ip $Ips;

    public function __construct()
    {
        $this->Ips = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSshLogin(): ?string
    {
        return $this->sshLogin;
    }

    public function setSshLogin(string $sshLogin): self
    {
        $this->sshLogin = $sshLogin;

        return $this;
    }

    public function getSshPassword(): ?string
    {
        return $this->sshPassword;
    }

    public function setSshPassword(?string $sshPassword): self
    {
        $this->sshPassword = $sshPassword;

        return $this;
    }

    public function getSshKey(): ?string
    {
        return $this->sshKey;
    }

    public function setSshKey(?string $sshKey): self
    {
        $this->sshKey = $sshKey;

        return $this;
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

    public function getSshPort(): ?int
    {
        return $this->sshPort;
    }

    public function setSshPort(int $sshPort): self
    {
        $this->sshPort = $sshPort;

        return $this;
    }

    /**
     * @return Collection|Ip[]
     */
    public function getIps(): Collection
    {
        return $this->Ips;
    }

    public function addIp(Ip $ip): self
    {
        if (!$this->Ips->contains($ip)) {
            $this->Ips[] = $ip;
            $ip->setDedier($this);
        }

        return $this;
    }

    public function removeIp(Ip $ip): self
    {
        if ($this->Ips->removeElement($ip)) {
            // set the owning side to null (unless already changed)
            if ($ip->getDedier() === $this) {
                $ip->setDedier(null);
            }
        }

        return $this;
    }


}
