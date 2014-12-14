<?php

namespace BusinessRules\Requestors\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface GetSprintRequestBuilder
{
    /**
     * @return GetSprintRequestBuilder
     */
    public function create();

    /**
     * @param int $sprintId
     *
     * @return GetSprintRequestBuilder
     */
    public function withSprintId($sprintId);

    /**
     * @return GetSprintRequest
     */
    public function build();
}
