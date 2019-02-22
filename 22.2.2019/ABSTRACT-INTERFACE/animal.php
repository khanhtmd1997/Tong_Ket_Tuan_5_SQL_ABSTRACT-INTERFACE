<?php
	abstract class Animal{
		public abstract function makeSound();
	}
	interface Edible{
		function howToEat();
	}
	class Chicken extends Animal implements Edible{
		public function makeSound(){
			return "Chicken: Qoaq Qoaq";
		}
		public function howToEat(){
			return "Rỉa";
		}
	}
	class Tiger extends Animal implements Edible{
		public function makeSound(){
			return "Tiger: Gầm Gầm";
		}
		public function howToEat(){
			return "cắn";
		}
	}
	abstract class Fruit implements Edible{
	}
	class Orange extends Fruit{
		public function howToEat(){
			return "Orange:......";
		}
	}
	class Apple extends Fruit{
		public function howToEat(){
			return "Apple:......";
		}
	}
//cấu trúc của php tạo mảng ko new
	$animals =  array();
	$animals[0] = new Tiger();
	$animals[1] = new Chicken();
	foreach ($animals as $animal) {
		// is_a($đối tượng,tên lớp) hàm kiểm tra 2 đối số = với instanceof (hàm kiểm tra cho interface còn is_a thì không)
		if($animal instanceof Chicken){
			echo $animal->makeSound().$animal->howToEat();
		}
		if($animal instanceof Tiger){
			echo $animal->makeSound().$animal->howToEat();
		}
	}
	echo "<br>";
	$fruits = array();
	$fruits[0] = new Orange();
	$fruits[1] = new Apple();
	foreach ($fruits as $fruit) {
		echo $fruit->howToEat()."<br>";
	}
?>