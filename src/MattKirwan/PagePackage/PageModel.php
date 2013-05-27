<?php

namespace MattKirwan\PagePackage;

use MattKirwan\Module\ModuleCrud;
use MattKirwan\Module\ModuleModelInterface;

class PageModel extends ModuleCrud implements ModuleModelInterface
{
	public function __construct(\Doctrine\DBAL\Connection $conn)
	{
		parent::__construct($conn);
	}

	public function sanitizeInput(Array $dirtyInput)
	{
		$clean['title'] = filter_var($dirtyInput['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);	
		$clean['excerpt'] = filter_var($dirtyInput['excerpt'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$clean['slug'] = filter_var($dirtyInput['slug'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$clean['data'] = filter_var($dirtyInput['data']);

		return $clean;	
	}

	public function prepareFieldForOutput($field, $value)
	{
		switch($field)
		{
			case 'title':
			case 'excerpt':
			case 'data':
			case 'slug':
				$value = stripslashes($value);
			break;
		}

		return $value;
	}
}