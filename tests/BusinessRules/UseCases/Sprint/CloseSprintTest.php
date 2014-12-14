<?php

namespace BusinessRules\UseCases\Sprint;

use BusinessRules\Entities\Sprint\SprintStub1;
use BusinessRules\Entities\Sprint\SprintStub2;
use BusinessRules\Gateways\Sprint\InMemorySprintGateway;
use BusinessRules\Requestors\Sprint\CloseSprintRequestBuilder;
use BusinessRules\UseCases\Sprint\DTO\CloseSprintRequestBuilderImpl;
use BusinessRules\UseCases\Sprint\DTO\CloseSprintResponseBuilderImpl;
use Carbon\Carbon;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintTest extends AbstractSprintTest
{

    /**
     * @var CloseSprint
     */
    private $useCase;

    /**
     * @var CloseSprintRequestBuilder
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
     * @expectedException \BusinessRules\Entities\Sprint\SprintAlreadyClosedException
     */
    public function AlreadyClosedSprint_ThrowException()
    {
        $this->useCase->execute(
            $this->requestBuilder
                ->create()
                ->withSprintId(SprintStub1::ID)
                ->build()
        );
    }

    /**
     * @test
     */
    public function CloseSprint()
    {
        $response = $this->useCase->execute(
            $this->requestBuilder
                ->create()
                ->withSprintId(SprintStub2::ID)
                ->build()
        );
        $actualSprint = InMemorySprintGateway::$sprints[SprintStub2::ID];
        $this->assertEquals(1, $response->getClosedIssuesCount());
        $this->assertEquals(1.5, $response->getAverageClosedIssues());
        $this->assertEquals(SprintStub2::ID, $response->getSprintId());
        $this->assertTrue($actualSprint->isClosed());
        $this->assertEquals(new \DateTime(Carbon::now()->toTimeString()), $actualSprint->getEffectiveClosedAt());
        $this->assertCount(1, $actualSprint->getIssues());
        $this->assertClosedIssue('BusinessRules\Entities\Issue\IssueStub2', $actualSprint->getIssues()->first());
    }

    protected function setUp()
    {
        Carbon::setTestNow(Carbon::now());
        $this->useCase = new CloseSprint();
        $this->useCase->setSprintGateway(new InMemorySprintGateway());
        InMemorySprintGateway::$sprints = array(
            SprintStub1::ID => new SprintStub1(),
            SprintStub2::ID => new SprintStub2()
        );
        $this->useCase->setCloseSprintResponseBuilder(new CloseSprintResponseBuilderImpl());

        $this->requestBuilder = new CloseSprintRequestBuilderImpl();
    }

    protected function tearDown()
    {
        Carbon::setTestNow();
    }
}
