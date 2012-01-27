<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Application\Model\LibraryTable,
    Application\Model\WorkerTable,
    Application\Form\Worker as WorkerForm;
    
class WorkerController extends ActionController
{
    protected $workerTable;
    
    public function setWorkerTable ($workerTable)
    {
        $this->workerTable = $workerTable;
        return $this;
    }


    public function indexAction()
    {
         $form = new WorkerForm();
         $request = $this->getRequest();
         
         if ($request->isPost()) {
            $formData = $request->post()->toArray();
            if ($form->isValid($formData)) {
                
                $id = $this->workerTable->save($formData);
                // redirect to indexAction($id)
                // success - do something with the uploaded file
            } else {
                $form->populate($formData);
            }
        }
        return array('form'=>$form);
    }
}