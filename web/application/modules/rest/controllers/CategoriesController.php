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
     * [disabled]ApiDescription(section="Categories", description="Table Categories")
     * [disabled]ApiMethod(type="get")
     * [disabled]ApiRoute(name="/rest/categories/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
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

    /**
     * [disabled]ApiDescription(section="Categories", description="Table Categories")
     * [disabled]ApiMethod(type="post")
     * [disabled]ApiRoute(name="/rest/categories/")
     * [disabled]ApiParams(name="name", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="imgFileSize", nullable=true, type="int", sample="", description="")
     * [disabled]ApiParams(name="imgMimeType", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="imgBaseName", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 201 OK")
     * [disabled]ApiReturn(type="object", sample="{
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
    public function postAction()
    {
        $this->status->setCode(200);
    }

    /**
     * [disabled]ApiDescription(section="Categories", description="Table Categories")
     * [disabled]ApiMethod(type="put")
     * [disabled]ApiRoute(name="/rest/categories/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiParams(name="name", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_es", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="name_eu", nullable=false, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="imgFileSize", nullable=true, type="int", sample="", description="")
     * [disabled]ApiParams(name="imgMimeType", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiParams(name="imgBaseName", nullable=true, type="varchar", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
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
     *     'message': 'Ok'
     * }")
     */
    public function putAction()
    {
        $this->status->setCode(200);
    }

    /**
     * [disabled]ApiDescription(section="Categories", description="Table Categories")
     * [disabled]ApiMethod(type="delete")
     * [disabled]ApiRoute(name="/rest/categories/")
     * [disabled]ApiParams(name="id", nullable=false, type="mediumint", sample="", description="")
     * [disabled]ApiReturnHeaders(sample="HTTP 200 OK")
     * [disabled]ApiReturn(type="object", sample="{
     *     'categories': '',
     *     'message': 'Ok'
     * }")
     */
    public function deleteAction()
    {

        $primaryKey = $this->getRequest()->getParam('id', false);

        if ($primaryKey != false) {

            $mapper = new Mappers\Categories();
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