<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Requestors\Sprint\CloseSprintRequest;
use BusinessRules\Requestors\Sprint\CloseSprintRequestBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintRequestBuilderImpl implements CloseSprintRequestBuilder
{

    /**
     * @var CloseSprintRequestDTO
     */
    private $request;

    /**
     * @return CloseSprintRequestBuilder
     */
    public function create()
    {
        $this->request = new CloseSprintRequestDTO();

        return $this;
    }

    /**
     * @return CloseSprintRequestBuilder
     */
    public function withSprintId($sprintId)
    {
        $this->request->sprintId = $sprintId;

        return $this;
    }

    /**
     * @return CloseSprintRequest
     */
    public function build()
    {
        return $this->request;
    }

}
