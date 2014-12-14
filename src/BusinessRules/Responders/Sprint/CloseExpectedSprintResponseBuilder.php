<?php

namespace BusinessRules\Responders\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CloseExpectedSprintResponseBuilder
{
    /**
     * @return CloseExpectedSprintResponseBuilder
     */
    public function create();

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withSprintId($sprintId);

    /**
     * @return CloseExpectedSprintResponse
     */
    public function build();
}
