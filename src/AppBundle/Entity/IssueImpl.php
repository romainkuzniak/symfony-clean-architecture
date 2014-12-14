<?php

namespace AppBundle\Entity;

use BusinessRules\Entities\Issue\Issue;
use BusinessRules\Entities\Sprint\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class IssueImpl extends Issue
{

    /**
     * @var Sprint
     */
    protected $sprint;

}
