<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Responders\Sprint\CloseSprintResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintResponseDTO implements CloseSprintResponse
{

    /**
     * @var int
     */
    public $averageClosedIssues;

    /**
     * @var int
     */
    public $closedIssuesCount;

    /**
     * @var int
     */
    public $sprintId;

    /**
     * @return int
     */
    public function getAverageClosedIssues()
    {
        return $this->averageClosedIssues;
    }

    /**
     * @return int
     */
    public function getClosedIssuesCount()
    {
        return $this->closedIssuesCount;
    }

    /**
     * @return int
     */
    public function getSprintId()
    {
        return $this->sprintId;
    }

}
