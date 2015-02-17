<?php

use EuskalErrezetak\Mapper\Sql as Mapper;

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Create a list of recipe names
        $recipesMapper = new Mapper\Recipes;

        $recipes = $recipesMapper->fetchList();

        $text = '<ul>';
        foreach ($recipes as $recipe) {
            $text .= '<li>' . $recipe->getName() . '</li>';
        }
        $text .= '</ul>';

        $this->view->recipesList = $text;

        // Get the names of the recipes from Category 6 - 'Betiko errezetak'
        $recipesNames = $recipesMapper->fetchRecipesNamesByCategoryId(6);

        $textNames = '<p><i>Betiko errezetak</i> kategoriako errezeten izenak: ' . implode(", ", $recipesNames) . '</p>';

        $this->view->recipesNames = $textNames;

        // Get the Ids of the recipes from Category 6 - 'Betiko errezetak'
        $recipesCategoryMapper = new Mapper\RecipeCategory;

        $recipesIds = $recipesCategoryMapper->fetchRecipesIdByCategoryId(6);

        $textIds = '<p><i>Betiko errezetak</i> kategoriako errezeten <i>id</i>ak: ' . implode(", ", $recipesIds) . '</p>';

        $this->view->recipesIds = $textIds;
    }
}
