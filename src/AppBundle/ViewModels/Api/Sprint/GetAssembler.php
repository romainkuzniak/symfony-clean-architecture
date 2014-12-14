<?php

namespace AppBundle\ViewModels\Api\Sprint;

use BusinessRules\Responders\Sprint\SprintResponse;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetAssembler
{
    /**
     * @return Get
     */
    public function writeGet(SprintResponse $sprint)
    {
        $viewModel = new Get();
        $viewModel->createdAt = $sprint->getCreatedAt();
        $viewModel->effectiveClosedAt = $sprint->getEffectiveClosedAt();
        $viewModel->expectedClosedAt = $sprint->getExpectedClosedAt();
        $viewModel->status = $sprint->getStatus();

        return $viewModel;
    }
}
