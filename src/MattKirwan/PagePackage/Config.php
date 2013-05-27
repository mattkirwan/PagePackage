<?php

namespace MattKirwan\PagePackage;

class Config
{
	public $list_table_columns;

	public function __construct()
	{
		$this->list_table_columns = $this->getListTableColumns();
	}

	private function getListTableColumns()
	{
		return array('id', 'title', 'active');
	}
}