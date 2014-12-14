<?php

namespace BusinessRules\Entities\Issue;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class IssueStub2 extends Issue
{
    const DESCRIPTION = 'Description 1';

    const DONE_AT = '2014-02-01';

    const ID = 20;

    const STATUS = "DONE";

    const TITLE = 'Issue 2';

    protected $id = self::ID;

    protected $status = self::STATUS;

    protected $description = self::DESCRIPTION;

    protected $title = self::TITLE;

    public function __construct()
    {
        parent::__construct();
        $this->doneAt = new \DateTime(self::DONE_AT);
    }

}
