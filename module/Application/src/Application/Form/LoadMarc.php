<?php

namespace Application\Form;

use Zend\Form\Form;


class LoadMarc extends Form 
{
    
    public function init()
    {
         // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'name', array(
            'label'      => 'Аббревиатура:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1, 20))
            )
        ));
        
         // Add file download element
        $this->addElement('file', 'file', array(
            'label' => 'Marc файл:',
            'ignore' => true
        ));
        
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Загрузить',
        ));
    }
}