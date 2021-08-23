<?
class Html_list extends Tag
{
	private $items = [];

	public function add_item(List_item $li)
	{
		$this->items[] = $li;
		return $this;
	}

	public function show()
	{
	$result = $this->open();

	foreach ($this->items as $item)
	{
		$result .= $item->show();
	}
		$result .=$this->close();
		return $result;
	}

	public function __toString()
	{
		return $this->show();
	}
}
?>