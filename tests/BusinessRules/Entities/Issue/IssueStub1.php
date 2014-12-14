<?php

namespace BusinessRules\Entities\Issue;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class IssueStub1 extends Issue
{
    const DESCRIPTION = 'Description 1';

    const DONE_AT = null;

    const ID = 10;

    const STATUS = "OPEN";

    const TITLE = 'Issue 1';

    protected $description = self::DESCRIPTION;

    protected $id = self::ID;

    protected $status = self::STATUS;

    protected $title = self::TITLE;

}
