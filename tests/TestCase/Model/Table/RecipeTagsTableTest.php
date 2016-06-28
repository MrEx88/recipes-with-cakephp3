<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecipeTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecipeTagsTable Test Case
 */
class RecipeTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecipeTagsTable
     */
    public $RecipeTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recipe_tags',
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
        $config = TableRegistry::exists('RecipeTags') ? [] : ['className' => 'App\Model\Table\RecipeTagsTable'];
        $this->RecipeTags = TableRegistry::get('RecipeTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RecipeTags);

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
