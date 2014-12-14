<?php

namespace BusinessRules\Responders\Sprint;

use OpenClassrooms\UseCase\BusinessRules\Responders\UseCaseResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface SprintResponse extends UseCaseResponse
{
    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return \DateTime
     */
    public function getEffectiveClosedAt();

    /**
     * @return \DateTime
     */
    public function getExpectedClosedAt();

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getStatus();
}
