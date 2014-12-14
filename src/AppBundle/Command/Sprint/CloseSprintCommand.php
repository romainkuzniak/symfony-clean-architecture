<?php

namespace AppBundle\Command\Sprint;

use BusinessRules\Entities\Sprint\SprintNotFoundException;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('agility-board:close-sprint')
            ->setDescription('Close sprint');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $request = $this->getContainer()->get('use_case.sprint.close_expected_sprint_request_builder')
                ->create()
                ->build();

            $response = $this->getContainer()->get('use_case.sprint.close_expected_sprint')->execute($request);

            $output->writeln('Close Sprint: ' . $response->getSprintId());
        } catch (SprintNotFoundException $nre) {
            $output->writeln('None');
        }
    }
}
