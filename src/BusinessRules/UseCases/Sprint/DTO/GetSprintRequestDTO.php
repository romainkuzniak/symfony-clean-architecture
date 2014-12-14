<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Requestors\Sprint\GetSprintRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetSprintRequestDTO implements GetSprintRequest
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
