<?
class Option extends Tag
{
	public function __construct()
	{
		parent::__construct('option');
	}

	public function set_selected()
	{
		$this->set_attr('selected');
		return $this;
	}

	public function __toString()
	{
	return parent::show();
	}
}
?>