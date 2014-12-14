<?php

namespace BusinessRules\Entities\Sprint;

use BusinessRules\Entities\Issue\IssueStub1;
use BusinessRules\Entities\Issue\IssueStub2;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class SprintStub1 extends Sprint
{
    const CREATED_AT = '2014-01-01';

    const EXPECTED_CLOSED_AT = '2014-03-01';

    const EFFECTIVE_CLOSED_AT = '2014-02-01';

    const ID = 1;

    const STATUS = SprintStatus::CLOSE;

    protected $id = self::ID;

    protected $status = self::STATUS;

    public function __construct()
    {
        parent::__construct();
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->addIssue(new IssueStub1());
        $this->addIssue(new IssueStub2());
        $this->expectedClosedAt = new \DateTime(self::EXPECTED_CLOSED_AT);
        $this->effectiveClosedAt = new \DateTime(self::EFFECTIVE_CLOSED_AT);
    }

}
