<?php

namespace BusinessRules\Responders\Sprint;

use OpenClassrooms\UseCase\BusinessRules\Responders\UseCaseResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CloseExpectedSprintResponse extends UseCaseResponse
{
    /**
     * @return int
     */
    public function getSprintId();
}
