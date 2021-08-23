<?
class Database_shell
{
	private $link;

	public function __construct($host, $user, $password, $database)
	{
		$this->link = mysqli_connect($host, $user, $password, $database);
		mysqli_query($this->link, "SET NAMES 'utf8'") or die("Не соединился");
	}

	// сохраняет запись в базу
	public function save($table, $data)
	{
		$query_string = "INSERT INTO $table SET";
		foreach ($data as $name => $value)
		{
			$query_string.= " $name = '$value',";
		}
		mysqli_query($this->link, rtrim($query_string, ',')) or exit("Не удалось сохранение");
	}

	// удаляет запись по ее id
	public function del($table, $id)
	{
		$query_string = "DELETE FROM $table WHERE id = '$id'";
		mysqli_query($this->link, $query_string) or exit("Не удалилось");
	}

	// удаляет записи по их id
	public function del_all($table, $ids)
	{
		if(is_array($ids) && !empty($ids))
		{
			foreach ($ids as $id)
			{
				$this->del($table, $id);
			}
		}
	}

	// получает одну запись по ее id
	public function get($table, $id)
	{
		$query_string = "SELECT * FROM $table WHERE id = '$id'";
		$result = mysqli_query($this->link, $query_string);

		return mysqli_fetch_array($result);
	}

	// получает массив записей по их id
	public function get_all($table, $ids)
	{
		$result = [];
		if(is_array($ids) && !empty($ids))
		{
			foreach ($ids as $id)
			{
				$result[] = $this->get($table, $id);
			}
		}
		return $result;
	}

	// получает массив записей по условию
	public function select_all($table, $condition)
	{
		$result = [];
		$query_string = "SELECT * FROM $table $condition";
		$data = mysqli_query($this->link, $query_string);
		while ($result[] = mysqli_fetch_array($data))
		{
			array_pop($result);//
		}
		//
		return $result;

	}
}
?>