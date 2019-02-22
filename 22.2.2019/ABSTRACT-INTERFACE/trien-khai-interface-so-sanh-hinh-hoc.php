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
		public function compareTo($objTwo);
	}
	class ComparableCircle extends Circle implements Comparable{
		public function ComparableCircle($name, $radius){
			parent:: Circle($name, $radius);
		}
		public function compareTo($circleTwo){
			$circleTwoRadius = $circleTwo->getRadius();
			if($this->getRadius() > $circleTwoRadius){
				return 1;
			}else if($this->getRadius() < $circleTwoRadius){
				return -1;
			}else return 0;
		}
	}
	$circleOne = new ComparableCircle("circleOne",7);
	$circleTwo = new ComparableCircle("circleTwo",4);
	$circleThree = new ComparableCircle("circleThree",6);
	$test = $circleOne->compareTo($circleTwo);
	echo "So sánh bán kính hình 1 so với hình 2 = ".$test;
	echo "<br>";
	$test = $circleOne->compareTo($circleThree);
	echo "So sánh bán kính hình 1 so với hình 3 = ".$test;
	echo "<br>";
	$test = $circleTwo->compareTo($circleOne);
	echo "So sánh bán kính hình 2 so với hình 1 = ".$test;
	echo "<br>";
	$test = $circleTwo->compareTo($circleThree);
	echo "So sánh bán kính hình 2 so với hình 3 = ".$test;
	echo "<br>";
	$test = $circleThree->compareTo($circleOne);
	echo "So sánh bán kính hình 3 so với hình 1 = ".$test;
	echo "<br>";
	$test = $circleThree->compareTo($circleTwo);
	echo "So sánh bán kính hình 3 so với hình 2 = ".$test;
	echo "<br>";
?>