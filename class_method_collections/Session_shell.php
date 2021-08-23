<?
class Session_shell
{
	public function __construct($name, $value)
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION[$name] = $value;
	}

	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public function get($name)
	{
		return $_SESSION[$name];
	}

	public function del($name)
	{
		unset($_SESSION[$name]);
	}

	public function exists($name)
	{
		return array_key_exists($name, $_SESSION[$name]);
	}

	public function destroy()
	{
		$_SESSION[] = '';
		setcookie(session_name(), '', time() - 3600);
		session_destroy();
	}
}
?>