<?
interface iTag
{
	// Геттер имени:
	public function get_name();

	// Геттер текста:
	public function get_text();

	// Геттер всех атрибутов:
	public function get_attrs();

	// Геттер одного атрибута по имени:
	public function get_attr($name);

	// Открывающий тег, текст и закрывающий тег:
	public function show();

	// Открывающий тег:
	public function open();

	// Закрывающий тег:
	public function close();

	// Установка текста:
	public function set_text($text);

	// Установка атрибута:
	public function set_attr($name, $value);

	// Установка атрибутов:
	public function set_attrs($attrs);

	// Удаление атрибута:
	public function remove_attr($name);

	// Установка класса:
	public function add_class($class_name);

	// Удаление класса:
	public function remove_class($class_name);
}
?>