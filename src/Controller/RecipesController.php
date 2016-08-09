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
            $recipe->image = $this->_getImageNameAndSave($recipe);
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
     * Search method
     *
     * @return \Cake\Network\Response|null
     */
    public function search()
    {
        if(isset($this->request->query['q']) && $this->request->query['q'] != '')
        {
            $words = $this->_toArray($this->request->query['q']);
            $recipes = $this->Recipes->find('search', ['words' => $words]);
        }
        elseif(count($this->request->params['pass']) > 0)
        {
            $tags = $this->request->params['pass'];
        
            $recipes = $this->Recipes->find('tags', ['tags' => $tags])
            ->contain(['Tags']);
        }
        else
        {
            return $this->redirect(['action' => 'index']);
        }
        
        $recipes = $this->paginate($recipes);
        $this->set(['recipes' => $recipes, 'tags' => $tags]);
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
        
        if(preg_match("/(https?:\/\/)/", $image))
        {
            // Decode url.
            $image = urldecode($image);
            
            // If image is from google.
            if(preg_match("/(https:\/\/www.google.com\/imgres\?imgurl)/", $image))
            {
                // TODO: Maybe combine these two statements below.
                // Remove google section.
                $specialCharUrl = preg_replace("(https:\/\/www.google.com\/imgres\?imgurl=)", "", $image);
                // Remove google imgrefurl section.
                $image = preg_replace("(&imgrefurl=[\w\d:\/\.\&\=\-\?\#]*)", "", $specialCharUrl);
            }

            // TODO: Add regex for other search engines. Bing doesn't seem possible

            // Save file.
            file_put_contents($filePath . $fileName, file_get_contents($image));
        }
        else if(preg_match("/[\w\d\-\_]*(\.jpg|\.png)/", $image))
        {
            // It is a image name already.
            $fileName = $image;

            // Is image being renamed?
            if($recipe->getOriginal('image') != '' && file_exists($filePath . $recipe->getOriginal('image')))
            {
                rename($filePath . $recipe->getOriginal('image'), $filePath .  $fileName);
            }
        }
        
        return $fileName;
    }
    
    /**
     * Gets search string and turns into array.
     * 
     * @param $str Request query string.
     * @return Array of what user typed in.
     */
    private function _toArray($str)
    {
        $array = [];
        $temp = "";
        for($i = 0; $i < strlen($str); $i++)
        {
            if($str[$i] == ' ')
            {
                $array[] = $temp;
                $temp = "";
            }
            else
            {
                $temp .= $str[$i];
            }
        }
        $array[] = $temp;
        
        return $array;
    }
}
