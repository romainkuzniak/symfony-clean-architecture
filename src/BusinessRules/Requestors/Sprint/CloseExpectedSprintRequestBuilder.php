<?php

namespace BusinessRules\Requestors\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CloseExpectedSprintRequestBuilder
{
    /**
     * @return CloseExpectedSprintRequestBuilder
     */
    public function create();

    /**
     * @return CloseExpectedSprintRequestBuilder
     */
    public function withSprintId($id);

    /**
     * @return CloseExpectedSprintRequest
     */
    public function build();
}
