<?php
/**
 * Categories
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_CategoriesController extends Iron_Controller_Rest_BaseController
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

        $mapper = new Mappers\Categories();
        $items = $mapper->fetchAllToArray();

        $this->status->setCode(200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($items);
        $this->view->categories = $items;

    }

    /**
     * @ApiDescription(section="Categories", description="Table Categories")
     * @ApiMethod(type="get")
     * @ApiRoute(name="/rest/categories/")
     * @ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * @ApiReturnHeaders(sample="HTTP 200 OK")
     * @ApiReturn(type="object", sample="{
     *     'categories': [
     *         {
     *            'id': '',
     *            'name': '',
     *            'name_es': '',
     *            'name_eu': '',
     *            'imgFileSize': '',
     *            'imgMimeType': '',
     *            'imgBaseName': '',
     *         },
     *     ],
     *     'message': 'OK'
     * }")
     */
    public function getAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey !== false) {

            $mapper = new Mappers\Categories();
            $item = $mapper->find($primaryKey);

            $this->view->message = 'Ok';

            if (empty($item)) {
                $this->view->categories = array();
            } else {

                $recipes = array();

                if (sizeof($item->getRecipeCategory()) > 0) {
                    foreach ($item->getRecipeCategory() as $rel) {
                        $recipes[] = $rel->getRecipe()->toArray();
                    }
                }

                $catagory = $item->toArray();
                $catagory['recipes'] = $recipes;

                $this->view->categories = $catagory;

            }

            $this->status->setCode(200);

        } else {

            $this->status->setCode(204);

        }

    }

}