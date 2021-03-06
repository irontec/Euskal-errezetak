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
 * Data Mapper implementation for EuskalErrezetak\Model\Recipes
 *
 * @package EuskalErrezetak\Model
 * @subpackage Model
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Model;
class Recipes extends Raw\Recipes
{
    /**
     * This method is called just after parent's constructor
     */
    public function init()
    {
    }

    public function getRestArray($lang = 'es')
    {

        $tagsLiteral = array();
        $categoriesLiteral = array();

        $relCategories = $this->getRecipeCategory();
        if (!empty($relCategories)) {
            foreach ($relCategories as $relation) {
                $categoriesLiteral[] = $relation->getCategory()->getName($lang);
            }
        }

        $relTags = $this->getRecipeTag();
        if (!empty($relTags)) {
            foreach ($relTags as $relation) {
                $tagsLiteral[] = $relation->getTag()->getName($lang);
            }
        }

        $result = array(
            'id' => $this->getId(),
            'name' => $this->getName($lang),
            'ingredients' => $this->getIngredients($lang),
            'directions' => $this->getDirections($lang),
            'time' => $this->getTime($lang),
            'difficulty' => $this->getDifficulty(),
            'cost' => $this->getCost(),
            'people' => $this->getPeople(),
            'pictureFileSize' => $this->getPictureFileSize(),
            'pictureMimeType' => $this->getPictureMimeType(),
            'pictureBaseName' => $this->getPictureBaseName(),
            'categoriesLiteral' => implode(', ', $categoriesLiteral),
            'tagsLiteral' => implode(', ', $tagsLiteral)
        );

        return $result;

    }

}