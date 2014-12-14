<?php

namespace AppBundle\ViewModels\Web\Sprint;

use BusinessRules\Responders\Sprint\CloseSprintResponseStub1;
use BusinessRules\UseCases\Sprint\DTO\CloseSprintResponseDTO;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseAssemblerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var CloseAssembler
     */
    private $vmAssembler;

    /**
     * @test
     */
    public function EmptyCloseResponse_ReturnEmptyClose()
    {
        $vm = $this->vmAssembler->writeClose(new CloseSprintResponseDTO());

        $this->assertNull($vm->averageClosedIssues);
        $this->assertNull($vm->averageClosedIssues);
        $this->assertNull($vm->closedIssuesCount);
    }

    /**
     * @test
     */
    public function ReturnClose()
    {
        $vm = $this->vmAssembler->writeClose(new CloseSprintResponseStub1());

        $this->assertEquals(CloseSprintResponseStub1::AVERAGE_CLOSED_ISSUES, $vm->averageClosedIssues);
        $this->assertEquals(CloseSprintResponseStub1::CLOSED_ISSUES_COUNT, $vm->closedIssuesCount);
        $this->assertEquals(CloseSprintResponseStub1::SPRINT_ID, $vm->sprintId);
    }

    protected function setUp()
    {
        $this->vmAssembler = new CloseAssembler();
    }
}
