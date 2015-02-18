<?php
/**
 * SocialNetworks
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_SocialNetworksController extends Iron_Controller_Rest_BaseController
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

        $mapper = new Mappers\SocialNetworks();
        $items = $mapper->fetchAllToArray();

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($items);
        $this->view->socialnetworks = $items;

    }

    /**
     * [disabled]ApiDescription(section="SocialNetworks", description="Table SocialNetworks")
     * [disabled]ApiMethod(type="get")
     * [disabled]ApiRoute(name="/rest/socialnetworks/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'socialnetworks': [
     *         {
     *            'id': '', 
     *            'title': '', 
     *            'title_es': '', 
     *            'title_eu': '', 
     *            'url': '', 
     *            'url_es': '', 
     *            'url_eu': '', 
     *            'status': '', 
     *            'icon': '', 
     *         },
     *     ],
     *     'message': 'OK'
     * }")
     */
    public function getAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey !== false) {

            $mapper = new Mappers\SocialNetworks();
            $item = $mapper->find($primaryKey);

            $this->view->message = 'Ok';

            if (empty($item)) {
                $this->view->socialnetworks = array();
            } else {
                $this->view->socialnetworks = $item->toArray();
            }

            $this->status->setCode(200);

        } else {

            $this->status->setCode(204);

        }

    }

    /**
     * [disabled]ApiDescription(section="SocialNetworks", description="Table SocialNetworks")
     * [disabled]ApiMethod(type="post")
     * [disabled]ApiRoute(name="/rest/socialnetworks/")
     * [disabled]ApiParams(name="title", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="url", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="url_es", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="url_eu", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="status", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="icon", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 201 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'socialnetworks': [
     *         {
     *            'id': '', 
     *            'title': '', 
     *            'title_es': '', 
     *            'title_eu': '', 
     *            'url': '', 
     *            'url_es': '', 
     *            'url_eu': '', 
     *            'status': '', 
     *            'icon': '', 
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
     * [disabled]ApiDescription(section="SocialNetworks", description="Table SocialNetworks")
     * [disabled]ApiMethod(type="put")
     * [disabled]ApiRoute(name="/rest/socialnetworks/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="title", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="title_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="url", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="url_es", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="url_eu", nullable=true, type="text", sample="", description="")
     * [disabled]ApiParams(name="status", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="icon", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'socialnetworks': [
     *         {
     *            'id': '', 
     *            'title': '', 
     *            'title_es': '', 
     *            'title_eu': '', 
     *            'url': '', 
     *            'url_es': '', 
     *            'url_eu': '', 
     *            'status': '', 
     *            'icon': '', 
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
     * [disabled]ApiDescription(section="SocialNetworks", description="Table SocialNetworks")
     * [disabled]ApiMethod(type="delete")
     * [disabled]ApiRoute(name="/rest/socialnetworks/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'socialnetworks': '',
     *     'message': 'Ok'
     * }")
     */
    public function deleteAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey != false) {

            $mapper = new Mappers\SocialNetworks();
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