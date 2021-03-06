<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecipesTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Recipes
 * @property \Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\RecipeTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\RecipeTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RecipeTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecipeTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RecipeTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecipeTag findOrCreate($search, callable $callback = null)
 */
class RecipesTagsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('recipes_tags');
        $this->displayField('recipe_id');
        $this->primaryKey(['recipe_id', 'tag_id']);

        $this->belongsTo('Recipes', [
            'foreignKey' => 'recipe_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['recipe_id'], 'Recipes'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        return $rules;
    }
}
