<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Entities\Issue\Issue;
use BusinessRules\Entities\Issue\IssueStub1;
use BusinessRules\Entities\Issue\IssueStub2;
use BusinessRules\Entities\Sprint\SprintStatus;
use Carbon\Carbon;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
abstract class AbstractSprintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param IssueStub1|IssueStub2 $stub
     */
    protected function assertClosedIssue($stub, Issue $issue)
    {
        $this->assertEquals(new \DateTime(Carbon::now()->toTimeString()), $issue->getCreatedAt());
        $this->assertEquals(new \DateTime(Carbon::now()->toTimeString()), $issue->getClosedAt());
        $this->assertEquals(new \DateTime($stub::DONE_AT), $issue->getDoneAt());
        $this->assertEquals($stub::ID, $issue->getId());
        $this->assertEquals(SprintStatus::CLOSE, $issue->getStatus());
        $this->assertEquals($stub::DESCRIPTION, $issue->getDescription());
        $this->assertEquals($stub::TITLE, $issue->getTitle());
    }
}
