<?php

namespace BusinessRules\UseCases\Sprint\DTO;

use BusinessRules\Entities\Sprint\Sprint;
use BusinessRules\Responders\Sprint\SprintResponse;
use BusinessRules\Responders\Sprint\SprintResponseAssembler;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class SprintResponseAssemblerImpl implements SprintResponseAssembler
{
    /**
     * @return SprintResponse
     */
    public function write(Sprint $sprint)
    {
        $response = new SprintResponseDTO();
        $response->createdAt = $sprint->getCreatedAt();
        $response->effectiveClosedAt = $sprint->getEffectiveClosedAt();
        $response->expectedClosedAt = $sprint->getExpectedClosedAt();
        $response->id = $sprint->getId();
        $response->status = $sprint->getStatus();

        return $response;
    }

}
