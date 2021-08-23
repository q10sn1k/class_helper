<?
class Form_helper extends Tag_helper
	{
		public function open_form($attrs = [])
		{
			return $this->open('form', $attrs);
		}

		public function close_form()
		{
			return $this->close('form');
		}

		public function input($attrs = [])
		{
			if (isset($attrs['name']))
			{
				$name = $attrs['name'];

				if (isset($_REQUEST[$name]))
				{
					$attrs['value'] = $_REQUEST[$name];
				}
			}

			return $this->open('input', $attrs);
		}

		public function password($attrs = [])
		{
			$attrs['type'] = 'password';
			return $this->input($attrs);
		}

		public function hidden($attrs = [])
		{
			$attrs['type'] = 'hidden';
			return $this->open('input', $attrs);
		}

		public function submit($attrs = [])
		{
			$attrs['type'] = 'submit';
			return $this->open('input', $attrs);
		}

		public function checkbox($attrs = [])
		{
			$attrs['type'] = 'checkbox';
			$attrs['value'] = 1;

			if (isset($attrs['name']))
			{
				$name = $attrs['name'];

				if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1)
				{
		 			$attrs['checked'] = true;
				}

				$hidden = $this->hidden(['name' => $name, 'value' => '0']);
		 	}
		 	else
		 	{
				$hidden = '';
			}

			return $hidden . $this->open('input', $attrs);
		 }

		public function textarea($attributes = [], $text = '')
		{
			if(isset($attributes['name']))
			{
				$name = $attributes['name'];
				if(isset($_REQUEST[$name]))
				{
					$text = $_REQUEST[$name];
				}
			}
			return $this->open('textarea', $attributes).$text.$this->close('textarea');
		}

		public function select($attr_select, $attr_options)
		{
			$total_result = $this->open('select', $attr_select);
			$value = '';
				if(isset($attr_select['name']))
				{
					$name = $attr_select['name'];
						if(isset($_REQUEST[$name]))
						{
							$value = $_REQUEST[$name];
						}
				}

				foreach ($attr_options as $attr_options)
				{
					if(!empty($value))
					{
						if($value == $attr_options['attrs']['value'])
						{
							$attr_options['attrs']['selected'] = true;
						}
						else
						{
						unset($attr_options['attrs']['selected']);
						}
					}
				$total_result .= $this->open('option', $attr_options['attrs']);
				$total_result .= $attr_options['text'];
				$total_result .= $this->close('option');
				}
			$total_result .= $this->close('select');

			return $total_result;
		}

	}
?>