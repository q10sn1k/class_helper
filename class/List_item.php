<?
class List_item extends Tag
{
	public function __construct()
	{
		parent::__construct('li');
	}

	public function __toString()
	{
		return parent::show();
	}
}
?>