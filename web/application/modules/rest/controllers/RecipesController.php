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
     * @ApiDescription(section="Recipes", description="Table Recipes")
     * @ApiMethod(type="get")
     * @ApiRoute(name="/rest/recipes/")
     * @ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
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

}