<?php

namespace BusinessRules\Responders\Sprint;

use BusinessRules\Entities\Sprint\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface SprintResponseAssembler
{
    /**
     * @return SprintResponse
     */
    public function write(Sprint $sprint);
}
