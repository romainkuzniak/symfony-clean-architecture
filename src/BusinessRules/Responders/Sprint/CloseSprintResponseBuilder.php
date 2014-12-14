<?php

namespace BusinessRules\Responders\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CloseSprintResponseBuilder
{
    /**
     * @return CloseSprintResponseBuilder
     */
    public function create();

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withAverageClosedIssues($averageClosedIssues);

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withClosedIssuesCount($closedIssuesCount);

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withSprintId($sprintId);

    /**
     * @return CloseSprintResponse
     */
    public function build();
}
