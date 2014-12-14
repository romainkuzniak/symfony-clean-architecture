<?php

namespace AppBundle\ViewModels\Web\Sprint;

use BusinessRules\Entities\Sprint\SprintStatus;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class ShowStub1 extends Show
{
    const CREATED_AT = '2014-01-01T00:00:00+0100';

    const EFFECTIVE_CLOSED_AT = '2014-02-01T00:00:00+0100';

    const EXPECTED_CLOSED_AT = '2014-03-01T00:00:00+0100';

    const ID = 1;

    const STATUS = SprintStatus::CLOSE;

    public $sprintId = self::ID;

    public $sprintStatus = self::STATUS;

    public function __construct()
    {
        $this->sprintCreatedAt = new \DateTime(self::CREATED_AT);
        $this->sprintExpectedClosedAt = new \DateTime(self::EXPECTED_CLOSED_AT);
        $this->sprintEffectiveClosedAt = new \DateTime(self::EFFECTIVE_CLOSED_AT);
    }
}
