<?php
	require"include/DB.php";
	$DB->connect();
	$list = $DB->get_list('SELECT * FROM user ORDER BY userid DESC');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản trị tài khoản</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/css.css">
	<script src="assets/js/checklogin.js"></script>
	
</head>
<body>
	<header>
		<div class="container">
			<div id="session">
				<p id="name"><a href="login.html">Log Out</a></p>
			</div>
		</div>
	</header>
	<div class="wrapper">
	    <nav id="sidebar">
	        <div class="sidebar-header">
	            <img src="assets/img/khanh.jpg" width="150" height="100">
	        </div>
	        <ul class="list-unstyled components">
	            <li class="active">
	                <a href="trangchu.html">Trang Chủ</a>           
	            </li>
	            <li>
	                <a href="quantriuser.html">Tài Khoản</a>            
	            </li>
	            <li>
	                <a href="AdminPage.html">Bài Viết</a>
	            </li>
	            <li>
	                <a href="#">Giới Thiệu</a>
	            </li>
	        </ul>
	    </nav>
	    
		<div class="container-fluid">
			<!-- <div class="title">
				<div class="add">
					<h3>Thêm mới</h3>
				</div>
				<div class="form">
					<input type="text" id="enterUserName" placeholder="tên tài khoản">
					<input type="text" id="enterUserPass" placeholder="mật khẩu">
					<input type="text" id="enterUserRoles" placeholder="quyền">
					<button class="btn btn-primary" onclick="ShowAdd()">Add</button>
				</div>
			</div> -->
			<div class="container">
				<div class="danhsach">
					<h2>Danh sách tài khoản </h2>
					<p id="tongtaikhoan"></p>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Email</th>
							<th>Password</th>
							<th>Quyền</th>
							<th>Block</th>
							<th>Chức</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody id="list">
						<?php 
					  		foreach ($list as $row) {
					  	?>
					  		<tr> 
						      	<td><?php echo($row['userid']);  ?></td>
						      	<td><?php echo $row['email']; ?></td>
						      	<td><?php echo $row['password']; ?></td>
						       	<td><?php echo $row['roles']; ?></td>
						      	<td><?php echo ($row['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
						      	<td><?php echo ($row['permission'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
						      	<td>     
						        	<a href="updateUser.php?id=<?php echo $row['userid'];?>">Sửa</a>
						        	<a href="quanlyadmin.php?id_delete=<?php echo $row['userid'];?>">Xóa</a>
						      	</td>
						    </tr>
						<?php
					  		}
					  	?>
					</tbody>
				</table>
			</div>
			<div class="container-fluid">
				<div id="edit">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>