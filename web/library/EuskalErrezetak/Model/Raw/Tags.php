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
class Tags extends ModelAbstract
{


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
     * Dependent relation RecipeTag_ibfk_2
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
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'name'=> array('ml'),
        ));

        $this->setMultiLangColumnsList(array(
            'name'=>'Name',
        ));

        $this->setAvailableLangs(array('eu', 'es'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'RecipeTagIbfk2' => array(
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
     * @return \EuskalErrezetak\Model\Raw\Tags
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
     * @return \EuskalErrezetak\Model\Raw\Tags
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
     * @return \EuskalErrezetak\Model\Raw\Tags
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
     * @return \EuskalErrezetak\Model\Raw\Tags
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
     * Sets dependent relations RecipeTag_ibfk_2
     *
     * @param array $data An array of \EuskalErrezetak\Model\Raw\RecipeTag
     * @return \EuskalErrezetak\Model\Raw\Tags
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
     * Sets dependent relations RecipeTag_ibfk_2
     *
     * @param \EuskalErrezetak\Model\Raw\RecipeTag $data
     * @return \EuskalErrezetak\Model\Raw\Tags
     */
    public function addRecipeTag(\EuskalErrezetak\Model\Raw\RecipeTag $data)
    {
        $this->_RecipeTag[] = $data;
        $this->_setLoaded('RecipeTagIbfk2');
        return $this;
    }

    /**
     * Gets dependent RecipeTag_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \EuskalErrezetak\Model\Raw\RecipeTag
     */
    public function getRecipeTag($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeTagIbfk2';

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
     * @return EuskalErrezetak\Mapper\Sql\Tags
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\EuskalErrezetak\Mapper\Sql\Tags')) {

                $this->setMapper(new \EuskalErrezetak\Mapper\Sql\Tags);

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
     * @return null | \EuskalErrezetak\Model\Validator\Tags
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\EuskalErrezetak\\Validator\Tags')) {

                $this->setValidator(new \EuskalErrezetak\Validator\Tags);
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
     * @see \Mapper\Sql\Tags::delete
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
