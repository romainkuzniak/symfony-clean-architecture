<?php

namespace BusinessRules\Entities\Sprint;

use BusinessRules\Entities\Issue\IssueStub1;
use BusinessRules\Entities\Issue\IssueStub2;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class SprintStub2 extends Sprint
{
    const EXPECTED_CLOSED_AT = '2020-01-01';

    const ID = 2;

    const STATUS = SprintStatus::OPEN;

    protected $id = self::ID;

    protected $status = self::STATUS;

    public function __construct()
    {
        parent::__construct();
        $this->addIssue(new IssueStub1());
        $this->addIssue(new IssueStub2());
        $this->expectedClosedAt = new \DateTime(self::EXPECTED_CLOSED_AT);
    }

}
