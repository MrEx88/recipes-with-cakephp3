<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;

use App\Model\Entity\Recipe;

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
        $h3Title = 'Recipes';
        // Is this a search from the navbar?
        if (isset($this->request->query['q']) && $this->request->query['q'] != '')
        {
            $words = Text::tokenize($this->request->query['q'], ' ');
            $recipes = $this->Recipes->find('search', ['words' => $words]);
        }
        // Or are there parameters passed?
        elseif (count($this->request->params['pass']) > 0)
        {
            $tags = $this->request->params['pass'];
            $recipes = $this->Recipes->find('tags', ['tags' => $tags])
            ->contain(['Tags']);
            $h3Title = Text::toList($tags) . ' ' . strtolower($h3Title);
        }
        
        $recipes = $this->paginate($recipes);
        $this->set(compact('recipes', 'h3Title'));
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
        
        if ($this->request->params['_ext'] === 'pdf')
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
            $recipe->image = $this->_getImageNameAndSave($recipe);
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
            $recipe->image = $this->_getImageNameAndSave($recipe);
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
     * Downloads image from url saves the file using the formatted recipe name.
     * 
     * @param $recipe The recipe entity to use.
     * @return The image with just the file name.
     */
    private function _getImageNameAndSave(Recipe $recipe)
    {
        $image = $recipe->image;
        $filePath = WWW_ROOT . 'img' . DS;
        $fileName = Text::slug(strtolower($recipe->name)) . '.jpg';
        
        if ($image == '')
        {
            $fileName = '';
        }
        else if (preg_match("/(https?:\/\/)/", $image))
        {
            $image = urldecode($image);
            
            // If image is from google.
            if (preg_match("/(https:\/\/www.google.com\/imgres\?imgurl)/", $image))
            {
                // Remove google front section.
                $googleUrl = preg_replace("(https:\/\/www.google.com\/imgres\?imgurl=)", "", $image);
                // Remove google tail section.
                $image = preg_replace("(&imgrefurl=[\w\d\:\/\.\&\=\-\?\#]*)", "", $googleUrl);
            }
            // If image is from yahoo.
            elseif (preg_match("/(https:\/\/images.search.yahoo.com\/images\/view;)/", $image))
            {
                // Remove yahoo front section.
                $yahooUrl = preg_replace("(https:\/\/images.search.yahoo.com\/images\/view;[\_\w\=\d\;\-\?\.\&\:\/\(\)\#\$\+]*&imgurl=)", "", $image);
                //Remove yahoo tail section.
                $image = preg_replace("(&[\_\w\=\d\;\-\?\.\&\:\/\(\)\#\$\s]*)", "", $yahooUrl);
                // Prepend http://.
                $image = 'http://' . $image;
            }
            
            // Final check to make sure we got a good url address.
            if(preg_match("/(https?:\/\/)[\w\=\d\;\-\?\.\&\:\_\/\(\)\#\$\s\%]*.(jpg|png|gif)/", strtolower($image)))
            {
                // Save file. This still does not ensure the image will not be corrupted.
                file_put_contents($filePath . $fileName, file_get_contents($image));
            }
            else
            {
                // Error getting image from url.
                $fileName = '';
            }
        }
        // Is it an image name already? 
        else if (preg_match("/[\w\d\-\_]*(\.jpg|\.png)/", $image))
        {
            $fileName = $image;

            // Is image being renamed?
            if ($recipe->getOriginal('image') != '' && file_exists($filePath . $recipe->getOriginal('image')))
            {
                rename($filePath . $recipe->getOriginal('image'), $filePath .  $fileName);
            }
        }
        
        return $fileName;
    }
}
