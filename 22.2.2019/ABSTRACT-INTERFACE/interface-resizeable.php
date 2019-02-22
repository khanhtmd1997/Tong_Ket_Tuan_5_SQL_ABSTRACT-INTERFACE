<?php
	abstract class Circle{
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
	    public function Area(){
	    	return $this->radius * $this->radius * pi();
	    }
	    public function chuVi(){
	    	return $this->radius*2*pi();
	    }
	}
	interface Comparable{
		public function resize($percent);
	}
	class ComparableCircle extends Circle implements Comparable{
		public function ComparableCircle($name, $radius){
			parent:: Circle($name, $radius);
		}
		public function resize($percentHT){	
			$r = parent::Area();
			return  $r*$percentHT;
		}
	}
	abstract class Rectangle{
		private $name;
		private $width;
		private $height;
		public function Rectangle($name,$width,$height){
			$this->name = $name;
			$this->width = $width;
			$this->height = $height;
		}
		public function getName() {
	        return $this->name;
	    }

	    public function setName($name) {
	        $this->name = $name;
	    }
	    public function getWidth() {
	        return $this->width;
	    }
	    public function setWidth($width) {
	        $this->width = $width;
	    }
	    public function getHeight() {
	        return $this->height;
	    }

	    public function setHeight($height) {
	        $this->height = $height;
	    }
	    public function dienTich(){
	    	return $this->width * $this->height;
	    }
	    public function chuVi(){
	    	return ($this->width + $this->height)*2;
	    }
	}
	class  ComparableRectangle extends Rectangle implements Comparable{
		public function ComparableRectangle($name,$width,$height){
			parent::Rectangle($name,$width,$height);
		}
		public function resize($percentHCN){	
			$hcn = parent::dienTich();
			return  $hcn*$percentHCN;
		}
	}
	abstract class Triangle{
		private $name;
		private $side1;
		private $side2;
		private $side3;
		public function Triangle($name,$side1,$side2,$side3){
			$this->name = $name;
			$this->side1 = $side1;
			$this->side2 = $side2;
			$this->side3 = $side3;
		}
		public function getName() {
	        return $this->name;
	    }

	    public function setName($name) {
	        $this->name = $name;
	    }
	    public function getSide1() {
	        return $this->side1;
	    }

	    public function setSide1($side1) {
	        $this->side1 = $side1;
	    }
	    public function getSide2() {
	        return $this->side2;
	    }

	    public function setSide2($side2) {
	        $this->side2 = $side2;
	    }
	    public function getSide3() {
	        return $this->side3;
	    }

	    public function setSide3($side3) {
	        $this->side3 = $side3;
	    }
	    public function dienTichHTG(){
	    	$p = ($this->side1+$this->side2+$this->side3)/2;
	    	return sqrt($p*($p-$this->side1)*($p-$this->side2)*($p-$this->side3));
	    }
	    public function chuViHTG(){
	    	return ($this->side1+$this->side2+$this->side3);
	    }
	}
	class  ComparableTriangle extends Triangle implements Comparable{
		public function ComparableRectangle($name,$side1,$side2,$side3){
			parent::Triangle($name,$side1,$side2,$side3);
		}
		public function resize($percentHTG){	
			$htg= parent::dienTichHTG();
			return  $htg*$percentHTG;
		}
	}


	$comparableCircle = new ComparableCircle("circle",7);
	echo "bán kính hình tròn = ".$comparableCircle->getRadius();
	echo "<br>";
	echo "Diện tích hình tròn ban đầu = ";
	echo $comparableCircle->Area();
	echo "<br>";
	echo "Chu vi = ".$comparableCircle->chuVi();
	echo "<br>";
	$percentHT = rand(1,100);
	echo "Số ngẫu nhiên = ".$percentHT;
	echo "<br>";
	echo "Diện tích sau khi random = ".$comparableCircle->resize($percentHT);
	echo "<br>";
	echo "<br>";


	$comparableRectangle = new ComparableRectangle("HCN",20,10);
	echo "Chiều dài = ".$comparableRectangle->getHeight()."<br>"."Chiều rộng = ".$comparableRectangle->getWidth()."<br>";
	echo "Diện tích ban đầu của hình chữ nhật = ".$comparableRectangle->dienTich()."<br>";
	echo "Chu vi của hình chữ nhật = ".$comparableRectangle->chuVi()."<br>";
	echo "Số ngẫu nhiên = ".$percentHCN = mt_rand(1,100);
	echo "<br>Diện tích hình chữ nhật sau khi random = ".$comparableRectangle->resize($percentHCN);
	echo "<br>";
	echo "<br>";
	

	$comparableTriangle = new ComparableTriangle("HTG",4,5,6);
	echo "3 cạnh tam giác = ".$comparableTriangle->getSide1().", ".$comparableTriangle->getSide2().", ".$comparableTriangle->getSide3()."<br>";
	echo "Diện tích hình tam giác ban đầu = ".$comparableTriangle->dienTichHTG();
	echo "<br>Chu vi hình tam giác = ".$comparableTriangle->chuViHTG();
	echo "<br>Số ngẫu nhiên = ".$percentHTG = mt_rand(1,100);
	echo "<br>Diện tích hình tam giác sau khi random = ".$comparableTriangle->resize($percentHTG);
?>