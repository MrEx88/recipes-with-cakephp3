<?php

namespace App\View\Helper;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;

class MiscHelper extends Helper
{
    /**
     * Gets all bookmarks from table.
     *
     * @return Bookmarks query.
     */
    public function bookmarks()
    {
        return TableRegistry::get('Bookmarks')->find('all');
    }
    
    /**
     * Gets the CakePHP version
     *
     * @return string of CakePHP version.
     */
    public function cakeVersion()
    {
        return Configure::version();
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
        foreach ($assocData as $assocRecord)
        {
            $results[] = $assocRecord->name;
        }
        return $results;
    }
}