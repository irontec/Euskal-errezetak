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
class RecipeTag extends ModelAbstract
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
    protected $_tagId;


    /**
     * Parent relation RecipeTag_ibfk_1
     *
     * @var \EuskalErrezetak\Model\Raw\Recipes
     */
    protected $_Recipe;

    /**
     * Parent relation RecipeTag_ibfk_2
     *
     * @var \EuskalErrezetak\Model\Raw\Tags
     */
    protected $_Tag;



    protected $_columnsList = array(
        'id'=>'id',
        'recipeId'=>'recipeId',
        'tagId'=>'tagId',
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
            'RecipeTagIbfk1'=> array(
                    'property' => 'Recipe',
                    'table_name' => 'Recipes',
                ),
            'RecipeTagIbfk2'=> array(
                    'property' => 'Tag',
                    'table_name' => 'Tags',
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
     * @return \EuskalErrezetak\Model\Raw\RecipeTag
     */
    public function setId($data)
    {

        if ($this->_id != $data) {
            $this->_logChange('id');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_id = $data;
        } else if (!is_null($data)) {
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
     * @return \EuskalErrezetak\Model\Raw\RecipeTag
     */
    public function setRecipeId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_recipeId != $data) {
            $this->_logChange('recipeId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_recipeId = $data;
        } else if (!is_null($data)) {
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
     * @return \EuskalErrezetak\Model\Raw\RecipeTag
     */
    public function setTagId($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_tagId != $data) {
            $this->_logChange('tagId');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_tagId = $data;
        } else if (!is_null($data)) {
            $this->_tagId = (int) $data;
        } else {
            $this->_tagId = $data;
        }
        return $this;
    }

    /**
     * Gets column tagId
     *
     * @return int
     */
    public function getTagId()
    {
            return $this->_tagId;
    }


    /**
     * Sets parent relation Recipe
     *
     * @param \EuskalErrezetak\Model\Raw\Recipes $data
     * @return \EuskalErrezetak\Model\Raw\RecipeTag
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

        $this->_setLoaded('RecipeTagIbfk1');
        return $this;
    }

    /**
     * Gets parent Recipe
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function getRecipe($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeTagIbfk1';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Recipe = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Recipe;
    }

    /**
     * Sets parent relation Tag
     *
     * @param \EuskalErrezetak\Model\Raw\Tags $data
     * @return \EuskalErrezetak\Model\Raw\RecipeTag
     */
    public function setTag(\EuskalErrezetak\Model\Raw\Tags $data)
    {
        $this->_Tag = $data;

        $primaryKey = $data->getPrimaryKey();
        if (is_array($primaryKey)) {
            $primaryKey = $primaryKey['id'];
        }

        if (!is_null($primaryKey)) {
            $this->setTagId($primaryKey);
        }

        $this->_setLoaded('RecipeTagIbfk2');
        return $this;
    }

    /**
     * Gets parent Tag
     * TODO: Mejorar esto para los casos en que la relación no exista. Ahora mismo siempre se pediría el padre
     * @return \EuskalErrezetak\Model\Raw\Tags
     */
    public function getTag($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeTagIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('parent', $fkName, $this, $where, $orderBy);
            $this->_Tag = array_shift($related);
            if ($usingDefaultArguments) {
                $this->_setLoaded($fkName);
            }
        }

        return $this->_Tag;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return EuskalErrezetak\Mapper\Sql\RecipeTag
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\EuskalErrezetak\Mapper\Sql\RecipeTag')) {

                $this->setMapper(new \EuskalErrezetak\Mapper\Sql\RecipeTag);

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
     * @return null | \EuskalErrezetak\Model\Validator\RecipeTag
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\EuskalErrezetak\\Validator\RecipeTag')) {

                $this->setValidator(new \EuskalErrezetak\Validator\RecipeTag);
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
     * @see \Mapper\Sql\RecipeTag::delete
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
