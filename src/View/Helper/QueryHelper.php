<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class QueryHelper extends Helper
{
    /**
     * Gets the tags associated with the recipe id.
     *
     * @param $recipeId The id of the recipe.
     * @return An array of tags
     */
    public function getTags($recipeTags)
    {
        /*SELECT t.name from tags t
        JOIN recipes_tags rt ON (t.id = rt.tag_id) 
        JOIN recipes r ON (rt.recipe_id = r.id)
        WHERE r.id = 2;*/
        
        $results =[];
        foreach($recipeTags as $recipeTag)
        {
            $results[] = $recipeTag['name'];
        }
        return $results;
    }
}