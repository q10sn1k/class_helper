<?php
	class Interval
{
	private $time;

	public function __construct(Date $date1, Date $date2)
	{
		$this->time = abs(strtotime($date1->format('Y-m-d'))-strtotime($date2->format('Y-m-d')));
	}

	public function to_days()
	{
		// вернет разницу в днях
		return floor($this->time / (60*60*24));
	}

	public function to_months()
	{
		// вернет разницу в месяцах
		return floor($this->time / (60*60*24*30));
	}

	public function to_years()
	{
		// вернет разницу в годах
		return floor($this->time / (60*60*24*30*12));
	}

	public function __toString()
	{
		// выведет результат в виде массива
		return "['years' => ".(string)$this->to_years().", 'months' => ".(string)$this->to_months().", 'days' => ".(string)$this->to_days()."]";
		//return "['years' => '', 'months' => '', 'days' => '']";
	 }
}
?>