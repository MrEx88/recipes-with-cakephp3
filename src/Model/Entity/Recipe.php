<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recipe Entity
 *
 * @property int $id
 * @property string $name
 * @property string $ingredients
 * @property string $instructions
 * @property string $image
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\RecipeTag[] $recipes_tags
 */
class Recipe extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Gets the ingredients and puts a hyphen infront of each ingredient.
     *
     * @return Delimited ingredients.
     */
    protected function _getIngredientsList()
    {
        $delimiter = "- &nbsp;";
        $list = $this->_properties['ingredients'];
        $list = $delimiter . $list;
        for($i = 0; $i < strlen($list); $i++)
        {
            if (substr($list, $i, 1) == "\n")
            {
                $list = substr_replace($list, $delimiter, $i+1, 0);
            }
        }

        return $list;
    }
}
