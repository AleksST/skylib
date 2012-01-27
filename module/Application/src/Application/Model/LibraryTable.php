<?php

namespace Application\Model;
use Application\Model\AppTableAbstract;

class LibraryTable extends AppTableAbstract
{
    protected  $_name = 'library';
    
    public function getLibrary($id) 
    {
        return current(current($this->find($id)));
    }
    
}