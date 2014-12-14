<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Requestors\Sprint\GetSprintRequest;
use BusinessRules\Requestors\Sprint\GetSprintRequestBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetSprintRequestBuilderImpl implements GetSprintRequestBuilder
{

    /**
     * @var GetSprintRequestDTO
     */
    private $request;

    /**
     * @return GetSprintRequestBuilder
     */
    public function create()
    {
        $this->request = new GetSprintRequestDTO();

        return $this;
    }

    /**
     * @param int $sprintId
     *
     * @return GetSprintRequestBuilder
     */
    public function withSprintId($sprintId)
    {
        $this->request->sprintId = $sprintId;

        return $this;
    }

    /**
     * @return GetSprintRequest
     */
    public function build()
    {
        return $this->request;
    }
}
