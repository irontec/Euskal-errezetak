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
class StaticPages extends ModelAbstract
{

    protected $_statusAcceptedValues = array(
        'draft',
        'published',
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
    protected $_title;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_titleEs;

    /**
     * Database var type varchar
     *
     * @var string
     */
    protected $_titleEu;

    /**
     * [ml]
     * Database var type text
     *
     * @var text
     */
    protected $_description;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_descriptionEs;

    /**
     * Database var type text
     *
     * @var text
     */
    protected $_descriptionEu;

    /**
     * [enum:draft|published]
     * Database var type varchar
     *
     * @var string
     */
    protected $_status;




    protected $_columnsList = array(
        'id'=>'id',
        'title'=>'title',
        'title_es'=>'titleEs',
        'title_eu'=>'titleEu',
        'description'=>'description',
        'description_es'=>'descriptionEs',
        'description_eu'=>'descriptionEu',
        'status'=>'status',
    );

    /**
     * Sets up column and relationship lists
     */
    public function __construct()
    {
        $this->setColumnsMeta(array(
            'title'=> array('ml'),
            'description'=> array('ml'),
            'status'=> array('enum:draft|published'),
        ));

        $this->setMultiLangColumnsList(array(
            'title'=>'Title',
            'description'=>'Description',
        ));

        $this->setAvailableLangs(array('eu', 'es'));

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
     * @return \EuskalErrezetak\Model\Raw\StaticPages
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
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setTitle($data, $language = '')
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }

        $language = $this->_getCurrentLanguage($language);

        $methodName = "setTitle". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_title = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column title
     *
     * @return string
     */
    public function getTitle($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getTitle". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_title;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setTitleEs($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_titleEs != $data) {
            $this->_logChange('titleEs');
        }

        if (!is_null($data)) {
            $this->_titleEs = (string) $data;
        } else {
            $this->_titleEs = $data;
        }
        return $this;
    }

    /**
     * Gets column title_es
     *
     * @return string
     */
    public function getTitleEs()
    {
            return $this->_titleEs;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setTitleEu($data)
    {


        if (is_null($data)) {
            throw new \InvalidArgumentException(_('Required values cannot be null'));
        }
        if ($this->_titleEu != $data) {
            $this->_logChange('titleEu');
        }

        if (!is_null($data)) {
            $this->_titleEu = (string) $data;
        } else {
            $this->_titleEu = $data;
        }
        return $this;
    }

    /**
     * Gets column title_eu
     *
     * @return string
     */
    public function getTitleEu()
    {
            return $this->_titleEu;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setDescription($data, $language = '')
    {


        $language = $this->_getCurrentLanguage($language);

        $methodName = "setDescription". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            $this->_description = $data;
            return $this;
        }
        $this->$methodName($data);
        return $this;
    }

    /**
     * Gets column description
     *
     * @return text
     */
    public function getDescription($language = '')
    {
    
        $language = $this->_getCurrentLanguage($language);

        $methodName = "getDescription". ucfirst(str_replace('_', '', $language));
        if (!method_exists($this, $methodName)) {

            // new \Exception('Unavailable language');
            return $this->_description;
        }

        return $this->$methodName();

    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setDescriptionEs($data)
    {

        if ($this->_descriptionEs != $data) {
            $this->_logChange('descriptionEs');
        }

        if (!is_null($data)) {
            $this->_descriptionEs = (string) $data;
        } else {
            $this->_descriptionEs = $data;
        }
        return $this;
    }

    /**
     * Gets column description_es
     *
     * @return text
     */
    public function getDescriptionEs()
    {
            return $this->_descriptionEs;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param text $data
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setDescriptionEu($data)
    {

        if ($this->_descriptionEu != $data) {
            $this->_logChange('descriptionEu');
        }

        if (!is_null($data)) {
            $this->_descriptionEu = (string) $data;
        } else {
            $this->_descriptionEu = $data;
        }
        return $this;
    }

    /**
     * Gets column description_eu
     *
     * @return text
     */
    public function getDescriptionEu()
    {
            return $this->_descriptionEu;
    }

    /**
     * Sets column Stored in ISO 8601 format.     *
     * @param string $data
     * @return \EuskalErrezetak\Model\Raw\StaticPages
     */
    public function setStatus($data)
    {

        if ($this->_status != $data) {
            $this->_logChange('status');
        }

        if (!is_null($data)) {
            if (!in_array($data, $this->_statusAcceptedValues) && !empty($data)) {
                throw new \InvalidArgumentException(_('Invalid value for status'));
            }
            $this->_status = (string) $data;
        } else {
            $this->_status = $data;
        }
        return $this;
    }

    /**
     * Gets column status
     *
     * @return string
     */
    public function getStatus()
    {
            return $this->_status;
    }


    /**
     * Returns the mapper class for this model
     *
     * @return EuskalErrezetak\Mapper\Sql\StaticPages
     */
    public function getMapper()
    {
        if ($this->_mapper === null) {

            \Zend_Loader_Autoloader::getInstance()->suppressNotFoundWarnings(true);

            if (class_exists('\EuskalErrezetak\Mapper\Sql\StaticPages')) {

                $this->setMapper(new \EuskalErrezetak\Mapper\Sql\StaticPages);

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
     * @return null | \EuskalErrezetak\Model\Validator\StaticPages
     */
    public function getValidator()
    {
        if ($this->_validator === null) {

            if (class_exists('\EuskalErrezetak\\Validator\StaticPages')) {

                $this->setValidator(new \EuskalErrezetak\Validator\StaticPages);
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
     * @see \Mapper\Sql\StaticPages::delete
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
