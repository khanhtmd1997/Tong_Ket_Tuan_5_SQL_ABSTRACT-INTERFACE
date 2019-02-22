<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
        <h2>Tổng giá trị của các phần tử trên đường chéo chính</h2>
        <div>
            Nhập theo mẫu: 00 01 02,10 11 12,20 21 22<br/>            
            <input type='text' name='enterArray' placeholder='a00 a01 a0n,a10 a11 a1n,a20 a21 a2n'/>
            <input type='submit' value='Tính Tổng Đường Chéo'/>
        </div>        
    </form>
    <?php
    	function tongDuongCheo($array){
    		$sum = 0;
    		for($i = 0; $i < count($array); $i++){
    			$sum += $array[$i][$i];
    		}
    		return $sum;
    	}
    	function kiemTraMaTranVuong($array){
    		$arrayLength = count($array);
    		$kiemTra = true;
    		foreach ($array as $index => $element) {
    			if(count($element) != $arrayLength){
    				$kiemTra = false;
    				break;
    			}
    		}
    		return $kiemTra;
    	}
    	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		$enter =  $_POST["enterArray"];
    		$mang = array();
    		$mang1 = "/^\d{1}[0-9 ,]+$/";
            $mang2 = "/^\d{1}[0-9 ]+\d+$/";
            try{
            	if(!preg_match($mang1,$enter)){
            		 throw new Exception('Nhập không hợp lệ');
            	}
            	$tachChuoi = explode(",", $enter);
            	foreach ($tachChuoi as $index => $str) {
            		if(!preg_match($mang2,$str)){
            			throw new Exception('Nhập không hợp lệ');
            		}
            		$array = explode(" ", $str);
            		array_push($mang, $array);
            	}
            	echo "<br>Ma trận số:<br>";
            	foreach ($mang as $row => $array) {
            		foreach ($array as $col => $value) {
            			echo "$value"." ";
            		}
            		echo "<br>";
            	};
            	if(!kiemTraMaTranVuong($mang)){
            		throw new Exception(' không phải là ma trận vuông');
            	}
            	$sum = tongDuongCheo($mang);
            	echo "Tổng các phần tử trên đường chéo chính là $sum";
            }catch (Exception $e){
                echo '<br/>Lỗi '.$e->getMessage();
            }
    	}
    ?>
</body>
</html>