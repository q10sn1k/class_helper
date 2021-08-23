<?
class Select extends Tag
{
	private $options = [];

	public function __construct()
	{
		parent::__construct('select');
	}

	public function add_option(Option $option)
	{
		$this->options[] = $option;
		return $this;
	}

	public function show()
	{
		$result = $this->open();
		//Запоминаем имя select
		$name = $this->get_attr('name');
			foreach ($this->options as $option)
			{
				if($name)
				{
					//Если форма отправлена
					if(isset($_REQUEST[$name]))
					{
						//значение поля формы
						$valueForm = $_REQUEST[$name];
						//значение по умолчанию
						$valueDefault = $option->get_attr('value');
						//Если значения совпадаю - это наша option

						if($valueDefault == $valueForm)
						{
							$option->set_selected();
							//Если selected есть в атрибутах, а он не выбран удаляем
						}
						elseif($option->get_attr('selected'))
						{
							$option->remove_attr('selected');
						}
					}
				}
			$result .= $option->show();
			}

		$result .= $this->close();
		return $result;
	}

	public function __toString()
	{
		return $this->show();
	}
}
?>