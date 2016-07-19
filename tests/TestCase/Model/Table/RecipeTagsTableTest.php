<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipesTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipesTagsTable Test Case
 */
class RecipesTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipesTagsTable
     */
    public $RecipesTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipes_tags',
        'app.recipes',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RecipesTags') ? [] : ['className' => 'App\Model\Table\RecipesTagsTable'];
        $this->RecipesTags = TableRegistry::get('RecipesTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecipesTags);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
