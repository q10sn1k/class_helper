<?
class Input extends Tag
{
	public function __construct()
	{
		parent::__construct('input');
	}

	public function open()
	{
		$input_name = $this->get_attr('name');
		if($input_name)
		{
			if(isset($_REQUEST[$input_name]))
			{
				$value = $_REQUEST[$input_name];
				$this->set_attr('value', $value);
			}
		}
		return parent::open();
	}

	public function __toString()
	{
		return $this::open();
	}
}
?>