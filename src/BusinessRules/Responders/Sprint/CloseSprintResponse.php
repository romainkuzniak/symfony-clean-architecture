<?php

namespace BusinessRules\Responders\Sprint;

use OpenClassrooms\UseCase\BusinessRules\Responders\UseCaseResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CloseSprintResponse extends UseCaseResponse
{
    /**
     * @return int
     */
    public function getAverageClosedIssues();

    /**
     * @return int
     */
    public function getClosedIssuesCount();

    /**
     * @return int
     */
    public function getSprintId();
}
