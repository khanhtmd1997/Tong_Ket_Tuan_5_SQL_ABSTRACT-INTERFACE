<?php
	class Shape{
	    public $name;
	    public function __construct($name){
	        $this->name = $name;
	    }
	    public function show(){
	        return "I am a shape. My name is $this->name";
	    }
	}

	class Circle extends Shape{
	    public $radius;
	    public function __construct($name, $radius){
	        parent::__construct($name);
	        $this->radius = $radius;
	    }
	    public function calculateArea(){
	        return pi() * pow($this->radius, 2);
	    }
	    public function calculatePerimeter(){
	        return pi() * $this->radius * 2;
	    }
	}

	class Cylinder extends Circle{
	    public $height;
	    public function __construct($name, $radius, $height){
	        parent::__construct($name, $radius);
	        $this->height = $height;
	    }
	    public function calculateArea(){
	        return parent::calculateArea() * 2 + parent::calculatePerimeter() * $this->height;
	    }
	    public function calculateVolume(){
	        return parent::calculateArea() * $this->height;
	    }
	}

	class Rectangle extends Shape{
	    public $width;
	    public $height;
	    public function __construct($name, $width, $height){
	        parent::__construct($name);
	        $this->width = $width;
	        $this->height = $height;
	    }
	    public function calculateArea(){
	        return $this->height * $this->width;
	    }
	    public function calculatePerimeter(){
	        return ($this->height + $this->width) * 2;
	    }
	}
	class Square extends Rectangle implements Colorable{
	    public function __construct($name, $width){
	        parent::__construct($name, $width, $width, $width);
	    }
	    public function howToColor(){
	    	echo "Color all four sides.";
	    }
	}
	interface Colorable{
		public function howToColor();
	}


	$_shape = new Shape("Khánh");
	echo $_shape->show();
	echo "<br>";
	$square = new Square("Square",10);
	echo $square->howToColor();
	echo "<br>";
	$hinhHocs = array();
	$hinhHocs[0] = new Circle("Circle",5);
	$hinhHocs[1] = new Cylinder("Cylinder",5,7);
	$hinhHocs[2] = new Rectangle("Rectangle",20,10);
	$hinhHocs[3] = new Square("Square",10);
	foreach ($hinhHocs as $hinhHoc) {
		echo "Hình học ".$hinhHoc->calculateArea();
	}
?>