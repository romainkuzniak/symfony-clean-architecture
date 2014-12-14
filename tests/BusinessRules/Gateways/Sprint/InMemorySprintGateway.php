<?php

namespace BusinessRules\Gateways\Sprint;

use BusinessRules\Entities\Sprint\Sprint;
use BusinessRules\Entities\Sprint\SprintNotFoundException;
use BusinessRules\Entities\Sprint\SprintStatus;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class InMemorySprintGateway implements SprintGateway
{

    /**
     * @var Sprint[]
     */
    public static $sprints = array();

    public function __construct()
    {
        self::$sprints = array();
    }

    /**
     * @return Sprint
     * @throws SprintNotFoundException
     */
    public function find($id)
    {
        if (isset(self::$sprints[$id])) {
            return self::$sprints[$id];
        }
        throw new SprintNotFoundException();
    }

    /**
     * @return Sprint
     * @throws SprintNotFoundException
     */
    public function findSprintToClose()
    {
        foreach (self::$sprints as $sprint) {
            if (SprintStatus::CLOSE !== $sprint->getStatus()) {
                return $sprint;
            }
        }
        throw new SprintNotFoundException();
    }

    /**
     * @return int
     */
    public function findAverageClosedIssues()
    {
        $sprintsCount = 0;
        $issuesCount = 0;
        foreach (self::$sprints as $sprint) {
            $sprintsCount++;
            $issuesCount += $sprint->getIssues()->count();
        }

        return $sprintsCount !== 0 ? $issuesCount / $sprintsCount : 0;
    }

    public function update(Sprint $sprint)
    {
        if (!isset(self::$sprints[$sprint->getId()])) {
            throw new SprintNotFoundException();
        }
        self::$sprints[$sprint->getId()] = $sprint;
    }

}
