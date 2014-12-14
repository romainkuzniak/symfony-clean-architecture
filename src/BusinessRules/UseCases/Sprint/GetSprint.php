<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Gateways\Sprint\SprintGateway;
use BusinessRules\Requestors\Sprint\GetSprintRequest;
use BusinessRules\Responders\Sprint\SprintResponse;
use BusinessRules\Responders\Sprint\SprintResponseAssembler;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCase;
use OpenClassrooms\UseCase\BusinessRules\Requestors\UseCaseRequest;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetSprint implements UseCase
{

    /**
     * @var SprintGateway
     */
    private $sprintGateway;

    /**
     * @var SprintResponseAssembler
     */
    private $sprintResponseAssembler;

    /**
     * @param GetSprintRequest $useCaseRequest
     *
     * @return SprintResponse
     */
    public function execute(UseCaseRequest $useCaseRequest)
    {
        $sprint = $this->sprintGateway->find($useCaseRequest->getSprintId());

        return $this->sprintResponseAssembler->write($sprint);
    }

    public function setSprintGateway(SprintGateway $sprintGateway)
    {
        $this->sprintGateway = $sprintGateway;
    }

    public function setSprintResponseAssembler(SprintResponseAssembler $sprintResponseAssembler)
    {
        $this->sprintResponseAssembler = $sprintResponseAssembler;
    }
}
