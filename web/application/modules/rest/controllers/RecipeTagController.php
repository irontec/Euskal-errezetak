<?php
/**
 * RecipeTag
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_RecipeTagController extends Iron_Controller_Rest_BaseController
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

        $mapper = new Mappers\RecipeTag();
        $items = $mapper->fetchAllToArray();

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($items);
        $this->view->recipetag = $items;

    }

    /**
     * [disabled]ApiDescription(section="RecipeTag", description="Table RecipeTag")
     * [disabled]ApiMethod(type="get")
     * [disabled]ApiRoute(name="/rest/recipetag/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipetag': [
     *         {
     *            'id': '', 
     *            'recipeId': '', 
     *            'tagId': '', 
     *         },
     *     ],
     *     'message': 'OK'
     * }")
     */
    public function getAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey !== false) {

			$recipesMapper = new Mappers\Recipes();
            $items = $recipesMapper->fetchRecipesByTagId($primaryKey);

            $this->view->message = 'Ok';
            $this->view->total = sizeof($items);
            $this->view->recipecategory = $items;

            $this->status->setCode(empty($items) ? 204 : 200);

        } else {

            $this->status->setCode(204);

        }

    }

    /**
     * [disabled]ApiDescription(section="RecipeTag", description="Table RecipeTag")
     * [disabled]ApiMethod(type="post")
     * [disabled]ApiRoute(name="/rest/recipetag/")
     * [disabled]ApiParams(name="recipeId", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="tagId", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 201 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipetag': [
     *         {
     *            'id': '', 
     *            'recipeId': '', 
     *            'tagId': '', 
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
     * [disabled]ApiDescription(section="RecipeTag", description="Table RecipeTag")
     * [disabled]ApiMethod(type="put")
     * [disabled]ApiRoute(name="/rest/recipetag/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="recipeId", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="tagId", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipetag': [
     *         {
     *            'id': '', 
     *            'recipeId': '', 
     *            'tagId': '', 
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
     * [disabled]ApiDescription(section="RecipeTag", description="Table RecipeTag")
     * [disabled]ApiMethod(type="delete")
     * [disabled]ApiRoute(name="/rest/recipetag/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'recipetag': '',
     *     'message': 'Ok'
     * }")
     */
    public function deleteAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey != false) {

            $mapper = new Mappers\RecipeTag();
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