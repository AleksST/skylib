<?php
namespace Application\Model;
use Application\Model\AppTableAbstract;

class LibraryTypeTable extends AppTableAbstract
{
    protected  $_name = 'library_type';
    
    public function getLibraryType($id) 
    {
        return current($this->find($id));
    }
    
}