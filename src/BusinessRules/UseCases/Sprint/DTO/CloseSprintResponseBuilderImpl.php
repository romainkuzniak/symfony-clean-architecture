<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Responders\Sprint\CloseSprintResponse;
use BusinessRules\Responders\Sprint\CloseSprintResponseBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintResponseBuilderImpl implements CloseSprintResponseBuilder
{

    /**
     * @var CloseSprintResponseDTO
     */
    private $response;

    /**
     * @return CloseSprintResponseBuilder
     */
    public function create()
    {
        $this->response = new CloseSprintResponseDTO();

        return $this;
    }

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withAverageClosedIssues($averageClosedIssues)
    {
        $this->response->averageClosedIssues = $averageClosedIssues;

        return $this;
    }

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withClosedIssuesCount($closedIssuesCount)
    {
        $this->response->closedIssuesCount = $closedIssuesCount;

        return $this;
    }

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withSprintId($sprintId)
    {
        $this->response->sprintId = $sprintId;

        return $this;
    }

    /**
     * @return CloseSprintResponse
     */
    public function build()
    {
        return $this->response;
    }

}
