<?php
namespace App\View\Helper;

use Bootstrap\View\Helper\BootstrapFormHelper;
use Bootstrap\View\Helper\BootstrapHtmlHelper;
use Cake\I18n\Time;

class BootstrapFormExHelper extends BootstrapFormHelper
{
    public $helpers = ['Html', 'Url'];
	
	/**
	* Post Link method.
	*
	* @return string Requested link.
	*/
    public function postLink($title, $url = null, array $options = [])
	{
		return parent::postLink($title, $url, $options);
	}
    
    /**
	* Creates a post link with an icon.
	* @param string title - title to display in drop down header
	* @param string url - url of header link
	* @param string icon - the icon to display
	* @param array linkOptions - array of options
	*/
	public function iconPostLink($title, $url, $icon, $options = array()) 
	{
		$options['escape'] = false;
		$icon = $this->Html->icon($icon);
		$title = $icon . ' ' . $title;
		$link = $this->postLink(
			$title,
			$url,
			$options
		);
		return $link;
	}
}