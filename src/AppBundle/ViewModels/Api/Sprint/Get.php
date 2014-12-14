<?php

namespace AppBundle\ViewModels\Api\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class Get
{

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var \DateTime
     */
    public $effectiveClosedAt;

    /**
     * @var \DateTime
     */
    public $expectedClosedAt;

    /**
     * @var string
     */
    public $status;

    /**
     * @return string
     */
    public function serialize()
    {
        $getArray = array();
        if (!empty($this->createdAt)) {
            $getArray['createdAt'] = $this->createdAt->format(\DateTime::ISO8601);
        }
        if (!empty($this->effectiveClosedAt)) {
            $getArray['effectiveClosedAt'] = $this->effectiveClosedAt->format(\DateTime::ISO8601);
        }
        if (!empty($this->expectedClosedAt)) {
            $getArray['expectedClosedAt'] = $this->expectedClosedAt->format(\DateTime::ISO8601);
        }
        if (!empty($this->status)) {
            $getArray['status'] = $this->status;
        }

        return json_encode($getArray);
    }

}
