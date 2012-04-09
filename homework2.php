<?php
// Singleton
// http://www.youtube.com/watch?v=M-XiQMA9mtk
class Inventory
{
	private static $single;
	private function __construct() {}
	public static function getInstance()
	{
		if(self::$single==null)
		{
			self::$single = new Inventory();
		}
		return Inventory::$single;
	}
}

// Factory Method
// http://www.youtube.com/watch?v=tfpZqhaM5kU
class AnimalsFactory
{
	public static function getAnimal($str)
	{
		if($str=='cat')
		{
			return new Cat();
		}
		else if($str=='tiger')
		{
			$ob = new Cat();
			$ob->setCatType('tiger');
			return $ob;
		}
		else if($str=='dog')
		{
			return new Dog();
		}
		throw new Exception('animal type does not exist');
	}
}

class Cat
{
	private $catType;
	function __toString()
	{
		return 'cat ' . $this->catType;
	}
	function setCatType($str)
	{
		$this->catType = $str;
	}
}

class Dog
{
	function __toString()
	{
		return 'dog';
	}
}

// Proxy
// http://www.youtube.com/watch?v=JBWYU2l413A
interface IVideo
{
	function play();
}

class Video implements IVideo
{
	private $title;
	public function __construct($title)
	{
		$this->title = $title;
	}
	public function play()
	{
		echo 'playing '.$this->title.'video';
	}
}

class VideoProxy implements IVideo
{
	private $video;
	private $title;
	public function __construct($str)
	{
		$this->title = $str;
	}
	public function play()
	{
		if($this->video==null) $this->video = new Video($this->title);
		$this->video->play();
	}
}

// Adapter
// http://www.youtube.com/watch?v=lhEz12dWwUk
interface IProduct
{
	function setName($str);
	function setId($number);
}

interface IOtherProduct
{
	function setTheName($str);
	function setTheId($number);
}

class Book implements IOtherProduct
{
	private $price;
	private $id;
	private $name;
	public function setTheName($temp)
	{
		if($temp!=null && $temp!='')
		{
			$this->name = $temp;
		}
	}
	public function setTheId($number)
	{
		if($number>0)
		{
			$this->id = $number;
		}
	}
	public function __toString()
	{
		return 'name='.$this->name.' id='.$this->id;
	}
}

class BookAdapter extends Book implements IProduct
{
	public function setName($str)
	{
		$this->setTheName($str);
	}
	public function setId($number)
	{
		$this->setTheId($number);
	}
}
?>