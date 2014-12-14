<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Gateways\Sprint\SprintGateway;
use BusinessRules\Requestors\Sprint\CloseExpectedSprintRequest;
use BusinessRules\Responders\Sprint\CloseExpectedSprintResponse;
use BusinessRules\Responders\Sprint\CloseExpectedSprintResponseBuilder;
use OpenClassrooms\UseCase\Application\Annotations\Transaction;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseExpectedSprint implements UseCase
{

    /**
     * @var SprintGateway
     */
    private $sprintGateway;

    /**
     * @var CloseExpectedSprintResponseBuilder
     */
    private $closeExpectedSprintResponseBuilder;

    /**
     * @Transaction
     *
     * @param CloseExpectedSprintRequest $useCaseRequest
     *
     * @return CloseExpectedSprintResponse
     */
    public function execute(UseCaseRequest $useCaseRequest)
    {
        $sprint = $this->sprintGateway->findSprintToClose($useCaseRequest->getSprintId());
        $sprint->close();
        $this->sprintGateway->update($sprint);

        return $this->closeExpectedSprintResponseBuilder
            ->create()
            ->withSprintId($sprint->getId())
            ->build();
    }

    public function setSprintGateway(SprintGateway $sprintGateway)
    {
        $this->sprintGateway = $sprintGateway;
    }

    public function setCloseExpectedSprintResponseBuilder(
        CloseExpectedSprintResponseBuilder $closeExpectedSprintResponseBuilder
    )
    {
        $this->closeExpectedSprintResponseBuilder = $closeExpectedSprintResponseBuilder;
    }

}
