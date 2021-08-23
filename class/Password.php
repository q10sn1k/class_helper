<?
class Password extends Tag
{
	public function __construct()
	{
	$this->set_attr('type', 'password');
	parent::__construct('input');
	}

	public function __toString()
	{
	return parent::open();
	}
}
?>