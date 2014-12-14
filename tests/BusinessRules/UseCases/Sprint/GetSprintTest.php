<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Entities\Sprint\SprintStub1;
use BusinessRules\Gateways\Sprint\InMemorySprintGateway;
use BusinessRules\Requestors\Sprint\GetSprintRequestBuilder;
use BusinessRules\UseCases\Sprint\DTO\GetSprintRequestBuilderImpl;
use BusinessRules\UseCases\Sprint\DTO\SprintResponseAssemblerImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetSprintTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var GetSprint
     */
    private $useCase;

    /**
     * @var GetSprintRequestBuilder
     */
    private $requestBuilder;

    /**
     * @test
     * @expectedException \BusinessRules\Entities\Sprint\SprintNotFoundException
     */
    public function NonExistingSprintThrowException()
    {
        $this->useCase->execute($this->requestBuilder->create()->withSprintId(SprintStub1::ID)->build());
    }

    /**
     * @test
     */
    public function GetSprint()
    {
        InMemorySprintGateway::$sprints = array(SprintStub1::ID => new SprintStub1());
        $response = $this->useCase->execute($this->requestBuilder->create()->withSprintId(SprintStub1::ID)->build());
        $this->assertEquals(new \DateTime(SprintStub1::CREATED_AT), $response->getCreatedAt());
        $this->assertEquals(new \DateTime(SprintStub1::EFFECTIVE_CLOSED_AT), $response->getEffectiveClosedAt());
        $this->assertEquals(new \DateTime(SprintStub1::EXPECTED_CLOSED_AT), $response->getExpectedClosedAt());
        $this->assertEquals(SprintStub1::ID, $response->getId());
        $this->assertEquals(SprintStub1::STATUS, $response->getStatus());
    }

    protected function setUp()
    {
        $this->useCase = new GetSprint();
        $this->useCase->setSprintGateway(new InMemorySprintGateway());
        $this->requestBuilder = new GetSprintRequestBuilderImpl();
        $this->useCase->setSprintResponseAssembler(new SprintResponseAssemblerImpl());
    }
}
