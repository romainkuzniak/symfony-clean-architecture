<?php

namespace AppBundle\Repository;

use BusinessRules\Entities\Sprint\Sprint;
use BusinessRules\Entities\Sprint\SprintNotFoundException;
use BusinessRules\Entities\Sprint\SprintStatus;
use BusinessRules\Gateways\Sprint\SprintGateway;
use Carbon\Carbon;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class SprintRepository extends EntityRepository implements SprintGateway
{

    /**
     * @return Sprint
     * @throws SprintNotFoundException
     */
    public function find($id)
    {
        $sprint = parent::find($id);

        if (null === $sprint) {
            throw new SprintNotFoundException();
        }

        return $sprint;
    }

    /**
     * @return Sprint
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findSprintToClose()
    {
        try {
            return $this->createQueryBuilder('s')
                ->andWhere('s.expectedClosedAt < :now')
                ->setParameter('now', new \DateTime(Carbon::now()->toDateTimeString()))
                ->andWhere('s.status != :status')
                ->setParameter('status', SprintStatus::CLOSE)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $nre) {
            throw new SprintNotFoundException();
        }
    }

    /**
     * @return int
     */
    public function findAverageClosedIssues()
    {
        return (int) $this->createQueryBuilder('s')
            ->select('AVG(i.id) as averageClosedIssues')
            ->leftJoin('s.issues', 'i')
            ->andWhere('s.status = :status')
            ->setParameter('status', SprintStatus::CLOSE)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function update(Sprint $sprint)
    {

    }

}
