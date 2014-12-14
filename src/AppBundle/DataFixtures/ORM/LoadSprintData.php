<?php

namespace AppBundle\DataFixtures\ORM;

use Carbon\Carbon;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class LoadSprintData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @var int
     */
    public static $i = 0;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        Fixtures::load(__DIR__ . '/sprints.yml', $manager, array('providers' => array($this)));
    }

    public function expectedClosedAt()
    {
        return new \DateTime(Carbon::now()->addDay()->toDateTimeString());
    }

    /**
     * @return string
     */
    public function status()
    {
        return ++self::$i % 2 ? 'DONE' : 'OPEN';
    }

    /**
     * @return string
     */
    public function doneAt()
    {
        return self::$i % 2 ? new \DateTime(Carbon::now()->toDateTimeString()) : null;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

}
