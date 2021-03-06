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
     * Edit method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, edit or delete, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $bookmark = $this->Bookmarks->newEntity();
        $bookmarks = $this->Bookmarks->find('all');
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Are we adding a bookmark?
            if ($this->request->data['add'] == '1')
            {
                $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
                if ($this->Bookmarks->save($bookmark)) {
                    $this->Flash->success(__('The bookmark has been saved.'));
                    return $this->redirect(['controller' => 'Bookmarks', 'action' => 'edit']);
                } else {
                    $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
                }
            }
            // No, we are updating bookmarks.
            else
            {
                $this->loadComponent('Table');
                $message = '';
                if($this->Table->updateTable($this->Bookmarks, $this->request->data['bookmark'], $message))
                {
                    $this->Flash->success($message);
                    return $this->redirect(['controller' => 'Recipes', 'action' => 'index']);
                }
                else
                {   $this->Flash->error($message);
                    return $this->redirect(['controller' => 'Bookmarks', 'action' => 'edit']);
                }
            }
        }
        $bookmarks = $this->paginate($bookmarks);
        $this->set(compact('bookmark', 'bookmarks'));
        $this->set('_serialize', ['bookmark', 'bookmarks']);
    }
}
