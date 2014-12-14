<?php

namespace AppBundle\ViewModels\Api\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseStub1 extends Close
{
    const AVERAGE_CLOSED_ISSUES = 10;

    const CLOSED_ISSUES_COUNT = 20;

    /**
     * @var int
     */
    public $averageClosedIssues = self::AVERAGE_CLOSED_ISSUES;

    /**
     * @var int
     */
    public $closedIssuesCount = self::CLOSED_ISSUES_COUNT;

}
