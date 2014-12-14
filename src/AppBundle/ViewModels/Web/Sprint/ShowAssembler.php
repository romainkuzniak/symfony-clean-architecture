<?php

namespace AppBundle\ViewModels\Web\Sprint;

use BusinessRules\Responders\Sprint\SprintResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class ShowAssembler
{
    /**
     * @return Show
     */
    public function writeShow(SprintResponse $sprint)
    {
        $viewModel = new Show();
        $viewModel->sprintCreatedAt = $sprint->getCreatedAt();
        $viewModel->sprintEffectiveClosedAt = $sprint->getEffectiveClosedAt();
        $viewModel->sprintExpectedClosedAt = $sprint->getExpectedClosedAt();
        $viewModel->sprintId = $sprint->getId();
        $viewModel->sprintStatus = $sprint->getStatus();

        return $viewModel;
    }
}
