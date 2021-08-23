<?
class Radio extends Tag
{
	public function __construct($checked = false)
	{
		if($checked)
		{
			$this->set_attr('checked');
		}

		$this->set_attr('type', 'radio');
		parent::__construct('input');
	}

	public function open()
	{
		//Находим значение аттрибута name
		$name = $this->get_attr('name');
		//Если оно есть
		if($name)
		{
			//Проверяем отправлялась ли форма
			if(isset($_REQUEST[$name]))
			{
				//Берем значение из отправленной формы
				$valueForm = $_REQUEST[$name];
				//Берем значение при установка
				$valueDefault = $this->get_attr('value');

				//Если эти значения совпали, то это выбранная кнопка
				if($valueForm == $valueDefault)
				{
					//Устанавливаем ей атрибут
					$this->set_attr('checked');
					//Если это не выбранная кнопка, а атрибут у нее все таки есть, то надо убрать.
				}
				elseif($this->get_attr('checked'))
				{
					$this->remove_attr('checked');
				}
			}
		}

		return parent::open();
	}

	public function __toString()
	{
		return $this->open();
	}
}
?>