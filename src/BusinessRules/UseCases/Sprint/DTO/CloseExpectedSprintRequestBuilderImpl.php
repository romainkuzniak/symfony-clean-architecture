<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Requestors\Sprint\CloseExpectedSprintRequest;
use BusinessRules\Requestors\Sprint\CloseExpectedSprintRequestBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseExpectedSprintRequestBuilderImpl implements CloseExpectedSprintRequestBuilder
{

    /**
     * @var CloseExpectedSprintRequestDTO
     */
    private $request;

    /**
     * @return CloseExpectedSprintRequestBuilder
     */
    public function create()
    {
        $this->request = new CloseExpectedSprintRequestDTO();

        return $this;
    }

    /**
     * @return CloseExpectedSprintRequestBuilder
     */
    public function withSprintId($sprintId)
    {
        $this->request->sprintId = $sprintId;

        return $this;
    }

    /**
     * @return CloseExpectedSprintRequest
     */
    public function build()
    {
        return $this->request;
    }

}
