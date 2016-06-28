<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecipeTags Controller
 *
 * @property \App\Model\Table\RecipeTagsTable $RecipeTags
 */
class RecipeTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recipes', 'Tags']
        ];
        $recipeTags = $this->paginate($this->RecipeTags);

        $this->set(compact('recipeTags'));
        $this->set('_serialize', ['recipeTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Recipe Tag id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipeTag = $this->RecipeTags->get($id, [
            'contain' => ['Recipes', 'Tags']
        ]);

        $this->set('recipeTag', $recipeTag);
        $this->set('_serialize', ['recipeTag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipeTag = $this->RecipeTags->newEntity();
        if ($this->request->is('post')) {
            $recipeTag = $this->RecipeTags->patchEntity($recipeTag, $this->request->data);
            if ($this->RecipeTags->save($recipeTag)) {
                $this->Flash->success(__('The recipe tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipe tag could not be saved. Please, try again.'));
            }
        }
        $recipes = $this->RecipeTags->Recipes->find('list', ['limit' => 200]);
        $tags = $this->RecipeTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('recipeTag', 'recipes', 'tags'));
        $this->set('_serialize', ['recipeTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe Tag id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipeTag = $this->RecipeTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipeTag = $this->RecipeTags->patchEntity($recipeTag, $this->request->data);
            if ($this->RecipeTags->save($recipeTag)) {
                $this->Flash->success(__('The recipe tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipe tag could not be saved. Please, try again.'));
            }
        }
        $recipes = $this->RecipeTags->Recipes->find('list', ['limit' => 200]);
        $tags = $this->RecipeTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('recipeTag', 'recipes', 'tags'));
        $this->set('_serialize', ['recipeTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipeTag = $this->RecipeTags->get($id);
        if ($this->RecipeTags->delete($recipeTag)) {
            $this->Flash->success(__('The recipe tag has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe tag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
