<?php

namespace AppBundle\Controller\Web\Sprint;

use AppBundle\ViewModels\Web\Sprint\CloseAssembler;
use BusinessRules\Entities\Sprint\SprintAlreadyClosedException;
use BusinessRules\Entities\Sprint\SprintNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $this->viewModelAssembler = new CloseAssembler();

        try {
            $request = $this->get('use_case.sprint.close_sprint_request_builder')
                ->create()
                ->withSprintId($id)
                ->build();
            $response = $this->get('use_case.sprint.close_sprint')->execute($request);

            return $this->render(
                'AppBundle:Sprint:close.html.twig',
                array('vm' => $this->viewModelAssembler->writeClose($response))
            );
        } catch (SprintAlreadyClosedException $sace) {
            $this->get('session')->getFlashBag()->add('error', 'Sprint already closed');

            return $this->redirect($this->generateUrl('show_sprint', array('id' => $id)));
        } catch (SprintNotFoundException $snfe) {
            throw new NotFoundHttpException();
        }
    }
}
