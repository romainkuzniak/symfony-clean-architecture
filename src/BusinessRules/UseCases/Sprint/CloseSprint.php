<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Gateways\Sprint\SprintGateway;
use BusinessRules\Requestors\Sprint\CloseSprintRequest;
use BusinessRules\Responders\Sprint\CloseSprintResponse;
use BusinessRules\Responders\Sprint\CloseSprintResponseBuilder;
use OpenClassrooms\UseCase\Application\Annotations\Transaction;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprint implements UseCase
{

    /**
     * @var SprintGateway
     */
    private $sprintGateway;

    /**
     * @var CloseSprintResponseBuilder
     */
    private $closeSprintResponseBuilder;

    /**
     * @Transaction
     *
     * @param CloseSprintRequest $useCaseRequest
     *
     * @return CloseSprintResponse
     */
    public function execute(UseCaseRequest $useCaseRequest)
    {
        $sprint = $this->sprintGateway->find($useCaseRequest->getSprintId());
        $sprint->close();
        $this->sprintGateway->update($sprint);

        return $this->closeSprintResponseBuilder
            ->create()
            ->withAverageClosedIssues($this->sprintGateway->findAverageClosedIssues())
            ->withClosedIssuesCount($sprint->getIssuesCount())
            ->withSprintId($sprint->getId())
            ->build();
    }

    public function setSprintGateway(SprintGateway $sprintGateway)
    {
        $this->sprintGateway = $sprintGateway;
    }

    public function setCloseSprintResponseBuilder(CloseSprintResponseBuilder $closeSprintResponseBuilder)
    {
        $this->closeSprintResponseBuilder = $closeSprintResponseBuilder;
    }

}
