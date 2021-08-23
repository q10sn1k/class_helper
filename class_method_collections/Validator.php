<?
class Validator
{
	// проверяет строку на то, что она корректный email
	public function is_email($str)
	{
		return filter_var($str, FILTER_VALIDATE_EMAIL);
	}

	// проверяет строку на то, что она корректное имя домена
	public function is_domain($str)
	{
		return filter_var($str, FILTER_VALIDATE_DOMAIN);
	}

	// проверяет число на то, что оно входит в диапазон
	public function in_range($num, $from, $to)
	{
		return ($num >= $from && $num <= $to);
	}

	// проверяет строку на то, что ее длина входит в диапазон
	public function in_length($str, $from, $to)
	{
		$length = mb_strlen($str);
		return $this->in_range($length, $from, $to);
	}
}
?>