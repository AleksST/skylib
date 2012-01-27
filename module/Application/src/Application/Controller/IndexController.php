<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Application\Model\LibraryTable,
    Application\Form\Library as LibraryForm,
    Application\Form\LoadMarc,
    Application\Form\Worker,
    Application\Form\LibraryRequest;

class IndexController extends ActionController
{
    /**
     *
     * @var Application\Model\LibraryTable 
     */
    protected $libraryTable;
    
    /**
     * path to directory where uploaded marc file will be saved
     * @var string
     */
    protected $dir = '/home/aleks/marc/';
    
    public function setLibraryTable ($libraryTable)
    {
        $this->libraryTable = $libraryTable;
        return $this;
    }

    public function indexAction($id = 0)
    {
        $id = ($id) ?: $this->getRequest()->query()->id;
        $id = ($id <= 0) ? 1 : $id;
        $row = $this->libraryTable->getLibrary($id);
        return array('row'=>$row);
    }
    
    public function formAction() 
    {
         $form = new LibraryForm();
         $request = $this->getRequest();
         
         if ($request->isPost()) {
            $formData = $request->post()->toArray();
            if ($form->isValid($formData)) {
                
                $id = $this->libraryTable->save($formData);
                // redirect to indexAction($id)
                // success - do something with the uploaded file
            } else {
                $form->populate($formData);
            }
        }
        return array('form'=>$form);
    }
    
    public function loadMarcAction ()
    {
        $form = new LoadMarc();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $formData = $request->post()->toArray();
            if ($form->isValid($formData)) {
                // success - do something with the uploaded file
                $uploadedData = $request->file()->toArray();
                $tmp_file = $uploadedData["file"]['tmp_name'];
                $name = $uploadedData["file"]['name'];
                if(move_uploaded_file($tmp_file, $this->dir.$name)) {
                    // redirect to success
                } else {
                    $form->addError('cannot download file: system error');
                    $form->populate($formData);
                }
            } else {
                $form->populate($formData);
            }
        }
        return array('form'=>$form);
    }
    
    public function createLibraryAction () 
    {
        $form = new LibraryRequest();
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $formData = $request->post()->toArray();
            if ($form->isValid($formData)) {
               // $id = $this->libraryTable->save($formData);
            } else {
                $form->populate($formData);
            }
        } else {
            $form->populate($formData);
        }
        
        return array('form'=>$form);
    }
    
    public function createWorkerAction() 
    {
         $form = new Worker();
         $request = $this->getRequest();
         
         if ($request->isPost()) {
            $formData = $request->post()->toArray();
            if ($form->isValid($formData)) {
                
               // $id = $this->libraryTable->save($formData);
                // redirect to indexAction($id)
                // success - do something with the uploaded file
            } else {
                $form->populate($formData);
            }
        }
        return array('form'=>$form);
    }
}
