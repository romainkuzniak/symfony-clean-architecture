<?php

namespace AppBundle\ViewModels\Api\Sprint;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class Close
{

    /**
     * @var int
     */
    public $averageClosedIssues;

    /**
     * @var int
     */
    public $closedIssuesCount;

    /**
     * @return string
     */
    public function serialize()
    {
        $closeArray = array();
        if (!empty($this->averageClosedIssues)) {
            $closeArray['averageClosedIssues'] = $this->averageClosedIssues;
        }
        if (!empty($this->closedIssuesCount)) {
            $closeArray['closedIssuesCount'] = $this->closedIssuesCount;
        }

        return json_encode($closeArray);
    }
}
