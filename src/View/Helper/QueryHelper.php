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
    public function getTags($recipeId)
    {
        /*$recipes = TableRegistry::get('Tags');
        // TODO: Still need to figure out the correct query
        $query = $recipes->find()
            ->select(['name'])->from('Tags')
            ->where(['recipe_tags.recipe_id' => $recipeId]);
        $query->hydrate(false);
        
        return $query->toList();*/
        return Text::tail(Text::toList(['chicken', 'dinner']), 50, ['ellipsis' => '...', 'exact' => false]);
    }
}