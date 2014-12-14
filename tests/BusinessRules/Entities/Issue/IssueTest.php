<?php

namespace BusinessRules\Entities\Issue;

use AppBundle\Entity\IssueImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class IssueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \BusinessRules\Entities\Issue\IssueAlreadyClosedException
     */
    public function AlreadyClose_Close_ThrowException()
    {
        $issue = new IssueImpl();
        $issue->close();
        $issue->close();
    }
}
