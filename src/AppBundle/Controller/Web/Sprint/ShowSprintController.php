<?php

namespace AppBundle\Controller\Web\Sprint;

use AppBundle\ViewModels\Web\Sprint\ShowAssembler;
use BusinessRules\Entities\Sprint\SprintNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class ShowSprintController extends Controller
{

    /**
     * @var ShowAssembler
     */
    private $viewModelAssembler;

    public function __construct()
    {
        $this->viewModelAssembler = new ShowAssembler();
    }

    /**
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        try {
            $request = $this->get('use_case.sprint.get_sprint_request_builder')
                ->create()
                ->withSprintId($id)
                ->build();

            $response = $this->get('use_case.sprint.get_sprint')->execute($request);

            return $this->render(
                'AppBundle:Sprint:show.html.twig',
                array('vm' => $this->viewModelAssembler->writeShow($response))
            );
        } catch (SprintNotFoundException $snfe) {
            throw new NotFoundHttpException();
        }
    }
}
