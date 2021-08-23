<?
class Link extends Tag
{
	const active_name = 'active';

	public function __construct()
	{
		parent::__construct('a');
		$this->set_attr('href', ' ');
	}

	public function open()
	{
		$this->activate_self();
		return parent::open();
	}

	public function __toString()
	{
		return parent::show();
	}

	private function activate_self()
	{
		if ($this->get_attr('href') == $_SERVER['REQUEST_URI'])
		{
			$this->add_class(self::active_name);
		}
	}
}
?>