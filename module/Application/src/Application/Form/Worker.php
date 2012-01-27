<?php
namespace Application\Form;

use Zend\Form\Form,
 Application\Model\LibraryTable;


class Worker extends Form 
{
    
    public function init() 
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'name', array(
            'label'      => 'Имя:',
            'placeholder' => 'Ваше имя',
            //'pattern' => '[а-Я]{1,40}',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1, 200))
            )
        ));
        
        $this->addElement('text', 'surname', array(
            'label'      => 'Фамилия:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
        $this->addElement('text', 'middle_name', array(
            'label'      => 'Отчество:',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
        $this->addElement('text', 'email', array(
            'label'      => 'Контактный email:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array('EmailAddress')
        ));
        
        $this->addElement('text', 'position', array(
            'label'      => 'Должность:',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
         $this->addElement('text', 'phone', array(
            'label'      => 'Телефон:',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,40))
            )
        ));
       
        $this->addElement('password', 'password', array(
            'label'      => 'Пароль:',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
         $this->addElement('password', 'password2', array(
            'label'      => 'Подтверждение пароля:',
            'filters'    => array('StringTrim'),
            'ignore'   => true,
            'validators' => array(
                array('identical', false, array('token' => 'password'))
            )
        ));
        
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Создать',
        ));
    }
}