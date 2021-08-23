<?
class Submit extends Input
{
	public function __construct()
	{
		parent::__construct('button');
	}

	public function open()
	{
		$this->set_attr('type', 'submit');
		return parent::open();
	}

	public function __toString()
	{
		return parent::show();
	}
}
?>