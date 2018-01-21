<?php

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\BootstrapHtmlExHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

class BootstrapHtmlExHelperTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $View = new View();
        $this->HtmlHelper = new BootstrapHtmlExHelper($View);
    }
    
    public function testIconLink()
    {
        $name = 'remove';
        $result = $this->HtmlHelper->iconLink('', ['controller' => 'Recipes', 'action' => 'delete', '1'], $name, ['isFa' => true]);
        $this->assertContains(__('<i class="fa fa-{0}"></i>', $name), $result);
    }
}