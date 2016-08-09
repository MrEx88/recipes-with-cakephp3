<?php

namespace App\View\Helper;

use Cake\Core\Configure;
use Cake\Utility\Inflector;
use Cake\Utility\Text;
use Cake\View\Helper;

class MiscHelper extends Helper
{
    /**
     * Gets the CakePHP version
     *
     * @return string of CakePHP version.
     */
    public function getCakeVersion()
    {
        return Configure::version();
    }
    
    /**
     * Turns an array into a list that has been humanized.
     *
     * @param $array Array to be altered.
     * @return The list that has been humanized.
     */
    public function toList(array $array)
    {
        $arrayList = [];
        foreach($array as $value)
        {
            $arrayList[] = Inflector::humanize($value);
        }
        return Text::toList($arrayList);
    }

    /**
     * Gets the associated table data and puts name field in array.
     *
     * @param $recipeId The id of the recipe.
     * @return Array of names from associated table data.
     */
    public function getNames($assocData)
    {        
        $results =[];
        foreach($assocData as $assocRecord)
        {
            $results[] = $assocRecord->name;
        }
        return $results;
    }
}