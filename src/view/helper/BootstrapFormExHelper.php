<?php
namespace App\View\Helper;

use Bootstrap\View\Helper\BootstrapFormHelper;
use Bootstrap\View\Helper\BootstrapHtmlHelper;
use Cake\I18n\Time;

class BootstrapFormExHelper extends BootstrapFormHelper
{
    public $helpers = ['Html', 'Url'];
	
	/**
	* Checks whether or not the URL action should be authorized against ACL.
	* If the key 'acl' is set to true in the $options array, the action will
	* be authorized against ACL using the current user.
	*
	* @return string Requested link if the 'acl' key is false.  If the 'acl' key
	*				 is true, the requested link is returned if the user is
	*				 authorized, empty string otherwise.
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