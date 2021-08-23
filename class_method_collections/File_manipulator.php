<?
class File_manipulator
{
	//создает файл
	public function create($file_path)
	{
		if(!file_exists($file_path))
		{
			file_put_contents($file_path, '');
		}
	}

	//удаляет файл
	public function delete($file_path)
	{
		if(file_exists($file_path))
		{
			unlink($file_path);
		}
	}

	//копирует файл
	public function copy($file_path,$copy_path)
	{
		copy($file_path, $copy_path);
	}


	// переименовывает файл ,вторым параметром принимает новое имя файла (только имя, не путь)
	public function rename($file_path,$new_name)
	{
		$dirname = dirname($file_path);
		$clean_new_name = basename($new_name);
		$name = $dirname.'/'.$clean_new_name;
		rename($file_path, $name);
	}

	//// перемещает файл
	public function replace($file_path, $new_path)
	{
		rename($file_path, $new_path);
	}

	//// узнает размер файла
	public function weight($file_path)
	{
		if(is_file($file_path))
		{
			return filesize($file_path);
		}
	}
}
?>