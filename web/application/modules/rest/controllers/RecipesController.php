<?php
/**
 * Recipes
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_RecipesController extends Iron_Controller_Rest_BaseController
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

        $mapper = new Mappers\Recipes();
        $items = $mapper->fetchAllToArray();
        
        $this->status->setCode(empty($items) ? 204 : 200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($items);
        $this->view->recipes = $items;

    }

    /**
     * [disabled]ApiDescription(section="Recipes", description="Table Recipes")
     * [disabled]ApiMethod(type="get")
     * [disabled]ApiRoute(name="/rest/recipes/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipes': [
     *         {
     *            'id': '', 
     *            'name': '', 
     *            'name_es': '', 
     *            'name_eu': '', 
     *            'ingredients': '', 
     *            'ingredients_es': '', 
     *            'ingredients_eu': '', 
     *            'directions': '', 
     *            'directions_es': '', 
     *            'directions_eu': '', 
     *            'time': '', 
     *            'difficulty': '', 
     *            'cost': '', 
     *            'people': '', 
     *            'pictureFileSize': '', 
     *            'pictureMimeType': '', 
     *            'pictureBaseName': '', 
     *         },
     *     ],
     *     'message': 'OK'
     * }")
     */
    public function getAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey !== false) {

            $mapper = new Mappers\Recipes();
            $item = $mapper->find($primaryKey);

            $this->view->message = 'Ok';

            if (empty($item)) {
            	$this->status->setCode(204);
                $this->view->recipes = array();
            } else {
            	$this->status->setCode(200);
                $this->view->recipes = $item->toArray();
            }

        } else {

            $this->status->setCode(204);

        }

    }

    /**
     * [disabled]ApiDescription(section="Recipes", description="Table Recipes")
     * [disabled]ApiMethod(type="post")
     * [disabled]ApiRoute(name="/rest/recipes/")
     * [disabled]ApiParams(name="name", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="ingredients", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="ingredients_es", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="ingredients_eu", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="directions", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="directions_es", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="directions_eu", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="time", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="difficulty", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="cost", nullable=false, type="int", sample="", description="")
     * [disabled]ApiParams(name="people", nullable=false, type="int", sample="", description="")
     * [disabled]ApiParams(name="pictureFileSize", nullable=false, type="int", sample="", description="")
     * [disabled]ApiParams(name="pictureMimeType", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="pictureBaseName", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 201 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipes': [
     *         {
     *            'id': '', 
     *            'name': '', 
     *            'name_es': '', 
     *            'name_eu': '', 
     *            'ingredients': '', 
     *            'ingredients_es': '', 
     *            'ingredients_eu': '', 
     *            'directions': '', 
     *            'directions_es': '', 
     *            'directions_eu': '', 
     *            'time': '', 
     *            'difficulty': '', 
     *            'cost': '', 
     *            'people': '', 
     *            'pictureFileSize': '', 
     *            'pictureMimeType': '', 
     *            'pictureBaseName': '', 
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
     * [disabled]ApiDescription(section="Recipes", description="Table Recipes")
     * [disabled]ApiMethod(type="put")
     * [disabled]ApiRoute(name="/rest/recipes/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="name", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="ingredients", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="ingredients_es", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="ingredients_eu", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="directions", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="directions_es", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="directions_eu", nullable=false, type="text", sample="", description="")
     * [disabled]ApiParams(name="time", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="difficulty", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="cost", nullable=false, type="int", sample="", description="")
     * [disabled]ApiParams(name="people", nullable=false, type="int", sample="", description="")
     * [disabled]ApiParams(name="pictureFileSize", nullable=false, type="int", sample="", description="")
     * [disabled]ApiParams(name="pictureMimeType", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="pictureBaseName", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipes': [
     *         {
     *            'id': '', 
     *            'name': '', 
     *            'name_es': '', 
     *            'name_eu': '', 
     *            'ingredients': '', 
     *            'ingredients_es': '', 
     *            'ingredients_eu': '', 
     *            'directions': '', 
     *            'directions_es': '', 
     *            'directions_eu': '', 
     *            'time': '', 
     *            'difficulty': '', 
     *            'cost': '', 
     *            'people': '', 
     *            'pictureFileSize': '', 
     *            'pictureMimeType': '', 
     *            'pictureBaseName': '', 
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
     * [disabled]ApiDescription(section="Recipes", description="Table Recipes")
     * [disabled]ApiMethod(type="delete")
     * [disabled]ApiRoute(name="/rest/recipes/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipes': '',
     *     'message': 'Ok'
     * }")
     */
    public function deleteAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey != false) {

            $mapper = new Mappers\Recipes();
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