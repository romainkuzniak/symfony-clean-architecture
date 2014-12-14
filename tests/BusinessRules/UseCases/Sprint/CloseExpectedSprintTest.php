<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Entities\Sprint\SprintStub2;
use BusinessRules\Gateways\Sprint\InMemorySprintGateway;
use BusinessRules\Requestors\Sprint\CloseExpectedSprintRequestBuilder;
use BusinessRules\UseCases\Sprint\DTO\CloseExpectedSprintRequestBuilderImpl;
use BusinessRules\UseCases\Sprint\DTO\CloseExpectedSprintResponseBuilderImpl;
use Carbon\Carbon;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseExpectedSprintTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CloseExpectedSprint
     */
    private $useCase;

    /**
     * @var CloseExpectedSprintRequestBuilder
     */
    private $requestBuilder;

    /**
     * @test
     * @expectedException \BusinessRules\Entities\Sprint\SprintNotFoundException
     */
    public function NonExistingSprint_ThrowException()
    {
        InMemorySprintGateway::$sprints = array();
        $this->useCase->execute(
            $this->requestBuilder
                ->create()
                ->withSprintId(SprintStub2::ID)
                ->build()
        );
    }

    /**
     * @test
     */
    public function CloseExpectedSprint()
    {
        $response = $this->useCase->execute(
            $this->requestBuilder->create()->build()
        );
        $this->assertEquals(SprintStub2::ID, $response->getSprintId());
        $actualSprint = InMemorySprintGateway::$sprints[SprintStub2::ID];
        $this->assertTrue($actualSprint->isClosed());
        $this->assertEquals(new \DateTime(Carbon::now()->toTimeString()), $actualSprint->getEffectiveClosedAt());
        $this->assertCount(1, $actualSprint->getIssues());
    }

    protected function setUp()
    {
        Carbon::setTestNow(Carbon::now());
        $this->useCase = new CloseExpectedSprint();
        $this->useCase->setSprintGateway(new InMemorySprintGateway());
        InMemorySprintGateway::$sprints = array(SprintStub2::ID => new SprintStub2());
        $this->useCase->setCloseExpectedSprintResponseBuilder(new CloseExpectedSprintResponseBuilderImpl());

        $this->requestBuilder = new CloseExpectedSprintRequestBuilderImpl();
    }

    protected function tearDown()
    {
        Carbon::setTestNow();
    }
}
