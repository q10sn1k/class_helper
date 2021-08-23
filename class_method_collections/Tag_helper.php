<?
class Tag_helper
{
	public function open($name, $attributes = [])
	{
		$attributes_string = $this->get_attributes($attributes);
		return "<{$name}{$attributes_string}>";
	}

	public function close($name)
	{
		return "</{$name}>";
	}

	public function show($name, $text)
	{
		return $this->open($name).$text.$this->close($name);
	}

	private function get_attributes($attributes)
	{
		if(!empty($attributes))
		{
			$result_str = '';
			foreach ($attributes as $name => $value)
			{
				if($value === true)
				{
					$result_str .= " $name";
				}
				else
				{
					$result_str .= " $name=\"$value\"";
				}
			}
			return $result_str;
		}
	}
}
?>