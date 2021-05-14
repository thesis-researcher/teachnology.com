<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_sidebar.php'); ?>
				<form method="post">
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

                                <a class="cancel" href="profile_student.php">Cancel</a>

								<button name="update" class="btn btn-success flt">
									<i class="icon-save icon-large"></i> Save
								</button>

								

                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                	
										<div class="alert alert-info">
											<i class="icon-user"></i> Edit Account Info
										</div>

									<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
									?>
								<!-- Name -->
									<div class="span3 profile">
										<p class="hd">Name</p>
										<div class="control-group">
											<label>Firstname: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
                                          </div>
                                        </div>

                                        <div class="control-group">
											<label>Middlename: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['middlename']; ?>"  name="middlename" id="focusedInput" type="text" placeholder = "Middlename">
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Lastname: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
                                          </div>
                                        </div>

									</div>


									<!-- Basics -->
									<div class="span3 profile">
										<p class="hd">Basics</p>
										<div class="control-group">
											<label>Birthdate: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['birthdate']; ?>" name="birthdate" id="focusedInput" type="date" placeholder = "Birthdate">
                                          </div>
                                        </div>

                                        <div class="control-group">
											<label>Student ID: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['idcard']; ?>"  name="idcard" id="focusedInput" type="text" placeholder = "Student ID">
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Address: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['address']; ?>"  name="address" id="focusedInput" type="text" placeholder = "Address">
                                          </div>
                                        </div>

									</div>

									
									<!-- Contacts -->
										<div class="span3 profile">
										<p class="hd">Contacts</p>
										<div class="control-group">
											<label>Email: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['email']; ?>" name="email" id="focusedInput" type="email" placeholder = "Email">
                                          </div>
                                        </div>

                                        <div class="control-group">
											<label>Contact #: </label>
                                          <div class="controls">
                                            <input minlength="11" maxlength="11" class="input focused" value="<?php echo $row['contact']; ?>"  name="contact" id="focusedInput" type="text" placeholder = "Contact Number">
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label>Social: </label>
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['social']; ?>"  name="social" id="focusedInput" type="text" placeholder = "Social Media Account">
                                          </div>
                                        </div>

									</div>

										
										

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				</form>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>


</html>




<?php
                            if (isset($_POST['update'])) {
                       
                                $firstname = $_POST['firstname'];
                                $lastname = $_POST['lastname'];
                                $middlename = $_POST['middlename'];

                                $birthdate = $_POST['birthdate'];
                                $idcard = $_POST['idcard'];
                                $address = $_POST['address'];

                                $email = $_POST['email'];
                                $contact = $_POST['contact'];
                                $social = $_POST['social'];
								
								
								$query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Data Doesnt Exist');
								</script>
								<?php
								}else{
								
								mysqli_query($conn,"update student set 
									firstname = '$firstname' ,
									lastname = '$lastname',
									middlename = '$middlename',

									birthdate = '$birthdate',
									idcard = '$idcard',
									address = '$address',

									email = '$email',
									contact = '$contact',
									social = '$social'

									where student_id = '$session_id' 

									")or die(mysqli_error());	
								
								?>
								<script>
							 	window.location = "profile_student.php"; 
								</script>
								<?php   }} ?>



								<style>
.profile{
	font-family:Calibri light;
	margin-left:5%;
	margin-right:5%;
}
.profile li{
	font-weight:900;
	font-size: large;
	margin-left:3%;
}

.profile .hd{
	font-size:20px;
	font-weight: 800;
}

.flt{
	float:right;
}

.cancel{
	float:right;
	background-color: #b30000;
	color:white;
	padding:5px 8px;
	margin:4px 2px 4px 2px;
	font-weight: 500;
	text-decoration: none;
	border:1px solid gray;
}

.cancel:hover{
	color:white;
	text-decoration: none;
	background-color: #ff1a1a;
}

</style>