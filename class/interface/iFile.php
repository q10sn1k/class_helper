<?
interface iFile
	{
		public function __construct($filePath);

		public function get_path(); // путь к файлу
		public function get_dir();  // папка файла
		public function get_name(); // имя файла
		public function get_ext();  // расширение файла
		public function get_size(); // размер файла

		public function get_text();          // получает текст файла
		public function set_text($text);     // устанавливает текст файла
		public function append_text($text);  // добавляет текст в конец файла

		public function copy($copyPath);    //копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}
?>