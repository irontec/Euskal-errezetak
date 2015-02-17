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
 * Data Mapper implementation for EuskalErrezetak\Model\RecipeCategory
 *
 * @package Mapper
 * @subpackage Sql
 * @author Mikel Eizagirre
 */
namespace EuskalErrezetak\Mapper\Sql;
class RecipeCategory extends Raw\RecipeCategory
{
    public function fetchRecipesIdByCategoryId($categoryId)
    {
        $filterByIds = array();

        if (!is_numeric($categoryId)) {
            return $filterByIds;
        }

        $records = $this->fetchList("categoryId = " . $categoryId);

        foreach ($records as $record) {
            $filterByIds[] = $record->getRecipeId();
        }

        return $filterByIds;
    }
}
