<?php

namespace AppBundle\Controller\Api\Sprint;

use AppBundle\ViewModels\Api\Sprint\CloseAssembler;
use BusinessRules\Entities\Sprint\SprintAlreadyClosedException;
use BusinessRules\Entities\Sprint\SprintNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CloseSprintController extends Controller
{

    /**
     * @var CloseAssembler
     */
    private $viewModelAssembler;

    public function __construct()
    {
        $this->viewModelAssembler = new CloseAssembler();
    }

    /**
     * @param int $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function closeAction($id)
    {
        try {
            $request = $this->get('use_case.sprint.close_sprint_request_builder')
                ->create()
                ->withSprintId($id)
                ->build();

            $response = $this->get('use_case.sprint.close_sprint')->execute($request);

            return new Response(
                $this->viewModelAssembler->writeClose($response)->serialize(),
                Response::HTTP_OK,
                array('Content-Type' => 'application/json')
            );
        } catch (SprintNotFoundException $snfe) {
            throw new NotFoundHttpException();
        } catch (SprintAlreadyClosedException $sace) {
            return new JsonResponse('Sprint already closed', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
