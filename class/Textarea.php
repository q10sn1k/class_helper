<?
class Textarea extends Tag
{
	public function __construct()
	{
		parent::__construct('textarea');
	}
	public function open(){
	//Получаем имя поля
	$name = $this->get_attr('name');
	//Если имя есть
		if ($name)
		{
		//Проверяем отправлена ли форма
			if(isset($_REQUEST[$name]))
			{
				//Записываем текст в свойство.
				$text = $_REQUEST[$name];
				$this->set_text($text);
			}
		}
	return parent::open();
	}

	public function __toString()
	{
	return parent::show();
	}
}
?>