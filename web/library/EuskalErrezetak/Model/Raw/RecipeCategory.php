<?php

/**
 * Application Model
 *
 * @package EuskalErrezetak\Model\Raw
 * @subpackage Model
 * @author Mikel Eizagirre
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * 
 *
 * @package EuskalErrezetak\Model
 * @subpackage Model
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Model\Raw;
class RecipeCategory extends ModelAbstract
{


    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_recipeId;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_categoryId;




    protected $_columnsList = array(
        'recipeId'=>'recipeId',
        'categoryId'=>'categoryId',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
        ));

        $this->setMultiLangColumnsList(array(
        ));

        $this->setAvailableLangs(array('eu'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
        ));




        $this->_defaultValues = array(
        );

        $this->_initFileObjects();
        parent::__construct();
    }

    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }
    /**************************************************************************
    ************************** File System Object (FSO)************************
    ***************************************************************************/

    protected function _initFileObjects()
    {

        return $this;
    }

    public function getFileObjects()
    {

        return array();
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function setRecipeId($data)
    {

        if ($this->_recipeId != $data) {
            $this->_logChange('recipeId');
        }

        if (!is_null($data)) {
            $this->_recipeId = (int) $data;
        } else {
            $this->_recipeId = $data;
        }
        return $this;
    }

    /**
     * Gets column recipeId
     *
     * @return int
     */
    public function getRecipeId()
    {
            return $this->_recipeId;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function setCategoryId($data)
    {

        if ($this->_categoryId != $data) {
            $this->_logChange('categoryId');
        }

        if (!is_null($data)) {
            $this->_categoryId = (int) $data;
        } else {
            $this->_categoryId = $data;
        }
        return $this;
    }

    /**
     * Gets column categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
            return $this->_categoryId;
    }


    /**
     * Returns the mapper class for this model
     *
     * @return EuskalErrezetak\Mapper\Sql\RecipeCategory
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\EuskalErrezetak\Mapper\Sql\RecipeCategory')) {

                $this->setMapper(new \EuskalErrezetak\Mapper\Sql\RecipeCategory);

            } else {

                 new \Exception("Not a valid mapper class found");
            }

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(false);
        }

        return $this->_mapper;
    }

    /**
     * Returns the validator class for this model
     *
     * @return null | \EuskalErrezetak\Model\Validator\RecipeCategory
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\EuskalErrezetak\\Validator\RecipeCategory')) {

                $this->setValidator(new \EuskalErrezetak\Validator\RecipeCategory);
            }
        }

        return $this->_validator;
    }

    public function setFromArray($data)
    {
        return $this->getMapper()->loadModel($data, $this);
    }

    /**
     * Deletes current row by deleting the row that matches the primary key
     *
     * @see \Mapper\Sql\RecipeCategory::delete
     * @return int|boolean Number of rows deleted or boolean if doing soft delete
     */
    public function deleteRowByPrimaryKey()
    {
        $primaryKey = array();
        if (!$this->getRecipeId()) {
            $this->_logger->log('The value for RecipeId cannot be empty in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key RecipeId does not contain a value');
        } else {
            $primaryKey['recipeId'] = $this->getRecipeId();
        }

        if (!$this->getCategoryId()) {
            $this->_logger->log('The value for CategoryId cannot be empty in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key CategoryId does not contain a value');
        } else {
            $primaryKey['categoryId'] = $this->getCategoryId();
        }

        return $this->getMapper()->getDbTable()->delete('recipeId = '
                    . $this->getMapper()->getDbTable()->getAdapter()->quote($primaryKey['recipeId'])
                    . ' AND categoryId = '
                    . $this->getMapper()->getDbTable()->getAdapter()->quote($primaryKey['categoryId']));
    }
}
