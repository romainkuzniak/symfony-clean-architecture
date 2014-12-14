<?php

namespace BusinessRules\Responders\Sprint;

use BusinessRules\UseCases\Sprint\DTO\CloseSprintResponseDTO;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintResponseStub1 extends CloseSprintResponseDTO
{
    const AVERAGE_CLOSED_ISSUES = 10;

    const CLOSED_ISSUES_COUNT = 20;

    const SPRINT_ID = 1;

    /**
     * @var int
     */
    public $averageClosedIssues = self::AVERAGE_CLOSED_ISSUES;

    /**
     * @var int
     */
    public $closedIssuesCount = self::CLOSED_ISSUES_COUNT;

    /**
     * @var int
     */
    public $sprintId = self::SPRINT_ID;

}
