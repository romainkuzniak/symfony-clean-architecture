<?php

namespace AppBundle\ViewModels\Web\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class Show
{

    /**
     * @var \DateTime
     */
    public $sprintCreatedAt;

    /**
     * @var \DateTime
     */
    public $sprintEffectiveClosedAt;

    /**
     * @var \DateTime
     */
    public $sprintExpectedClosedAt;

    /**
     * @var int
     */
    public $sprintId;

    /**
     * @var string
     */
    public $sprintStatus;

}
