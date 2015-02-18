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
 * Table definition for StaticPages
 *
 * @package EuskalErrezetak\Mapper\Sql\DbTable
 * @subpackage DbTable
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Mapper\Sql\DbTable;
class StaticPages extends TableAbstract
{
    /**
     * $_name - name of database table
     *
     * @var string
     */
    protected $_name = 'StaticPages';

    /**
     * $_id - this is the primary key name
     *
     * @var int
     */
    protected $_id = 'id';

    protected $_rowClass = 'EuskalErrezetak\\Model\\StaticPages';
    protected $_rowMapperClass = 'EuskalErrezetak\\Mapper\\Sql\\StaticPages';

    protected $_sequence = true; // int
    
    
    protected $_metadata = array (
	  'id' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
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
	  'title' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'title',
	    'COLUMN_POSITION' => 2,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '20',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'title_es' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'title_es',
	    'COLUMN_POSITION' => 3,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '20',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'title_eu' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'title_eu',
	    'COLUMN_POSITION' => 4,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => false,
	    'LENGTH' => '20',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'description' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'description',
	    'COLUMN_POSITION' => 5,
	    'DATA_TYPE' => 'text',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'description_es' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'description_es',
	    'COLUMN_POSITION' => 6,
	    'DATA_TYPE' => 'text',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'description_eu' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'description_eu',
	    'COLUMN_POSITION' => 7,
	    'DATA_TYPE' => 'text',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => NULL,
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	  'status' => 
	  array (
	    'SCHEMA_NAME' => NULL,
	    'TABLE_NAME' => 'StaticPages',
	    'COLUMN_NAME' => 'status',
	    'COLUMN_POSITION' => 8,
	    'DATA_TYPE' => 'varchar',
	    'DEFAULT' => NULL,
	    'NULLABLE' => true,
	    'LENGTH' => '50',
	    'SCALE' => NULL,
	    'PRECISION' => NULL,
	    'UNSIGNED' => NULL,
	    'PRIMARY' => false,
	    'PRIMARY_POSITION' => NULL,
	    'IDENTITY' => false,
	  ),
	);




}
