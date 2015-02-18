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
 * [rest]
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
    protected $_id;

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


    /**
     * Parent relation RecipeCategory_ibfk_1
     *
     * @var \EuskalErrezetak\Model\Raw\Recipes
     */
    protected $_Recipe;

    /**
     * Parent relation RecipeCategory_ibfk_2
     *
     * @var \EuskalErrezetak\Model\Raw\Categories
     */
    protected $_Category;



    protected $_columnsList = array(
        'id'=>'id',
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

        $this->setAvailableLangs(array('eu', 'es'));

        $this->setParentList(array(
            'RecipeCategoryIbfk1'=> array(
                    'property' => 'Recipe',
                    'table_name' => 'Recipes',
                ),
            'RecipeCategoryIbfk2'=> array(
                    'property' => 'Category',
                    'table_name' => 'Categories',
                ),
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
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        if (!is_null($data)) {
            $this->_id = (int) $data;
        } else {
            $this->_id = $data;
        }
        return $this;
    }

    /**
     * Gets column id
     *
     * @return int
     */
    public function getId()
    {
            return $this->_id;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function setRecipeId($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
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


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
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
     * Sets parent relation Recipe
     *
     * @param \EuskalErrezetak\Model\Raw\Recipes $data
     * @return \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function setRecipe(\EuskalErrezetak\Model\Raw\Recipes $data)
    {
        $this->_Recipe = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setRecipeId($primaryKey);
        }

        $this->_setLoaded('RecipeCategoryIbfk1');
        return $this;
    }

    /**
     * Gets parent Recipe
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function getRecipe($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeCategoryIbfk1';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Recipe = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Recipe;
    }

    /**
     * Sets parent relation Category
     *
     * @param \EuskalErrezetak\Model\Raw\Categories $data
     * @return \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function setCategory(\EuskalErrezetak\Model\Raw\Categories $data)
    {
        $this->_Category = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setCategoryId($primaryKey);
        }

        $this->_setLoaded('RecipeCategoryIbfk2');
        return $this;
    }

    /**
     * Gets parent Category
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function getCategory($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeCategoryIbfk2';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Category = array_shift($related);
            $this->_setLoaded($fkName);
        }

        return $this->_Category;
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
        if ($this->getId() === null) {
            $this->_logger->log('The value for Id cannot be null in deleteRowByPrimaryKey for ' . get_class($this), \Zend_Log::ERR);
            throw new \Exception('Primary Key does not contain a value');
        }

        return $this->getMapper()->getDbTable()->delete(
            'id = ' .
             $this->getMapper()->getDbTable()->getAdapter()->quote($this->getId())
        );
    }
}
