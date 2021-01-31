<?php

namespace App\Entity;

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


}
