<?// год-месяц-день
class Date
{
	private $year;
	private $month;
	private $day;
	private $lang = "ru";

	//вспомогательный массив дней недели
	const day_of_week = [
	"ru"=> ["Воскресенье",
			"Понедельник",
			"Вторник",
			"Среда",
			"Четверг",
			"Пятница",
			"Суббота"],

	"en"=> ["Sunday",
			"Monday",
			"Tuesday",
			"Wednesday",
			"Thursday",
			"Friday",
			"Saturday"],
	];
	//вспомогательный массив названий месяцев
	const months = [
	"ru"=> [1 =>"Январь",
			"Февраль",
			"Март",
			"Апрель",
			"Май",
			"Июнь",
			"Июль",
			"Август",
			"Сентябрь",
			"Октябрь",
			"Ноябрь",
			"Декабрь"],

	"en"=> [1 =>"Janary",
			"February",
			"March",
			"April",
			"May",
			"Jun",
			"July",
			"August",
			"September",
			"October",
			"November",
			"December"],
	];

	public function __construct($date = null)
	{
		// если дата не передана - пусть берется текущая
		if ($date === null)
		{
			$this->year = (int)date('Y');
			$this->month = (int)date('m');
			$this->day = (int)date('d');
		}
		else
		{
			$arr_date = explode('-',$date);
			$this->year = (int)$arr_date[0];
			$this->month = (int)$arr_date[1];
			$this->day = (int)$arr_date[2];
		}
	}

	public function get_day()
	{
		// возвращает день
		return $this->day;
	}

	public function get_month($lang = null)
	{
		// возвращает месяц
		// переменная $lang может принимать значение ru	или en
		// если эта не пуста - пусть месяц будет словом на заданном языке
		if ($lang === null)
		{
			$lang = $this->lang;
		}
		return self::months[$lang][$this->month];
	 }

	public function get_year()
	{
		// возвращает год
		return $this->year;
	}

	public function get_week_day($lang = null)
	{
		// возвращает день недели
		// переменная $lang может принимать значение ru	или en
		// если эта не пуста - пусть месяц будет словом на заданном языке
		if ($lang === null)
		{
			$lang = $this->lang;
		}
		$day = date('w', mktime(0,0,0, $this->month,$this->day,$this->year));
		return self::months[$lang][$day];
	}

	public function add_day($value)
	{
		// добавляет значение $value к дню
		$this->add_time('day',$value);
		return $this;
	}

	public function sub_day($value)
	{
		// отнимает значение $value от дня
		$this->sub_time('day',$value);
		return $this;
	}

	public function add_month($value)
	{
		// добавляет значение $value к месяцу
		$this->add_time('month',$value);
		return $this;
	}

	public function sub_month($value)
	{
		// отнимает значение $value от месяца
		$this->sub_time('month',$value);
		return $this;
	}

	public function add_year($value)
	{
	// добавляет значение $value к году
		$this->add_time('year',$value);
		return $this;
	}

	public function sub_year($value)
	{
	// отнимает значение $value от года
		$this->sub_time('year',$value);
		return $this;
	}

	public function format($format)
	{
	// выведет дату в указанном формате	 формат пусть будет такой же, как в функции date
	return date($format, mktime(0,0,0, $this->month,$this->day,$this->year));
	}

	public function __toString()
	{
		// выведет дату в формате 'год-месяц-день'
	return date('Y-m-d', mktime(0,0,0, $this->month,$this->day,$this->year));
	}




	private function add_time($type,$value)
	{
		if (is_numeric($value) && $value>0)
		{
			$date = date_create($this->year."-".$this->month."-".$this->day);
			date_modify($date,$value.' '.$type);
			$arr = explode('-',date_format($date,'Y-m-d'));

			$this->year = $arr[0];
			$this->month = $arr[1];
			$this->day = $arr[2];
		}
	}

	private function sub_time($type,$value)
	{
		if (is_numeric($value) && $value>0)
		{
			$date = date_create($this->year."-".$this->month."-".$this->day);
			date_modify($date,'-'.$value.' '.$type);
			$arr = explode('-',date_format($date,'Y-m-d'));

			$this->year = $arr[0];
			$this->month = $arr[1];
			$this->day = $arr[2];
		}
	}
}

/*$dat = new Date();
echo $dat;*/
?>