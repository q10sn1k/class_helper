<?
require_once 'interface/iTag.php';

class Tag implements iTag
{
	private $name;
	private $attrs = [];
	private $text = '';

	public function __construct($name)
	{
		$this->name = $name;
	}

	// сеттер атрибутa ('id', 'value')
	public function set_attr($name, $value = true)// значение valie = true для реализации классов Checkbox, Radio.
	{
		if (!empty($name) and !empty($value))
		{
			$this->attrs[$name] = $value;
		}
		return $this;
	}

	// сеттер атрибутов множественный
	public function set_attrs($attrs)
	{
		if (is_array($attrs))
		{
			foreach ($attrs as $name => $value)
			{
				$this->set_attr($name, $value);
			}
		}
		return $this;
	}

	// удалить установленный атрибут
	public function remove_attr($name)
	{
		if (array_key_exists($name, $this->attrs))
		{
			unset($this->attrs[$name]);
		}
		return $this;
	}

	public function open()
	{
		$name = $this->name;
		$attrs_str = $this->get_attrs_str($this->attrs); // формируем строку с атрибутами
		return "<$name$attrs_str>";
	}

	public function close()
	{
		$name = $this->name;
		return "</$name>";
	}

	//добавить CSS класс
	public function add_class($class_name)
	{
		if (isset($this->attrs['class']))
		{
			$class_names = explode(' ', $this->attrs['class']);

			if (!in_array($class_name, $class_names))
			{
				$class_names[] = $class_name;
				$this->attrs['class'] = implode(' ', $class_names);
		 	}
		}
		else
		{
			$this->attrs['class'] = $class_name;
		}
	return $this;
	}

	//удалить CSS класс
	public function remove_class($class_name)
	{
		if (isset($this->attrs['class']))
		{
			$class_names = explode(' ', $this->attrs['class']);

			if (in_array($class_name, $class_names))
			{
				$class_names = $this->remove_elem($class_name, $class_names);
		 		$this->attrs['class'] = implode(' ', $class_names);
		 	}
		}

		return $this;
	}

	//возвращает название тега
	public function get_name()
	{
		return $this->name;
	}

	public function set_text($text)
	{
		$this->text = $text;
		return $this;
	}

	public function show()
	{
		return $this->open() . $this->text . $this->close();
	}

	public function get_text()
	{
		return $this->text;
	}

	public function get_attrs()
	{
		return $this->attrs;
	}

	public function get_attr($name)
	{
		if (isset($this->attrs[$name]))
		{
			return $this->attrs[$name];
		}
		else
		{
			return null;
		}
	}


//____________________________________________________________________________
	private function get_attrs_str($attrs)
	{
		if (!empty($attrs))
		{
			$result = '';

			foreach ($attrs as $name => $value)
			{
				if ($value === true)
				{
					$result .= " $name";//атрибут без значения
				}
				else
				{
					$result .= " $name=\"$value\"";//атрибут со значением
				}
			}
			return $result;
		}

		else
		{
			return '';
		}
	}

	private function remove_elem($elem, $arr)
	{
		$key = array_search($elem, $arr); // находим ключ элемента по его тексту
		array_splice($arr, $key, 1); // удаляем элемент

		return $arr; // возвращаем измененный массив
	}
}
?>