<?php

namespace MattKirwan\PagePackage;

use MattKirwan\PagePackage\PageModel;
use MattKirwan\Module\Module;
use MattKirwan\Module\ModuleInterface;
use MattKirwan\Module\ModuleCrud;

class Page extends Module implements ModuleInterface
{
	public function __construct(ModuleCrud $model)
	{
		parent::__construct($model);
		$this->setSelectFields('*');
		$this->setTables('module_pages');
		$this->setSortOrder();
	}
}