<?php

namespace Application\Form;

use Zend\Form\Form;
        
class Library extends Form 
{

    public function init() 
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'abbrev', array(
            'label'      => 'Аббревиатура:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1, 20))
            )
        ));
        
        $this->addElement('text', 'name', array(
            'label'      => 'Полное название:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
        $this->addElement('text', 'address', array(
            'label'      => 'Адрес:',
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
        
        $this->addElement('select', 'city', array(
            'label'      => 'Город:',
            'required'   => true,
            'multiOptions' => array(
                'msc' => 'Москва',
                'spb' => 'Санкт-Петербург',
                'krn' => 'Красноярск'
            ),
            'filters'    => array('StringTrim'),
        ));
        
        $this->addElement('select', 'library_type_id', array(
            'label'      => 'Тип библиотети:',
            'required'   => true,
            'multiOptions' => array(
                '1' => 'Публичная',
                '2' => 'ВУЗа',
                '3' => 'Краевая'
            ),
        ));
        
        $this->addElement('text', 'organization', array(
            'label'      => 'Учереждение:',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
        $this->addElement('select', 'ILS', array(
            'label'      => 'АБИС:',
            'required'   => true,
            'multiOptions' => array(
                '1' => 'Ирбис 32',
                '2' => 'Ирбис 64',
                '3' => 'Ирбис 128',
                '4' => 'Абсотек Юникод',
                '5' => 'Руслан'
            ),
            'filters'    => array('StringTrim'),
        ));
        
        $this->addElement('text', 'access', array(
            'label'      => 'Внешний доступ(ip, url):',
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(1,500))
            )
        ));
        
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Создать',
        ));
    }
}