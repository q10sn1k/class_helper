<?
class Image extends Tag
{
	public function __construct()
	{
		$this
			->set_attr('src', '')
			->set_attr('alt', '');
		parent::__construct('img');
	}

	public function __toString()
	{
		return parent::open(); // вызываем метод родителя
	}
}
?>