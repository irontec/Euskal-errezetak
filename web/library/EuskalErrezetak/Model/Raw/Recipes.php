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
 * [entity]
 *
 * @package EuskalErrezetak\Model
 * @subpackage Model
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Model\Raw;
class Recipes extends ModelAbstract
{
    /*
     * @var \Iron_Model_Fso
     */
    protected $_pictureFso;

    protected $_difficultyAcceptedValues = array(
        'easy',
        'medium',
        'hard',
    );

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_id;

    /**
     * [ml]
     * Database var type varchar
     *
     * @var string
     */
    protected $_name;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nameEs;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_nameEu;

    /**
     * [html][ml]
     * Database var type text
     *
     * @var text
     */
    protected $_ingredients;

    /**
     * [html]
     * Database var type text
     *
     * @var text
     */
    protected $_ingredientsEs;

    /**
     * [html]
     * Database var type text
     *
     * @var text
     */
    protected $_ingredientsEu;

    /**
     * [html][ml]
     * Database var type text
     *
     * @var text
     */
    protected $_directions;

    /**
     * [html]
     * Database var type text
     *
     * @var text
     */
    protected $_directionsEs;

    /**
     * [html]
     * Database var type text
     *
     * @var text
     */
    protected $_directionsEu;

    /**
     * Database var type mediumint
     *
     * @var int
     */
    protected $_time;

    /**
     * [enum:easy|medium|hard]
     * Database var type varchar
     *
     * @var string
     */
    protected $_difficulty;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_cost;

    /**
     * Database var type int
     *
     * @var int
     */
    protected $_people;

    /**
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_pictureFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_pictureMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_pictureBaseName;



    /**
     * Dependent relation RecipeCategory_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \EuskalErrezetak\Model\Raw\RecipeCategory[]
     */
    protected $_RecipeCategory;

    /**
     * Dependent relation RecipeTag_ibfk_1
     * Type: One-to-Many relationship
     *
     * @var \EuskalErrezetak\Model\Raw\RecipeTag[]
     */
    protected $_RecipeTag;


    protected $_columnsList = array(
        'id'=>'id',
        'name'=>'name',
        'name_es'=>'nameEs',
        'name_eu'=>'nameEu',
        'ingredients'=>'ingredients',
        'ingredients_es'=>'ingredientsEs',
        'ingredients_eu'=>'ingredientsEu',
        'directions'=>'directions',
        'directions_es'=>'directionsEs',
        'directions_eu'=>'directionsEu',
        'time'=>'time',
        'difficulty'=>'difficulty',
        'cost'=>'cost',
        'people'=>'people',
        'pictureFileSize'=>'pictureFileSize',
        'pictureMimeType'=>'pictureMimeType',
        'pictureBaseName'=>'pictureBaseName',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'name'=> array('ml'),
            'ingredients'=> array('html','ml'),
            'ingredients_es'=> array('html'),
            'ingredients_eu'=> array('html'),
            'directions'=> array('html','ml'),
            'directions_es'=> array('html'),
            'directions_eu'=> array('html'),
            'difficulty'=> array('enum:easy|medium|hard'),
            'pictureFileSize'=> array('FSO'),
        ));

        $this->setMultiLangColumnsList(array(
            'name'=>'Name',
            'ingredients'=>'Ingredients',
            'directions'=>'Directions',
        ));

        $this->setAvailableLangs(array('eu', 'es'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'RecipeCategoryIbfk1' => array(
                    'property' => 'RecipeCategory',
                    'table_name' => 'RecipeCategory',
                ),
            'RecipeTagIbfk1' => array(
                    'property' => 'RecipeTag',
                    'table_name' => 'RecipeTag',
                ),
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
        $this->_pictureFso = new \Iron_Model_Fso($this, $this->getPictureSpecs());

        return $this;
    }

    public function getFileObjects()
    {

        return array('picture');
    }

    public function getPictureSpecs()
    {
        return array(
            'basePath' => 'picture',
            'sizeName' => 'pictureFileSize',
            'mimeName' => 'pictureMimeType',
            'baseNameName' => 'pictureBaseName',
        );
    }

    public function putPicture($filePath = '',$baseName = '')
    {
        $this->_pictureFso->put($filePath);

        if (!empty($baseName)) {

            $this->_pictureFso->setBaseName($baseName);
        }
    }

    public function fetchPicture($autoload = true)
    {
        if ($autoload === true && $this->getpictureFileSize() > 0) {

            $this->_pictureFso->fetch();
        }

        return $this->_pictureFso;
    }

    public function removePicture()
    {
        $this->_pictureFso->remove();

        $this->_pictureFso = null;

        return true;
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
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
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setName($data, $language = '')
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setName". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_name = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column name
     *
     * @return string
     */
    public function getName($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getName". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_name;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setNameEs($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_nameEs != $data) {
            $this->_logChange('nameEs');
        }

        if (!is_null($data)) {
            $this->_nameEs = (string) $data;
        } else {
            $this->_nameEs = $data;
        }
        return $this;
    }

    /**
     * Gets column name_es
     *
     * @return string
     */
    public function getNameEs()
    {
            return $this->_nameEs;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setNameEu($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_nameEu != $data) {
            $this->_logChange('nameEu');
        }

        if (!is_null($data)) {
            $this->_nameEu = (string) $data;
        } else {
            $this->_nameEu = $data;
        }
        return $this;
    }

    /**
     * Gets column name_eu
     *
     * @return string
     */
    public function getNameEu()
    {
            return $this->_nameEu;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setIngredients($data, $language = '')
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setIngredients". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_ingredients = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column ingredients
     *
     * @return text
     */
    public function getIngredients($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getIngredients". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_ingredients;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setIngredientsEs($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_ingredientsEs != $data) {
            $this->_logChange('ingredientsEs');
        }

        if (!is_null($data)) {
            $this->_ingredientsEs = (string) $data;
        } else {
            $this->_ingredientsEs = $data;
        }
        return $this;
    }

    /**
     * Gets column ingredients_es
     *
     * @return text
     */
    public function getIngredientsEs()
    {
    
        $pathFixer = new \Iron_Filter_PathFixer;
        return $pathFixer->fix($this->_ingredientsEs);
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setIngredientsEu($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_ingredientsEu != $data) {
            $this->_logChange('ingredientsEu');
        }

        if (!is_null($data)) {
            $this->_ingredientsEu = (string) $data;
        } else {
            $this->_ingredientsEu = $data;
        }
        return $this;
    }

    /**
     * Gets column ingredients_eu
     *
     * @return text
     */
    public function getIngredientsEu()
    {
    
        $pathFixer = new \Iron_Filter_PathFixer;
        return $pathFixer->fix($this->_ingredientsEu);
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setDirections($data, $language = '')
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setDirections". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_directions = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column directions
     *
     * @return text
     */
    public function getDirections($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getDirections". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_directions;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setDirectionsEs($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_directionsEs != $data) {
            $this->_logChange('directionsEs');
        }

        if (!is_null($data)) {
            $this->_directionsEs = (string) $data;
        } else {
            $this->_directionsEs = $data;
        }
        return $this;
    }

    /**
     * Gets column directions_es
     *
     * @return text
     */
    public function getDirectionsEs()
    {
    
        $pathFixer = new \Iron_Filter_PathFixer;
        return $pathFixer->fix($this->_directionsEs);
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setDirectionsEu($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_directionsEu != $data) {
            $this->_logChange('directionsEu');
        }

        if (!is_null($data)) {
            $this->_directionsEu = (string) $data;
        } else {
            $this->_directionsEu = $data;
        }
        return $this;
    }

    /**
     * Gets column directions_eu
     *
     * @return text
     */
    public function getDirectionsEu()
    {
    
        $pathFixer = new \Iron_Filter_PathFixer;
        return $pathFixer->fix($this->_directionsEu);
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setTime($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_time != $data) {
            $this->_logChange('time');
        }

        if (!is_null($data)) {
            $this->_time = (int) $data;
        } else {
            $this->_time = $data;
        }
        return $this;
    }

    /**
     * Gets column time
     *
     * @return int
     */
    public function getTime()
    {
            return $this->_time;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setDifficulty($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_difficulty != $data) {
            $this->_logChange('difficulty');
        }

        if (!is_null($data)) {
            if (!in_array($data, $this->_difficultyAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for difficulty'));
            }
            $this->_difficulty = (string) $data;
        } else {
            $this->_difficulty = $data;
        }
        return $this;
    }

    /**
     * Gets column difficulty
     *
     * @return string
     */
    public function getDifficulty()
    {
            return $this->_difficulty;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setCost($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_cost != $data) {
            $this->_logChange('cost');
        }

        if (!is_null($data)) {
            $this->_cost = (int) $data;
        } else {
            $this->_cost = $data;
        }
        return $this;
    }

    /**
     * Gets column cost
     *
     * @return int
     */
    public function getCost()
    {
            return $this->_cost;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setPeople($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_people != $data) {
            $this->_logChange('people');
        }

        if (!is_null($data)) {
            $this->_people = (int) $data;
        } else {
            $this->_people = $data;
        }
        return $this;
    }

    /**
     * Gets column people
     *
     * @return int
     */
    public function getPeople()
    {
            return $this->_people;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setPictureFileSize($data)
    {

        if ($this->_pictureFileSize != $data) {
            $this->_logChange('pictureFileSize');
        }

        if (!is_null($data)) {
            $this->_pictureFileSize = (int) $data;
        } else {
            $this->_pictureFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column pictureFileSize
     *
     * @return int
     */
    public function getPictureFileSize()
    {
            return $this->_pictureFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setPictureMimeType($data)
    {

        if ($this->_pictureMimeType != $data) {
            $this->_logChange('pictureMimeType');
        }

        if (!is_null($data)) {
            $this->_pictureMimeType = (string) $data;
        } else {
            $this->_pictureMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column pictureMimeType
     *
     * @return string
     */
    public function getPictureMimeType()
    {
            return $this->_pictureMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setPictureBaseName($data)
    {

        if ($this->_pictureBaseName != $data) {
            $this->_logChange('pictureBaseName');
        }

        if (!is_null($data)) {
            $this->_pictureBaseName = (string) $data;
        } else {
            $this->_pictureBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column pictureBaseName
     *
     * @return string
     */
    public function getPictureBaseName()
    {
            return $this->_pictureBaseName;
    }


    /**
     * Sets dependent relations RecipeCategory_ibfk_1
     *
     * @param array $data An array of \EuskalErrezetak\Model\Raw\RecipeCategory
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setRecipeCategory(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_RecipeCategory === null) {

                $this->getRecipeCategory();
            }

            $oldRelations = $this->_RecipeCategory;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    if (is_numeric($pk = $newItem->getPrimaryKey())) {

                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_RecipeCategory = array();

        foreach ($data as $object) {
            $this->addRecipeCategory($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations RecipeCategory_ibfk_1
     *
     * @param \EuskalErrezetak\Model\Raw\RecipeCategory $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function addRecipeCategory(\EuskalErrezetak\Model\Raw\RecipeCategory $data)
    {
        $this->_RecipeCategory[] = $data;
        $this->_setLoaded('RecipeCategoryIbfk1');
        return $this;
    }

    /**
     * Gets dependent RecipeCategory_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function getRecipeCategory($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeCategoryIbfk1';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_RecipeCategory = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_RecipeCategory;
    }

    /**
     * Sets dependent relations RecipeTag_ibfk_1
     *
     * @param array $data An array of \EuskalErrezetak\Model\Raw\RecipeTag
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setRecipeTag(array $data, $deleteOrphans = false)
    {
        if ($deleteOrphans === true) {

            if ($this->_RecipeTag === null) {

                $this->getRecipeTag();
            }

            $oldRelations = $this->_RecipeTag;

            if (is_array($oldRelations)) {

                $dataPKs = array();

                foreach ($data as $newItem) {

                    if (is_numeric($pk = $newItem->getPrimaryKey())) {

                        $dataPKs[] = $pk;
                    }
                }

                foreach ($oldRelations as $oldItem) {

                    if (!in_array($oldItem->getPrimaryKey(), $dataPKs)) {

                        $this->_orphans[] = $oldItem;
                    }
                }
            }
        }

        $this->_RecipeTag = array();

        foreach ($data as $object) {
            $this->addRecipeTag($object);
        }

        return $this;
    }

    /**
     * Sets dependent relations RecipeTag_ibfk_1
     *
     * @param \EuskalErrezetak\Model\Raw\RecipeTag $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function addRecipeTag(\EuskalErrezetak\Model\Raw\RecipeTag $data)
    {
        $this->_RecipeTag[] = $data;
        $this->_setLoaded('RecipeTagIbfk1');
        return $this;
    }

    /**
     * Gets dependent RecipeTag_ibfk_1
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \EuskalErrezetak\Model\Raw\RecipeTag
     */
    public function getRecipeTag($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeTagIbfk1';

        if (!$avoidLoading && !$this->_isLoaded($fkName)) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_RecipeTag = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_RecipeTag;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return EuskalErrezetak\Mapper\Sql\Recipes
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\EuskalErrezetak\Mapper\Sql\Recipes')) {

                $this->setMapper(new \EuskalErrezetak\Mapper\Sql\Recipes);

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
     * @return null | \EuskalErrezetak\Model\Validator\Recipes
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\EuskalErrezetak\\Validator\Recipes')) {

                $this->setValidator(new \EuskalErrezetak\Validator\Recipes);
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
     * @see \Mapper\Sql\Recipes::delete
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
