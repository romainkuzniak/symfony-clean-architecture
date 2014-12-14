<?php

namespace BusinessRules\Entities\Sprint;

use BusinessRules\Entities\Issue\Issue;
use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
abstract class Sprint
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $expectedClosedAt;

    /**
     * @var \DateTime
     */
    protected $effectiveClosedAt;

    /**
     * @var Collection|Issue[]
     */
    protected $issues;

    public function __construct()
    {
        $this->issues = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getExpectedClosedAt()
    {
        return $this->expectedClosedAt;
    }

    /**
     * @return \DateTime
     */
    public function getEffectiveClosedAt()
    {
        return $this->effectiveClosedAt;
    }

    /**
     * @param Issue $issues
     */
    public function addIssue(Issue $issues)
    {
        $this->issues[] = $issues;
    }

    /**
     * @return Collection
     */
    public function getIssues()
    {
        return $this->issues;
    }

    /**
     * @return int
     */
    public function getIssuesCount()
    {
        return $this->issues->count();
    }

    public function close()
    {
        if ($this->isClosed()) {
            throw new SprintAlreadyClosedException();
        }

        foreach ($this->issues as $issue) {
            if ($issue->isDone()) {
                $issue->close();
            } else {
                $this->issues->removeElement($issue);
            }
        }

        $this->setEffectiveClosedAt(new \DateTime(Carbon::now()->toDateTimeString()));
        $this->status = SprintStatus::CLOSE;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return SprintStatus::CLOSE === $this->getStatus();
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setEffectiveClosedAt(\DateTime $closedAt)
    {
        $this->effectiveClosedAt = $closedAt;
    }
}
