<?php

namespace App\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\Utility\Text;

class MiscHelper extends Helper
{
    /**
     * Gets the CakePHP version
     *
     * @return string of CakePHP version.
     */
    public function getCakeVersion()
    {
        return Configure::version();
    }
}