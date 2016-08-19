<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 */
class TagsController extends AppController
{
    /**
     * Edit method. Editing all tags at once.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        // TODO:: find out if we can place a custom flash message somewhere else.
        //$this->Flash->warning(__('Changing the name of tags will affect recipes that are using that tag.'));
        $tag = $this->Tags->newEntity();
        $tags = $this->Tags->find('all');
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Are we adding a tag?
            if ($this->request->data['add'] == '1')
            {
                $tag = $this->Tags->patchEntity($tag, $this->request->data);
                if ($this->Tags->save($tag))
                {
                    $this->Flash->success(__('The tag has been saved.'));
                    return $this->redirect(['controller' => 'Tags', 'action' => 'edit']);
                } else {
                    $this->Flash->error(__('The tag could not be saved, Please, try again.'));
                }
            }
            // No, we are updating tags.
            else
            {
                $this->loadComponent('Table');
                $message = '';
                if($this->Table->updateTable($this->Tags, $this->request->data['tag'], $message))
                {
                    $this->Flash->success($message);
                    return $this->redirect(['controller' => 'Recipes', 'action' => 'index']);
                }
                else
                {   $this->Flash->error($message);
                    return $this->redirect(['controller' => 'Tags', 'action' => 'edit']);
                }
            }
        }
        $this->set(compact('tag', 'tags'));
        $this->set('_serialize', ['tag', 'tags']);
    }
}
