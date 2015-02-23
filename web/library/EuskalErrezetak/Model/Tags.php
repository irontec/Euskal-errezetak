<?php

/**
 * Application Model
 *
 * @package EuskalErrezetak\Model
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

namespace EuskalErrezetak\Model;
class Tags extends Raw\Tags
{
    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }

    public function getRestArray($lang = 'es')
    {

        $result = array(
            'id' => $this->getId(),
            'name' => $this->getName($lang),
        );

        return $result;

    }

}