<?php

namespace AppBundle\ViewModels\Api\Sprint;

use BusinessRules\Responders\Sprint\SprintResponseStub1;
use BusinessRules\UseCases\Sprint\DTO\SprintResponseDTO;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetAssemblerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var GetAssembler
     */
    private $vmAssembler;

    /**
     * @test
     */
    public function EmptySprintResponse_ReturnEmptyGet()
    {
        $vm = $this->vmAssembler->writeGet(new SprintResponseDTO());

        $this->assertNull($vm->createdAt);
        $this->assertNull($vm->effectiveClosedAt);
        $this->assertNull($vm->expectedClosedAt);
        $this->assertNull($vm->status);
    }

    /**
     * @test
     */
    public function ReturnGet()
    {
        $vm = $this->vmAssembler->writeGet(new SprintResponseStub1());

        $this->assertEquals(new \DateTime(SprintResponseStub1::CREATED_AT), $vm->createdAt);
        $this->assertEquals(new \DateTime(SprintResponseStub1::EFFECTIVE_CLOSED_AT), $vm->effectiveClosedAt);
        $this->assertEquals(new \DateTime(SprintResponseStub1::EXPECTED_CLOSED_AT), $vm->expectedClosedAt);
        $this->assertEquals(SprintResponseStub1::STATUS, $vm->status);
    }

    protected function setUp()
    {
        $this->vmAssembler = new GetAssembler();
    }
}
