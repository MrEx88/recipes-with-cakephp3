<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\Controller;

class TableComponent extends Component
{
    public function updateTable($table, array $data, &$message)
    {
        $c = new Controller();
        $query = $table->find('all');
        $entities = $table->patchEntities($query->toArray(), $data);
        $alias = strtolower($table->alias());
        if($table->saveMany($entities))
        {
            // Delete any entity marked for deletion.
            foreach($entities as $entity)
            {
                if($entity['delete'] == '1')
                {
                    if (!$table->delete($updatedTag))
                    {
                        $message = __('Successfully update {0}, but had trouble deleting seleted {0}. Please, try again.', $alias);
                        return false;
                    }
                }
            }
            $message = __('The {0} have been updated.', $alias);
            //return true;
            return $athis->redirect(['controller' => 'Recipes', 'action' => 'index']);
        }
        $message = __('The {0} could not be updated. Please, try again.', $alias);
        return false;
    }
}