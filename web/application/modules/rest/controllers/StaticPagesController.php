<?php
/**
 * StaticPages
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_StaticPagesController extends Iron_Controller_Rest_BaseController
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
        $this->view->DELETE = array(
            'description' => '',
            'params' => array(
                'id' => array(
                    'type' => 'mediumint',
                    'required' => true
                )
            )
        );

        $this->status->setCode(200);

    }

    public function indexAction()
    {

        $where = array(
            'status = ?' => 'published'
        );

        $mapper = new Mappers\StaticPages();

        $result = array();
        $items = $mapper->fetchList($where);
        if (!empty($items)) {
            foreach ($items as $item) {
                $result[] = array(
                    'id' => $item->getId(),
                    'title' => $item->getTitle($this->_lang),
                    'description' => $item->getDescription($this->_lang)
                );
            }
        }

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($result);
        $this->view->staticpages = $result;

    }

    /**
     * @ApiDescription(section="StaticPages", description="Table StaticPages")
     * @ApiMethod(type="get")
     * @ApiRoute(name="/rest/staticpages/")
     * @ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *     'staticpages': [
     *         {
     *            'id': '',
     *            'title': '',
     *            'title_es': '',
     *            'title_eu': '',
     *            'description': '',
     *            'description_es': '',
     *            'description_eu': '',
     *            'status': '',
     *         },
     *     ],
     *     'message': 'OK'
     * }")
     */
    public function getAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey !== false) {

            $where = array(
                'status = ?' => 'published',
                'id = ?' => $primaryKey
            );

            $mapper = new Mappers\StaticPages();
            $item = $mapper->fetchOne($where);

            $this->view->message = 'Ok';

            if (empty($item)) {
                $this->view->staticpages = array();
                $this->status->setCode(204);
            } else {
                $result = array(
                    'id' => $item->getId(),
                    'title' => $item->getTitle($this->_lang),
                    'description' => $item->getDescription($this->_lang)
                );
                $this->view->staticpages = $result;
                $this->status->setCode(200);
            }


        } else {

            $this->status->setCode(204);

        }

    }

}