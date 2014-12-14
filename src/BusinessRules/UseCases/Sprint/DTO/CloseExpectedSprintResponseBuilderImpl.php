<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Responders\Sprint\CloseExpectedSprintResponse;
use BusinessRules\Responders\Sprint\CloseExpectedSprintResponseBuilder;
use BusinessRules\Responders\Sprint\CloseSprintResponseBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseExpectedSprintResponseBuilderImpl implements CloseExpectedSprintResponseBuilder
{

    /**
     * @var CloseExpectedSprintResponseDTO
     */
    private $response;

    /**
     * @return CloseExpectedSprintResponseBuilder
     */
    public function create()
    {
        $this->response = new CloseExpectedSprintResponseDTO();

        return $this;
    }

    /**
     * @return CloseSprintResponseBuilder
     */
    public function withSprintId($sprintId)
    {
        $this->response->sprintId = $sprintId;

        return $this;
    }

    /**
     * @return CloseExpectedSprintResponse
     */
    public function build()
    {
        return $this->response;
    }
}
