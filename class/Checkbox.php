<?
class Checkbox extends Tag
{
	public function __construct()
	{
		$this->set_attr('type', 'checkbox');
		$this->set_attr('value', '1');
		parent::__construct('input');
	}

	public function open()
	{
		$name = $this->get_attr('name');
		if($name)
		{
			$hidden = (new Hidden())->set_attr('name', $name)->set_attr('value', '0');

				if (isset($_REQUEST[$name]))
				{
					$value = $_REQUEST[$name];

					if ($value == 1)
					{
						$this->set_attr('checked');
					}
					else
					{
						$this->remove_attr('checked');
					}
				}
			return $hidden->open().parent::open();
		}
		else
		{
			return parent::open();
		}
	}
	public function __toString()
	{
		return $this::open();
	}
}
?>