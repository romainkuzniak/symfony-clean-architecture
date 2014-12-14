<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Responders\Sprint\CloseExpectedSprintResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseExpectedSprintResponseDTO implements CloseExpectedSprintResponse
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
