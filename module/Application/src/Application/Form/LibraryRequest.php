<?php

namespace Application\Form;

use Zend\Form\Form;


class LibraryRequest extends Form 
{
    
    public function init()
    {
         // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'name', array(
            'label'      => 'Название организации:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1, 500))
            )
        ));
        
        $this->addElement('select', 'type_id', array(
            'label'      => 'Тип организации:',
            'required'   => true,
            'multiOptions' => array(
                '1' => 'Муниципальная Библиотека',
                '2' => 'Библиотека ВУЗа',
                '3' => 'Государственная Библиотека',
                '4' => 'я балуюсь =)'
            ),
        ));
        
        $this->addElement('text', 'email', array(
            'label'      => 'Контактный email:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array('EmailAddress')
        ));
        
    
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Отправить',
        ));
    }
}