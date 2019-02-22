<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <h2>Tổng giá trị của các phần tử trên đường chéo chính</h2>
        <div>
            Nhập theo mẫu: 00 01 02,10 11 12,20 21 22<br/>            
            <input type='text' name='input' placeholder='a00 a01 a0n,a10 a11 a1n,a20 a21 a2n'/>
            <input type='submit' value='Check'/>
        </div>        
    </form>

    <?php
        function sumOfMainDiagonal($array) {
            $sum = 0;

            for ($i=0; $i<count($array) ; $i++) {
                $sum += $array[$i][$i];
            }

            return $sum;
        }

        function checkSquareMatrix($array) {
            $arrayLength = count($array);
            $check = true;
            
            foreach ($array as $index => $element) {
                if (count($element) != $arrayLength) {
                    $check = false;
                    break;
                };
            };
            return $check;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $par = $_POST["input"];
            $matrix = array();
            $regex = "/^\d{1}[0-9 ,]+$/";
            $regex2 = "/^\d{1}[0-9 ]+\d+$/";

            try {
                if (!preg_match($regex, $par)) {
                    throw new Exception('nhập không hợp lệ');
                }
                                
                $temp = explode(',',$par);

                foreach ($temp as $index => $str) {
                    if(!preg_match($regex2, $str)) {
                        throw new Exception('nhập không hợp lệ');
                    };
                    $array = explode(' ',$str);
                    array_push($matrix, $array);
                };

                echo "<br/>Ma trận số:<br/>";

                foreach ($matrix as $row => $array) {
                    foreach ($array as $col => $value) {
                        echo "$value ";
                    }
                    echo "<br/>";
                };
                  
                if (!checkSquareMatrix($matrix)) {
                    throw new Exception(' không phải là ma trận vuông');
                };

                $sum = sumOfMainDiagonal($matrix);

                echo "Tổng các phần tử trên đường chéo chính là $sum";
            } catch (Exception $e){
                echo '<br/>Lỗi '.$e->getMessage();
            }
        }
    ?>
</body>
</html>