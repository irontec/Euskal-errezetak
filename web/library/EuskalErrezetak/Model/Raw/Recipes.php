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
     * Database var type varchar
     *
     * @var string
     */
    protected $_name;

    /**
     * [html]
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
    protected $_directions;

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




    protected $_columnsList = array(
        'id'=>'id',
        'name'=>'name',
        'ingredients'=>'ingredients',
        'directions'=>'directions',
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
            'ingredients'=> array('html'),
            'directions'=> array('html'),
            'difficulty'=> array('enum:easy|medium|hard'),
            'pictureFileSize'=> array('FSO'),
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
    public function setName($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_name != $data) {
            $this->_logChange('name');
        }

        if (!is_null($data)) {
            $this->_name = (string) $data;
        } else {
            $this->_name = $data;
        }
        return $this;
    }

    /**
     * Gets column name
     *
     * @return string
     */
    public function getName()
    {
            return $this->_name;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setIngredients($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_ingredients != $data) {
            $this->_logChange('ingredients');
        }

        if (!is_null($data)) {
            $this->_ingredients = (string) $data;
        } else {
            $this->_ingredients = $data;
        }
        return $this;
    }

    /**
     * Gets column ingredients
     *
     * @return text
     */
    public function getIngredients()
    {
    
        $pathFixer = new \Iron_Filter_PathFixer;
        return $pathFixer->fix($this->_ingredients);
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\Recipes
     */
    public function setDirections($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_directions != $data) {
            $this->_logChange('directions');
        }

        if (!is_null($data)) {
            $this->_directions = (string) $data;
        } else {
            $this->_directions = $data;
        }
        return $this;
    }

    /**
     * Gets column directions
     *
     * @return text
     */
    public function getDirections()
    {
    
        $pathFixer = new \Iron_Filter_PathFixer;
        return $pathFixer->fix($this->_directions);
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
