<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 */
class TagsController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));
                return $this->redirect(['controller' => 'recipes', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The tag could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tag'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Edit method. Editing all tags at once.
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $tags = $this->paginate($this->Tags);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tags = TableRegistry::get('Tags');
            $tagData = [];
            foreach($this->request->data as $key => $value)
            {
                $tagData[] = ['id' => $key, 'name' => $value];
            }
            $updatedTags = $this->Tags->patchEntities($tags->find('all')->toArray(), $tagData);
            foreach($updatedTags as $tag)
            {
                if (!$tags->save($tag)) {
                    $this->Flash->error(__('The tags could not be updated. Please, try again.'));
                    return;
                }
            }
            $this->Flash->success(__('The tags has been updated.'));
            return $this->redirect(['controller' => 'recipes', 'action' => 'index']);
        }
        $this->set(compact('tags'));
        $this->set('_serialize', ['tags']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
