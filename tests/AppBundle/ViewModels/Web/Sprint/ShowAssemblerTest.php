<?php

namespace AppBundle\ViewModels\Web\Sprint;

use BusinessRules\Responders\Sprint\SprintResponseStub1;
use BusinessRules\UseCases\Sprint\DTO\SprintResponseDTO;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class ShowAssemblerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ShowAssembler
     */
    private $vmAssembler;

    /**
     * @test
     */
    public function EmptySprintResponse_ReturnEmptyShow()
    {
        $vm = $this->vmAssembler->writeShow(new SprintResponseDTO());

        $this->assertNull($vm->sprintCreatedAt);
        $this->assertNull($vm->sprintEffectiveClosedAt);
        $this->assertNull($vm->sprintExpectedClosedAt);
        $this->assertNull($vm->sprintStatus);
    }

    /**
     * @test
     */
    public function ReturnShow()
    {
        $vm = $this->vmAssembler->writeShow(new SprintResponseStub1());

        $this->assertEquals(new \DateTime(SprintResponseStub1::CREATED_AT), $vm->sprintCreatedAt);
        $this->assertEquals(new \DateTime(SprintResponseStub1::EFFECTIVE_CLOSED_AT), $vm->sprintEffectiveClosedAt);
        $this->assertEquals(new \DateTime(SprintResponseStub1::EXPECTED_CLOSED_AT), $vm->sprintExpectedClosedAt);
        $this->assertEquals(SprintResponseStub1::STATUS, $vm->sprintStatus);
    }

    protected function setUp()
    {
        $this->vmAssembler = new ShowAssembler();
    }
}
