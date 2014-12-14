<?php

namespace AppBundle\ViewModels\Api\Sprint;

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
        $viewModel->averageClosedIssues = $closeSprint->getAverageClosedIssues();
        $viewModel->closedIssuesCount = $closeSprint->getClosedIssuesCount();

        return $viewModel;
    }
}
