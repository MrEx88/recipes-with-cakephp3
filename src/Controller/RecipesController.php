<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recipes Controller
 *
 * @property \App\Model\Table\RecipesTable $Recipes
 */
class RecipesController extends AppController
{
    public $paginate = [
        'order' => ['Recipes.id' => 'DESC']
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $recipes = $this->Recipes->find('all')
            ->contain(['Tags']);
        $recipes = $this->paginate($recipes);
        $this->set(compact('recipes'));
        $this->set('_serialize', ['recipes']);
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => ['Tags']
        ]);
        
        if($this->request->params['_ext'] === 'pdf')
        {
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'title' => $recipe->name . ' Recipe',
                    'filename' => $recipe->name . ' recipe.pdf'
                ]
            ]);
        }
        else
        {
            //$this->viewBuilder()->layout('the-recipe');
            
        }
        $this->set('recipe', $recipe);
        $this->set('_serialize', ['recipe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('the-recipe');

        $recipe = $this->Recipes->newEntity();
        if ($this->request->is('post')) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
            $recipe->image = $this->_getImageNameAndSave($recipe->image);
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                debug($recipe);
                $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Recipes->Tags->find('list', ['limit' => 200]);        
        $this->set(compact('recipe', 'tags'));
        $this->set('_serialize', ['recipe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('the-recipe');
        
        $recipe = $this->Recipes->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->data);
            $recipe->image = $this->_getImageNameAndSave($recipe->image);
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Recipes->Tags->find('list', ['limit' => 200]);
        $this->set(compact('recipe', 'tags'));
        $this->set('_serialize', ['recipe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipes->get($id);
        if ($this->Recipes->delete($recipe)) {
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Search method
     *
     * @return \Cake\Network\Response|null
     */
    public function search()
    {
        $tags = $this->request->params['pass'];
        
        $recipes = $this->Recipes->find('tags', ['tags' => $tags])
            ->contain(['Tags']);
        
        $recipes = $this->paginate($recipes);
        $this->set(['recipes' => $recipes, 'tags' => $tags]);
    }
    
    /**
     * Gets image name by stripping the url portion of it and also downloads the file.
     * 
     * @param $image The url image to use.
     * @return The image with just the file name.
     */
    private function _getImageNameAndSave($image)
    {
        $filePath = WWW_ROOT . 'img' . DS;
        $fileName = "";
        if(preg_match("/(https?:\/\/)/", $image))
        {
            // decode url
            $image = urldecode($image);
            
            if(preg_match("/(https:\/\/www.google.com\/imgres\?imgurl)/", $image))
            {
                //remove google section
                $specialCharUrl = preg_replace("(https:\/\/www.google.com\/imgres\?imgurl=)", "", $image);
                //remove google imgrefurl section
                $image = preg_replace("(&imgrefurl=[\w\d:\/\.\&\=\-\?\#]*)", "", $specialCharUrl);
            }
	
            // remove url section
             $name = preg_replace("(https?:\/\/[\w\:\.\%\/\?\#\=\-\_\d]*\/)", "", $image);
             // remove special chars
            $fileName = preg_replace("([\+\?\:\<\>\|\s])", "-", $name);
            // save file
            file_put_contents($filePath . $fileName, file_get_contents($image));
        }
        else if(preg_match("/[\w\d\-\_]*(\.jpg|\.png)/", $image))
        {
            // it is a image name already
            $fileName = $image;
        }
        
        return $fileName;
    }
}
