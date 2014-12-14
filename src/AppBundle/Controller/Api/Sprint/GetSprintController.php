<?php

namespace AppBundle\Controller\Api\Sprint;

use AppBundle\ViewModels\Api\Sprint\GetAssembler;
use BusinessRules\Entities\Sprint\SprintNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class GetSprintController extends Controller
{

    /**
     * @var GetAssembler
     */
    private $viewModelAssembler;

    public function __construct()
    {
        $this->viewModelAssembler = new GetAssembler();
    }

    /**
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($id)
    {
        try {
            $request = $this->get('use_case.sprint.get_sprint_request_builder')
                ->create()
                ->withSprintId($id)
                ->build();

            $response = $this->get('use_case.sprint.get_sprint')->execute($request);

            return new Response(
                $this->viewModelAssembler->writeGet($response)->serialize(),
                Response::HTTP_OK,
                array('Content-Type' => 'application/json')
            );
        } catch (SprintNotFoundException $snfe) {
            throw new NotFoundHttpException();
        }
    }
}
