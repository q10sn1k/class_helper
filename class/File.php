<?
require_once 'interface/iFile.php';

class File implements iFile
{
	private $path;

	public function __construct($file_path)
	{
		$this->path = $file_path;
	}

	public function get_path() // путь к файлу
	{
		return $this->path;
	}
	public function get_dir() // папка файла
	{
		return dirname($this->get_path());
	}
	public function get_name() // имя файла
	{
		return basename($this->path);
	}
	public function get_ext()  // расширение файла
	{
		return pathinfo($this->path,PATHINFO_EXTENSION);
	}
	public function get_size() // размер файла
	{
		return filesize($this->path);
	}

	public function get_text()       // получает текст файла
	{
		if (file_exists($this->path))
		{
			return file_get_contents($this->path);
		}
		else
		{
			return false;
		}

	}
	public function set_text($text)    // устанавливает текст файла
	{
		if (!empty($text))
		{
			file_put_contents($this->path,$text);
		}
	}
	public function append_text($text)  // добавляет текст в конец файла
	{
		if (!empty($text))
		{
			file_put_contents($this->path,$text,FILE_APPEND);
		}
	}
	public function copy($copy_path)    //копирует файл
	{
		copy($this->path, $copy_path);
	}
	public function delete()           // удаляет файл
	{
		unlink($this->path);
	}
	public function rename($new_name)   // переименовывает файл
	{
		if(!empty($new_name))
		{
			$dir = $this->get_dir();
			rename($this->path,$dir.'/'.$new_name);
		}
	}
	public function replace($newPath)  // перемещает файл
	{
		//
	}
}
?>