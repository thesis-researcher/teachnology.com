<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                        	<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>

                            <div class="navbar navbar-inner block-header">
                                <div  id="" class="muted pull-left"> 
                                <?php echo $row['lastname'],", ",$row['firstname']," ",$row['middlename']," - ",$row['role']; ?>
                                </div>
                                <a href="edit_profile_student.php<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
						?>" class="edit_pro"><i class="icon-pencil"></i> Edit</a>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                	
								<div class="alert alert-info">
									<i class="icon-user"></i> Account Info
								</div>
								
						<ul class="profile">
							
							<p class="hd">Name</p>
							<li><p>Nickname : <?php echo $row['firstname'];?></p></li>
							<li><p>Fullname : <?php echo $row['lastname'],", ",$row['firstname']," ",$row['middlename'] ?></p></li>
							<hr>

							<p class="hd">Basics</p>
							<li><p>Birthdate : <?php echo $row['birthdate'];?></p></li>
							<li><p>Student ID : <?php echo $row['idcard'];?></p></li>
							<li><p>Address : <?php echo $row['address'];?></p></li>
							<hr>

							<p class="hd">Contacts</p>
							<li><p>Email : <a href="mailto: <?php echo $row['email'] ?>"><?php echo $row['email'] ?></a></p></li>
							<li><p>Contact # :<a href="tel:<?php echo $row['contact'];?>" > <?php echo $row['contact'];?></a></p></li>
							<li><p>Social :<a href="http://www.<?php echo $row['social'];?>" > <?php echo $row['social'];?></a></p></li>
							<hr>

							<p class="hd">Credentials</p>
							<li><p>Username : <?php echo $row['username'];?></p></li>
						</ul>
					
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>


</html>

<style>
.profile{
	font-family:Calibri light;
	margin-left:3%;
}
.profile li{
	font-weight:900;
	font-size: large;
	margin-left:5%;
}

.profile .hd{
	font-size:20px;
	font-weight: 800;
}

.edit_pro{
	float:right;
	background-color: Green;
	color:white;
	border-radius:10px;
	padding:5px 10px;
	margin-top:5px;
	font-weight: 500;
	text-decoration: none;
}

.edit_pro:hover{
	color:white;
	text-decoration: none;
	background-color: forestgreen;
}
</style>