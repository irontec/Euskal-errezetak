<?php
/**
 * RecipeCategory
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_RecipeCategoryController extends Iron_Controller_Rest_BaseController
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

        $mapper = new Mappers\RecipeCategory();
        $items = $mapper->fetchAllToArray();

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($items);
        $this->view->recipecategory = $items;

    }

    /**
     * @ApiDescription(section="RecipeCategory", description="Table RecipeCategory")
     * @ApiMethod(type="get")
     * @ApiRoute(name="/rest/recipecategory/")
     * @ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *     'recipecategory': [
     *         {
     *            'id': '',
     *            'recipeId': '',
     *            'categoryId': '',
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
            $items = $recipesMapper->fetchRecipesByCategoryId($primaryKey);

            $this->view->message = 'Ok';
            $this->view->total = sizeof($items);
            $this->view->recipecategory = $items;

            $this->status->setCode(empty($items) ? 204 : 200);

        } else {

            $this->status->setCode(204);

        }

    }

    /**
     * @ApiDescription(section="RecipeCategory", description="Table RecipeCategory")
     * @ApiMethod(type="post")
     * @ApiRoute(name="/rest/recipecategory/")
     * @ApiParams(name="recipeId", nullable=false, type="mediumint", sample="", description="")
     * @ApiParams(name="categoryId", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 201 OK")
     * @ApiReturn(type="object", sample="{
     *     'recipecategory': [
     *         {
     *            'id': '',
     *            'recipeId': '',
     *            'categoryId': '',
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
     * @ApiDescription(section="RecipeCategory", description="Table RecipeCategory")
     * @ApiMethod(type="put")
     * @ApiRoute(name="/rest/recipecategory/")
     * @ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * @ApiParams(name="recipeId", nullable=false, type="mediumint", sample="", description="")
     * @ApiParams(name="categoryId", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *     'recipecategory': [
     *         {
     *            'id': '',
     *            'recipeId': '',
     *            'categoryId': '',
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
     * @ApiDescription(section="RecipeCategory", description="Table RecipeCategory")
     * @ApiMethod(type="delete")
     * @ApiRoute(name="/rest/recipecategory/")
     * @ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *     'recipecategory': '',
     *     'message': 'Ok'
     * }")
     */
    public function deleteAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey != false) {

            $mapper = new Mappers\RecipeCategory();
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