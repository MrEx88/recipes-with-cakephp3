<?php
namespace App\View\Helper;

use Bootstrap\View\Helper\BootstrapHtmlHelper;

class BootstrapHtmlExHelper extends BootstrapHtmlHelper
{
	public $helpers = ['Url'];
    
    /**
	* Creates a button link with an icon.
	*
	* @param string title - title to display in drop down header
	* @param string url - url of header link
	* @param string icon - the icon to display
	* @param array linkOptions - array of options
	*/
	public function iconButtonLink($title, $url, $icon, $options = array()) 
	{
		$defaultOptions = [
			'escape' => false,
			'class' => 'btn btn-default'
		];
		
		$options = array_merge($defaultOptions, $options);
        
        $this->Config(['useFontAwesome' => isset($options['isFa']) ? $options['isFa'] : false]);       
        
        $icon = $this->icon($icon);
		$title = $icon . ' ' . $title;
		$link = $this->link(
			$title,
			$url,
			$options
		);
		return $link;
	}
    
    /**
	* Creates a link with an icon.
	*
	* @param string title - title to display in drop down header
	* @param string url - url of header link
	* @param string icon - the icon to display
	* @param array linkOptions - array of options
	*/
	public function iconLink($title, $url, $icon, $options = array()) 
	{
        $this->Config(['useFontAwesome' => isset($options['isFa']) ? $options['isFa'] : false]); 
        
		$options['escape'] = false;
		$icon = $this->icon($icon);
		$title = $icon . ' ' . $title;
		$link = $this->link(
			$title,
			$url,
			$options
		);
		return $link;
	}
}