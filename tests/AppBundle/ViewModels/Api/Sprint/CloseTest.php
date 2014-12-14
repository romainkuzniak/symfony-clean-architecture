<?php

namespace AppBundle\ViewModels\Api\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function Empty_Serialize()
    {
        $close = new Close();
        $serializedClose = $close->serialize();
        $this->assertEquals('[]', $serializedClose);
    }

    /**
     * @test
     */
    public function Serialize()
    {
        $close = new CloseStub1();
        $serializedClose = $close->serialize();
        $this->assertEquals(
            '{"averageClosedIssues":' . CloseStub1::AVERAGE_CLOSED_ISSUES . ',"closedIssuesCount":' . CloseStub1::CLOSED_ISSUES_COUNT . '}',
            $serializedClose
        );
    }
}
