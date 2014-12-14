<?php

namespace BusinessRules\Requestors\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CloseSprintRequestBuilder
{
    /**
     * @return CloseSprintRequestBuilder
     */
    public function create();

    /**
     * @return CloseSprintRequestBuilder
     */
    public function withSprintId($id);

    /**
     * @return CloseSprintRequest
     */
    public function build();
}
