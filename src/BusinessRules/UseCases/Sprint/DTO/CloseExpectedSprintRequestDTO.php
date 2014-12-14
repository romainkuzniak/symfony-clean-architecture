<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Requestors\Sprint\CloseExpectedSprintRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseExpectedSprintRequestDTO implements CloseExpectedSprintRequest
{

    /**
     * @var int
     */
    public $sprintId;

    /**
     * @return int
     */
    public function getSprintId()
    {
        return $this->sprintId;
    }
}
