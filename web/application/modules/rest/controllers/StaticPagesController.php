<?php
/**
 * StaticPages
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_StaticPagesController extends Iron_Controller_Rest_BaseController
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

        $mapper = new Mappers\StaticPages();
        $items = $mapper->fetchAllToArray();

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($items);
        $this->view->staticpages = $items;

    }

    /**
     * [disabled]ApiDescription(section="StaticPages", description="Table StaticPages")
     * [disabled]ApiMethod(type="get")
     * [disabled]ApiRoute(name="/rest/staticpages/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
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

            $mapper = new Mappers\StaticPages();
            $item = $mapper->find($primaryKey);

            $this->view->message = 'Ok';

            if (empty($item)) {
                $this->view->staticpages = array();
            } else {
                $this->view->staticpages = $item->toArray();
            }

            $this->status->setCode(200);

        } else {

            $this->status->setCode(204);

        }

    }

    /**
     * [disabled]ApiDescription(section="StaticPages", description="Table StaticPages")
     * [disabled]ApiMethod(type="post")
     * [disabled]ApiRoute(name="/rest/staticpages/")
     * [disabled]ApiParams(name="title", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="description", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="description_es", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="description_eu", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="status", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 201 OK")
     * [disabled]ApiReturn(type="object", sample="{
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
    public function postAction()
    {
        $this->status->setCode(200);
    }

    /**
     * [disabled]ApiDescription(section="StaticPages", description="Table StaticPages")
     * [disabled]ApiMethod(type="put")
     * [disabled]ApiRoute(name="/rest/staticpages/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="title", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="description", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="description_es", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="description_eu", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="status", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
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
     *     'message': 'Ok'
     * }")
     */
    public function putAction()
    {
        $this->status->setCode(200);
    }

    /**
     * [disabled]ApiDescription(section="StaticPages", description="Table StaticPages")
     * [disabled]ApiMethod(type="delete")
     * [disabled]ApiRoute(name="/rest/staticpages/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'staticpages': '',
     *     'message': 'Ok'
     * }")
     */
    public function deleteAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey != false) {

            $mapper = new Mappers\StaticPages();
            $model = $mapper->find($primaryKey);

            if (empty($model)) {

                $this->status->setCode(400);
                $this->view->message = 'id not exist';

            } else {

                $model->delete();

                $this->status->setCode(200);
                $this->view->message = 'Ok';

            }

        } else {

            $this->status->setCode(400);
            $this->view->message = 'id is required';

        }

    }

}