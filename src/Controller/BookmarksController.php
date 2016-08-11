<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));
                return $this->redirect(['controller' => 'Recipes', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('bookmark'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Edit method
     *
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $bookmarks = $this->Bookmarks->find('all');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmarksData = [];
            foreach($this->request->data as $key => $value)
            {
                $bookmarksData[] = ['id' => $key, 'name' => $value];
            }
            $updatedBookmarks = $this->Bookmarks->patchEntities($bookmarks->toArray(), $bookmarksData);
            foreach($updatedBookmarks as $updatedBookmark)
            {
                if(!$updatedBookmarks->save($updatedBookmark))
                {
                    $this->Flash->error(__('The bookmarks could not be updated. Please try again.'));
                }
            }
            $this->Flash->success(__('The bookmarks have been updated.'));
            return $this->redirect(['controller' => 'Recipes', 'action' => 'index']);
        }
        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Recipes', 'action' => 'index']);
    }
}
