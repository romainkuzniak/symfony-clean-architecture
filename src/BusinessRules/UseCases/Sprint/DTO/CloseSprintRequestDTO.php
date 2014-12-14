<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Requestors\Sprint\CloseSprintRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintRequestDTO implements CloseSprintRequest
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
