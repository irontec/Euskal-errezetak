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
 * Table definition for RecipeTag
 *
 * @package EuskalErrezetak\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Mapper\Sql\DbTable;
class RecipeTag extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'RecipeTag';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_rowClass = 'EuskalErrezetak\\Model\\RecipeTag';
    protected $_rowMapperClass = 'EuskalErrezetak\\Mapper\\Sql\\RecipeTag';

    protected $_sequence = true; // int
    protected $_referenceMap = array(
        'RecipeTagIbfk1' => array(
            'columns' => 'recipeId',
            'refTableClass' => 'EuskalErrezetak\\Mapper\\Sql\\DbTable\\Recipes',
            'refColumns' => 'id'
        ),
        'RecipeTagIbfk2' => array(
            'columns' => 'tagId',
            'refTableClass' => 'EuskalErrezetak\\Mapper\\Sql\\DbTable\\Tags',
            'refColumns' => 'id'
        )
    );
    
    protected $_metadata = array (
	  'id' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'RecipeTag',
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
	    'TABLE_NAME' => 'RecipeTag',
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
	  'tagId' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'RecipeTag',
	    'COLUMN_NAME' => 'tagId',
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
