<?
class Hidden extends Tag
{
	public function __construct()
	{
		$this->set_attr('type', 'hidden');
		parent::__construct('input');
	}

	public function __toString()
	{
		return parent::open();
	}
}
?>