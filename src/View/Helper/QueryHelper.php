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
        /*SELECT t.name from tags t
        JOIN recipe_tags rt ON (t.id = rt.tag_id) 
        JOIN recipes r ON (rt.recipe_id = r.id)
        WHERE r.id = 2;*/
        
        $recipes = TableRegistry::get('Tags');
        $query = $recipes->find()
            ->select(['tags.name'])->from('tags')
            ->join([
                'rt' => [
                    'table' => 'recipe_tags',
                    'conditions' => 'tags.id = rt.tag_id'
                ],
                'r' => [
                    'table' => 'recipes',
                    'conditions' => 'rt.recipe_id = r.id'
                ]
            ])
            ->where(['r.id' => $recipeId])
            ->toArray();
        
        $results;
        foreach($query as $q)
        {
            $results[] = $q['tags']['name'];
        }
        // TODO: ?? Find out a way to make each tag a link so each tag you click on will
        //          show all recipes for that tag.
        return Text::tail(Text::toList($results), 50, ['ellipsis' => '...', 'exact' => false]);
    }
}