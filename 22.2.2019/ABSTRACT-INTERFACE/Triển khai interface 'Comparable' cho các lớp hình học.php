<?php
	class Circle{
	    private $radius;
	    private $name;
	    public function Circle($name, $radius){
	        $this->radius = $radius;
	        $this->name = $name;
	    }

	    public function getName() {
	        return $this->name;
	    }

	    public function setName($name) {
	        $this->name = $name;
	    }

	    public function getRadius() {
	        return $this->radius;
	    }

	    public function setRadius($radius)
	    {
	        $this->radius = $radius;
	    }
	}
	interface Comparable{
		public function compareTo($objOne,$objTwo);
	}
	class ComparableCircle extends Circle implements Comparable{
		public function ComparableCircle($name, $radius){
			parent:: Circle($name, $radius);
		}
		public function compareTo($objOne,$objTwo){
			$circleOneRadius = $circleOne->getRadius();
			$circleTwoRadius = $circleTwo->getRadius();
			if($circleOneRadius > $circleTwoRadius){
				return $circleOneRadius." Lớn hơn ". $circleTwoRadius;
			}else if($circleOneRadius < $circleTwoRadius){
				return $circleOneRadius." bé hơn ". $circleTwoRadius;
			}else return "bằng";
		}
	}
	
	$circles = array();
	$circles[0] = new ComparableCircle("circleOne",7);
	$circles[1] = new ComparableCircle("circleTwo",4);
	$circles[2] = new ComparableCircle("circleThree",6);
	echo"<h1><b>Trước khi kiểm thử hàm sort(), hàm sắp xếp</b></h1>";
	echo "<br>";
	foreach ($circles as $circle) {
		echo "<br>";
		echo "Name: ".$circle->getName(). " ,radius: "	.$circle->getRadius()."<br>";
	}
	sort($circles);
	echo"<h1><b>Sau khi kiểm thử hàm sort(), hàm sắp xếp</b></h1>";
	echo "<br>";
	foreach ($circles as $circle) {
		echo "<br>";
		echo "Name: ".$circle->getName(). " ,radius: "	.$circle->getRadius()."<br>";
	}
?>