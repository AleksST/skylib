<?php

namespace Application\Model;
use Application\Model\AppTableAbstract;

class WorkerTable extends AppTableAbstract
{
    protected  $_name = 'worker';
    public     $protectCols = array('password');
}