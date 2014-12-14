<?php

namespace BusinessRules\Gateways\Sprint;

use BusinessRules\Entities\Sprint\Sprint;
use BusinessRules\Entities\Sprint\SprintNotFoundException;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface SprintGateway
{
    /**
     * @return \BusinessRules\Entities\Sprint\Sprint
     * @throws SprintNotFoundException
     */
    public function find($id);

    /**
     * @return Sprint
     *
     * @throws SprintNotFoundException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findSprintToClose();

    /**
     * @return int
     */
    public function findAverageClosedIssues();

    public function update(Sprint $sprint);
}
