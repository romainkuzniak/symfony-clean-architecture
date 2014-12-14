<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Responders\Sprint\SprintResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class SprintResponseDTO implements SprintResponse
{

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var \DateTime
     */
    public $effectiveClosedAt;

    /**
     * @var \DateTime
     */
    public $expectedClosedAt;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $status;

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
    public function getEffectiveClosedAt()
    {
        return $this->effectiveClosedAt;
    }

    /**
     * @return \DateTime
     */
    public function getExpectedClosedAt()
    {
        return $this->expectedClosedAt;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}
