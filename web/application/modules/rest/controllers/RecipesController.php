<?php
/**
 * Recipes
 */

use EuskalErrezetak\Model as Models;
use EuskalErrezetak\Mapper\Sql as Mappers;

class Rest_RecipesController extends Iron_Controller_Rest_BaseController
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

        $categoryId = $this->getRequest()->getParam('category', false);
        $tagId = $this->getRequest()->getParam('tag', false);
        $name = $this->getRequest()->getParam('name', false);

        $search = $this->_search($categoryId, $tagId, $name);
        $result = array();

        if ($search === false) {

            $mapper = new Mappers\Recipes();
            $items = $mapper->fetchAll();

            if (!empty($items)) {
                foreach ($items as $item) {
                    $result[] = $item->getRestArray($this->_lang);
                }
            }

        } else {

            if (!empty($search)) {
                foreach ($search as $recipe) {
                    $result[] = $recipe->getRestArray($this->_lang);
                }
            }

        }

        $this->status->setCode(empty($result) ? 204 : 200);

        $this->view->message = 'Ok';
        $this->view->total = sizeof($result);
        $this->view->recipes = $result;

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
                $this->view->recipes = $item->getRestArray();
            }

        } else {

            $this->status->setCode(204);

        }

    }

    protected function _search($categoryId, $tagId, $name)
    {

        if ($categoryId == false && $tagId == false && $name == false) {
            return false;
        }

        $where = false;

        $mapper = new Mappers\Recipes();

        if ($name !== 'all') {
            $where = 'name_' . $this->_lang . ' LIKE "%' . $name . '%"';
        }

        $query = "SELECT Recipes.id FROM Recipes ";

        if ($categoryId !== 'all') {
            $query .= " INNER JOIN RecipeCategory ON RecipeCategory.categoryId = " . $categoryId;
        }

        if ($tagId !== 'all') {
            $query .= " INNER JOIN RecipeTag ON RecipeTag.tagId = " . $tagId;
        }

        if ($where) {
            $query .= " WHERE " . $where;
        }

        $query .= " GROUP BY Recipes.id";

        $queryResults = $mapper
                            ->getDbTable()
                            ->getAdapter()
                            ->query($query)
                            ->fetchAll();

        if (empty($queryResults)) {
            return array();
        }

        $validIds = array();

        foreach ($queryResults as $result) {
            $validIds[] = $result['id'];
        }

        $recipes = $mapper->fetchList(
            'id in (' . implode(',', $validIds) . ')'
        );

        return $recipes;

    }

}