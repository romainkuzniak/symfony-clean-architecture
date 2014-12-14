<?php

namespace AppBundle\ViewModels\Api\Sprint;

use BusinessRules\Entities\Sprint\SprintStatus;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetStub1 extends Get
{
    const CREATED_AT = '2014-01-01T00:00:00+0100';

    const EFFECTIVE_CLOSED_AT = '2014-02-01T00:00:00+0100';

    const EXPECTED_CLOSED_AT = '2014-03-01T00:00:00+0100';

    const ID = 1;

    const STATUS = SprintStatus::CLOSE;

    public $id = self::ID;

    public $status = self::STATUS;

    public function __construct()
    {
        $this->createdAt = new \DateTime(self::CREATED_AT);
        $this->expectedClosedAt = new \DateTime(self::EXPECTED_CLOSED_AT);
        $this->effectiveClosedAt = new \DateTime(self::EFFECTIVE_CLOSED_AT);
    }
}
