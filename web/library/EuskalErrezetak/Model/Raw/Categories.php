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
 * [entity][rest]
 *
 * @package EuskalErrezetak\Model
 * @subpackage Model
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Model\Raw;
class Categories extends ModelAbstract
{
    /*
     * @var \Iron_Model_Fso
     */
    protected $_imgFso;


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
     * [FSO]
     * Database var type int
     *
     * @var int
     */
    protected $_imgFileSize;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_imgMimeType;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_imgBaseName;



    /**
     * Dependent relation RecipeCategory_ibfk_2
     * Type: One-to-Many relationship
     *
     * @var \EuskalErrezetak\Model\Raw\RecipeCategory[]
     */
    protected $_RecipeCategory;


    protected $_columnsList = array(
        'id'=>'id',
        'name'=>'name',
        'name_es'=>'nameEs',
        'name_eu'=>'nameEu',
        'imgFileSize'=>'imgFileSize',
        'imgMimeType'=>'imgMimeType',
        'imgBaseName'=>'imgBaseName',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'name'=> array('ml'),
            'imgFileSize'=> array('FSO'),
        ));

        $this->setMultiLangColumnsList(array(
            'name'=>'Name',
        ));

        $this->setAvailableLangs(array('eu', 'es'));

        $this->setParentList(array(
        ));

        $this->setDependentList(array(
            'RecipeCategoryIbfk2' => array(
                    'property' => 'RecipeCategory',
                    'table_name' => 'RecipeCategory',
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
        $this->_imgFso = new \Iron_Model_Fso($this, $this->getImgSpecs());

        return $this;
    }

    public function getFileObjects()
    {

        return array('img');
    }

    public function getImgSpecs()
    {
        return array(
            'basePath' => 'img',
            'sizeName' => 'imgFileSize',
            'mimeName' => 'imgMimeType',
            'baseNameName' => 'imgBaseName',
        );
    }

    public function putImg($filePath = '',$baseName = '')
    {
        $this->_imgFso->put($filePath);

        if (!empty($baseName)) {

            $this->_imgFso->setBaseName($baseName);
        }
    }

    public function fetchImg($autoload = true)
    {
        if ($autoload === true && $this->getimgFileSize() > 0) {

            $this->_imgFso->fetch();
        }

        return $this->_imgFso;
    }

    public function removeImg()
    {
        $this->_imgFso->remove();

        $this->_imgFso = null;

        return true;
    }



    /**************************************************************************
    *********************************** /FSO ***********************************
    ***************************************************************************/

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Categories
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
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Categories
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
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function setNameEs($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_nameEs != $data) {
            $this->_logChange('nameEs');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nameEs = $data;
        } else if (!is_null($data)) {
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
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function setNameEu($data)
    {

        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        if ($this->_nameEu != $data) {
            $this->_logChange('nameEu');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_nameEu = $data;
        } else if (!is_null($data)) {
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
     * @param int $data
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function setImgFileSize($data)
    {

        if ($this->_imgFileSize != $data) {
            $this->_logChange('imgFileSize');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_imgFileSize = $data;
        } else if (!is_null($data)) {
            $this->_imgFileSize = (int) $data;
        } else {
            $this->_imgFileSize = $data;
        }
        return $this;
    }

    /**
     * Gets column imgFileSize
     *
     * @return int
     */
    public function getImgFileSize()
    {
            return $this->_imgFileSize;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function setImgMimeType($data)
    {

        if ($this->_imgMimeType != $data) {
            $this->_logChange('imgMimeType');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_imgMimeType = $data;
        } else if (!is_null($data)) {
            $this->_imgMimeType = (string) $data;
        } else {
            $this->_imgMimeType = $data;
        }
        return $this;
    }

    /**
     * Gets column imgMimeType
     *
     * @return string
     */
    public function getImgMimeType()
    {
            return $this->_imgMimeType;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function setImgBaseName($data)
    {

        if ($this->_imgBaseName != $data) {
            $this->_logChange('imgBaseName');
        }

        if ($data instanceof \Zend_Db_Expr) {
            $this->_imgBaseName = $data;
        } else if (!is_null($data)) {
            $this->_imgBaseName = (string) $data;
        } else {
            $this->_imgBaseName = $data;
        }
        return $this;
    }

    /**
     * Gets column imgBaseName
     *
     * @return string
     */
    public function getImgBaseName()
    {
            return $this->_imgBaseName;
    }


    /**
     * Sets dependent relations RecipeCategory_ibfk_2
     *
     * @param array $data An array of \EuskalErrezetak\Model\Raw\RecipeCategory
     * @return \EuskalErrezetak\Model\Raw\Categories
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
     * Sets dependent relations RecipeCategory_ibfk_2
     *
     * @param \EuskalErrezetak\Model\Raw\RecipeCategory $data
     * @return \EuskalErrezetak\Model\Raw\Categories
     */
    public function addRecipeCategory(\EuskalErrezetak\Model\Raw\RecipeCategory $data)
    {
        $this->_RecipeCategory[] = $data;
        $this->_setLoaded('RecipeCategoryIbfk2');
        return $this;
    }

    /**
     * Gets dependent RecipeCategory_ibfk_2
     *
     * @param string or array $where
     * @param string or array $orderBy
     * @param boolean $avoidLoading skip data loading if it is not already
     * @return array The array of \EuskalErrezetak\Model\Raw\RecipeCategory
     */
    public function getRecipeCategory($where = null, $orderBy = null, $avoidLoading = false)
    {
        $fkName = 'RecipeCategoryIbfk2';

        $usingDefaultArguments = is_null($where) && is_null($orderBy);
        if (!$usingDefaultArguments) {
            $this->setNotLoaded($fkName);
        }

        $dontSkipLoading = !($avoidLoading);
        $notLoadedYet = !($this->_isLoaded($fkName));

        if ($dontSkipLoading && $notLoadedYet) {
            $related = $this->getMapper()->loadRelated('dependent', $fkName, $this, $where, $orderBy);
            $this->_RecipeCategory = $related;
            $this->_setLoaded($fkName);
        }

        return $this->_RecipeCategory;
    }

    /**
     * Returns the mapper class for this model
     *
     * @return EuskalErrezetak\Mapper\Sql\Categories
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\EuskalErrezetak\Mapper\Sql\Categories')) {

                $this->setMapper(new \EuskalErrezetak\Mapper\Sql\Categories);

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
     * @return null | \EuskalErrezetak\Model\Validator\Categories
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\EuskalErrezetak\\Validator\Categories')) {

                $this->setValidator(new \EuskalErrezetak\Validator\Categories);
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
     * @see \Mapper\Sql\Categories::delete
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
