<?php

class DB_driver{
    private $__conn;
    function connect(){	
		$servername = "127.0.0.1:3306";
		$username = "root";
		$database = "website_tintuc_pdo";
		$password = "";
		$this->__conn = mysqli_connect($servername, $username,  $password,$database);
		if ($this->__conn->connect_error) {
    		die("Connection failed: " . $this->__conn->connect_error);
		}
		//echo"Kết nối thành công";
	}     
    // Hàm Ngắt Kết Nối
    function dis_connect(){
       // Nếu đang kết nối thì ngắt
    	if ($this->__conn){
       	 	mysqli_close($this->__conn);
    	}
    }
     function get_list($sql)
    {
        //echo $sql;
        $query = mysqli_query($this->__conn, $sql);
 
        if (!$query){
            die ('Câu truy vấn bị sai');
        } 
        $return = array();
        $count = 0;
        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($query)){
            $return[] = $row;
            $count +=1;
        }
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($query); 

        return $return;
    }
    function getId($id){
        
    }
}
$DB = new DB_driver();