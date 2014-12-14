<?php

namespace AppBundle\ViewModels\Api\Sprint;

use BusinessRules\Entities\Sprint\SprintStatus;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function Empty_Serialize()
    {
        $get = new Get();
        $serializedGet = $get->serialize();
        $this->assertEquals('[]', $serializedGet);
    }

    /**
     * @test
     */
    public function Serialize()
    {
        $get = new GetStub1();
        $serializedGet = $get->serialize();
        $this->assertEquals(
            '{"createdAt":"' . GetStub1::CREATED_AT . '","effectiveClosedAt":"' . GetStub1::EFFECTIVE_CLOSED_AT . '","expectedClosedAt":"' . GetStub1::EXPECTED_CLOSED_AT . '","status":"' . SprintStatus::CLOSE . '"}',
            $serializedGet
        );
    }
}
