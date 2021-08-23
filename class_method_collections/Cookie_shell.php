<?
class Cookie_shell
{
	public function set($name, $value, $time)
	{
		setcookie($name, $value, $time);
		$_COOKIE[$name] = $value;
	}

	public function get($name)
	{
		if(isset($_COOKIE[$name]))
		{
			return $_COOKIE[$name];
		}
		return null;
	}

	public function del($name)
	{
		if(isset($_COOKIE[$name]))
		{
			setcookie($name, '', time() - 60 * 60);
			unset($_COOKIE[$name]);
		}
	}

	public function exist($name)
	{
		return array_key_exists($name, $_COOKIE);
	}
}
?>