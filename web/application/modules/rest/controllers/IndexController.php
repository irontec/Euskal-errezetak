<?php
/**
 * Index
 */
use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_IndexController extends Iron_Controller_Rest_BaseController
{

    public function init()
    {
        parent::init();
    }

    public function optionsAction()
    {

        $this->view->GET = array();
        $this->view->POST = array();
        $this->view->PUT = array();
        $this->view->DELETE = array();
        $this->status->setCode(200);

    }

}