<?php

/**
 * Application Model Mapper
 *
 * @package Mapper
 * @subpackage Sql
 * @author Mikel Eizagirre
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for EuskalErrezetak\Model\Recipes
 *
 * @package Mapper
 * @subpackage Sql
 * @author Mikel Eizagirre
 */
namespace EuskalErrezetak\Mapper\Sql;
class Recipes extends Raw\Recipes
{
    public function fetchRecipesNamesByCategoryId($categoryId)
    {
        $filterByIds = array();

        if (!is_numeric($categoryId)) {
            return $filterByIds;
        }

        $adapter = $this->getAdapter();
        $sql = "SELECT Recipes.name_eu as name "
            . "FROM Recipes LEFT JOIN RecipeCategory ON RecipeCategory.recipeId = Recipes.id "
        	. "WHERE RecipeCategory.categoryId = $categoryId";

        if ($recipesSet = $adapter->fetchAll($sql)) {

            foreach ($recipesSet as $recipe) {
                $filterByIds[] = $recipe['name'];
            }

        }

        return $filterByIds;
    }
    
    public function fetchRecipesByCategoryId($categoryId)
    {
    	$recipesById = array();
    
    	if (!is_numeric($categoryId)) {
    		return $recipesById;
    	}
    
    	$adapter = $this->getAdapter();
    	$sql = "SELECT * "
    			. "FROM Recipes LEFT JOIN RecipeCategory ON RecipeCategory.recipeId = Recipes.id "
    			. "WHERE RecipeCategory.categoryId = $categoryId";
    
    	return $adapter->fetchAll($sql);
    }
    
    public function fetchRecipesByTagId($tagId)
    {
    	$recipesById = array();
    
    	if (!is_numeric($tagId)) {
    		return $recipesById;
    	}
    
    	$adapter = $this->getAdapter();
    	$sql = "SELECT * "
    			. "FROM Recipes LEFT JOIN RecipeTag ON RecipeTag.recipeId = Recipes.id "
    			. "WHERE RecipeTag.tagId = $tagId";
    
    	return $adapter->fetchAll($sql);
    }
}
