<?php
/**
 * Tags
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_TagsController extends Iron_Controller_Rest_BaseController
{

    protected $_lang;

    public function init()
    {

        $this->_lang = 'es';

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

    public function indexAction()
    {

        $mapper = new Mappers\Tags();
        $items = $mapper->fetchAll();

        $resutls = array();

        if (!empty($items)) {
            foreach ($items as $item) {
                $resutls[] = $item->getRestArray($this->_lang);
            }
        }

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($resutls);
        $this->view->tags = $resutls;

    }

    public function getAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey !== false) {

            $recipesMapper = new Mappers\Tags();
            $items = $recipesMapper->find($primaryKey);

            $this->view->message = 'Ok';
            $this->view->tags = $items->getRestArray($this->_lang);

            $this->status->setCode(empty($items) ? 204 : 200);

        } else {

            $this->status->setCode(204);

        }

    }

}