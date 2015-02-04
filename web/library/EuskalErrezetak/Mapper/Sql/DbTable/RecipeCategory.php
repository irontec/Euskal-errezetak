<?php

/**
 * Application Model DbTables
 *
 * @package EuskalErrezetak\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Mikel Eizagirre
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Table definition for RecipeCategory
 *
 * @package EuskalErrezetak\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Mapper\Sql\DbTable;
class RecipeCategory extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'RecipeCategory';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_rowClass = 'EuskalErrezetak\\Model\\RecipeCategory';
    protected $_rowMapperClass = 'EuskalErrezetak\\Mapper\\Sql\\RecipeCategory';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'RecipeCategoryIbfk1' => array(
            'columns' => 'recipeId',
            'refTableClass' => 'EuskalErrezetak\\Mapper\\Sql\\DbTable\\Recipes',
            'refColumns' => 'id'
        ),
        'RecipeCategoryIbfk2' => array(
            'columns' => 'categoryId',
            'refTableClass' => 'EuskalErrezetak\\Mapper\\Sql\\DbTable\\Categories',
            'refColumns' => 'id'
        )
    );
    
    protected $_metadata = array (
	  'id' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'RecipeCategory',
	    'COLUMN_NAME' => 'id',
	    'COLUMN_POSITION' => 1,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => true,
	    'PRIMARY_POSITION' => 1,
	    'IDENTITY' => true,
	  ),
	  'recipeId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'RecipeCategory',
	    'COLUMN_NAME' => 'recipeId',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'categoryId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'RecipeCategory',
	    'COLUMN_NAME' => 'categoryId',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'mediumint',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
