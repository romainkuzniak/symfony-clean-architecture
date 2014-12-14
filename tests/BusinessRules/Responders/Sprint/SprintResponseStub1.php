<?php

namespace BusinessRules\Responders\Sprint;

use BusinessRules\Entities\Sprint\SprintStatus;
use BusinessRules\UseCases\Sprint\DTO\SprintResponseDTO;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class SprintResponseStub1 extends SprintResponseDTO
{

    const CREATED_AT = '2014-01-01';

    const EXPECTED_CLOSED_AT = '2014-03-01';

    const EFFECTIVE_CLOSED_AT = '2014-02-01';

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
