<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RunningSession", mappedBy="user")
     */
    protected $runningSessions;

    public function __construct()
    {
        $this->runningSessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection
     */
    public function getRunningSessions(): Collection
    {
        return $this->runningSessions;
    }

    /**
     * @param ArrayCollection $runningSessions
     *
     * @return User
     */
    public function setRunningSessions(ArrayCollection $runningSessions): User
    {
        $this->runningSessions = $runningSessions;

        return $this;
    }

    /**
     * @param RunningSession $runningSession
     *
     * @return $this
     */
    public function addRunningSession(RunningSession $runningSession): User
    {
        if (!$this->runningSessions->contains($runningSession)) {
            $this->runningSessions->add($runningSession);
            $runningSession->setUser($this);
        }

        return $this;
    }

    /**
     * @param RunningSession $runningSession
     *
     * @return $this
     */
    public function removeRunningSession(RunningSession $runningSession): User
    {
        if ($this->runningSessions->contains($runningSession)) {
            $this->runningSessions->removeElement($runningSession);
            if ($this === $runningSession->getUser()) {
                $runningSession->setUser(null);
            }
        }

        return $this;
    }
}
