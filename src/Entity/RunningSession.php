<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 */
class RunningSession
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @Groups({"running_session"})
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     *
     * @Groups({"running_session"})
     */
    protected $start;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @Groups({"running_session"})
     */
    protected $duration;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     *
     * @Groups({"running_session"})
     */
    protected $distance;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     *
     * @Groups({"running_session"})
     */
    protected $comment;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     *
     * @Groups({"running_session"})
     */
    protected $averageSpeed;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @Groups({"running_session"})
     */
    protected $pace;

    /**
     * @var RunningSessionType
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\RunningSessionType")
     * @ORM\Column(nullable=false)
     *
     * @Groups({"running_session"})
     */
    protected $type;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="runningSessions")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Groups({"running_session"})
     */
    protected $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getStart(): ?\DateTime
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     *
     * @return RunningSession
     */
    public function setStart(\DateTime $start): RunningSession
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return RunningSession
     */
    public function setDuration(int $duration): RunningSession
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float
     */
    public function getDistance(): ?float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     *
     * @return RunningSession
     */
    public function setDistance(float $distance): RunningSession
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return RunningSession
     */
    public function setComment(?string $comment): RunningSession
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return float
     */
    public function getAverageSpeed(): ?float
    {
        return $this->averageSpeed;
    }

    /**
     * @param float $averageSpeed
     *
     * @return RunningSession
     */
    public function setAverageSpeed(float $averageSpeed): RunningSession
    {
        $this->averageSpeed = $averageSpeed;

        return $this;
    }

    /**
     * @return int
     */
    public function getPace(): ?int
    {
        return $this->pace;
    }

    /**
     * @param int $pace
     *
     * @return RunningSession
     */
    public function setPace(int $pace): RunningSession
    {
        $this->pace = $pace;

        return $this;
    }

    /**
     * @return RunningSessionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param RunningSessionType $type
     *
     * @return RunningSession
     */
    public function setType(RunningSessionType $type): RunningSession
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return RunningSession
     */
    public function setUser(User $user): RunningSession
    {
        $this->user = $user;

        return $this;
    }
}
