<?php

namespace AppBundle\ViewModels\Web\Sprint;

use BusinessRules\Responders\Sprint\CloseSprintResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseAssembler
{
    /**
     * @return Close
     */
    public function writeClose(CloseSprintResponse $closeSprint)
    {
        $viewModel = new Close();
        $viewModel->sprintId = $closeSprint->getSprintId();
        $viewModel->averageClosedIssues = $closeSprint->getAverageClosedIssues();
        $viewModel->closedIssuesCount = $closeSprint->getClosedIssuesCount();

        return $viewModel;
    }
}
