<?php

namespace BusinessRules\Entities\Issue;

use Carbon\Carbon;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
abstract class Issue
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $doneAt;

    /**
     * @var \DateTime
     */
    protected $closedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime(Carbon::now()->toTimeString());
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getDoneAt()
    {
        return $this->doneAt;
    }

    /**
     * @return \DateTime
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * @return bool
     */
    public function isDone()
    {
        return IssueStatus::DONE === $this->getStatus();
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function close()
    {
        if ($this->isClosed()) {
            throw new IssueAlreadyClosedException();
        }

        $this->closedAt = new \DateTime();
        $this->status = IssueStatus::CLOSE;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return IssueStatus::CLOSE === $this->getStatus();
    }
}
