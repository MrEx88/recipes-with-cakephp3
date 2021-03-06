<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Inflector;
use Cake\ORM\TableRegistry;

class TableComponent extends Component
{
    /**
     * Updates all records in a table and deletes selected records as well.
     * 
     * @param $table The table instance.
     * @param array $data The request data.
     * @param &$message Message going to be used for Flash.
     * @return True If successfully updated.
     */
    public function updateTable($table, array $data, &$message)
    {
        $b = TableRegistry::get('RecipeTags');
        $query = $table->find('all');
        $entities = $table->patchEntities($query->toArray(), $data);
        $alias = strtolower(Inflector::humanize(Inflector::underscore($table->alias())));
        if($table->saveMany($entities))
        {
            // Delete any entity marked for deletion.
            foreach($entities as $entity)
            {
                if($entity['delete'] == '1')
                {
                    if (!$table->delete($entity))
                    {
                        $message = __('Successfully update {0}, but had trouble deleting seleted {0}. Please, try again.', $alias);
                        return false;
                    }
                }
            }
            $message = __('The {0} have been updated.', $alias);
            return true;
        }
        $message = __('The {0} could not be updated. Please, try again.', $alias);
        return false;
    }
}