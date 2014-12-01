<?php session_start(); ?>
<head>

<!-- Bootstrap core CSS -->
    <link href="./bootstrap-3.1.1-dist/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
    <link href="./bootstrap-3.1.1-dist/css/dashboard.css" rel="stylesheet">
	
<!-- Bootstrap theme -->
    <link href="./bootstrap-3.1.1-dist/css/bootstrap-theme.css" rel="stylesheet">
 <!--   <link href="./bootstrap-3.1.1-dist/css/signin.css" rel="stylesheet">  -->	
	
	<style type="text/css">
		.title-container { padding:50px 0px; }
		
		.form-signin {
		  max-width: 400px;		 
		}
		
		.extra{
			padding: 10px;
			
		}
	</style>
	
	
</head>

<body>
<script type="text/javascript"> 
	panelIndex=0;
</script>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Table Topics Manager</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">University of Moratuwa Toastmasters Club</a></li>            
            <li>
			<?php 				
				if(isset($_SESSION['Name'])){
					echo '<a href=".?page=LogOut">'.$_SESSION['Name'].' (Log out)</a>';
				}
				else{
					echo '<a href=".?page=Login&Next=Random">Log in</a>';					
				}
			?>			
			</li>
          </ul>
          
        </div>
      </div>
    </div>

	<?php
		  
			if (isset($_GET["page"]))
			{
				$page=$_GET["page"];								
			}
			else if(isset($_GET["q"]))
			{
				$page='Search';
			}
			else if (isset($_POST["page"]))
			{
				$page=$_POST["page"];								
			}	
			else{				
				$page='Random';
			}
			
	?>
	
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
		  <div id="TMM">
		  <h3 id="tt">Table Topics</h3> 		  
		  <div>
		  
		  <ul class="nav nav-sidebar">			
		    <?php
				if($page=='Random'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
            <a href="?page=Random">Random Topic!</a></li>
			<?php
				if($page=='Search'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=Search">Search</a></li>
            <?php
				if($page=='Add'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=Add">Add Topic
			<?php
				if(!isset($_SESSION['Name'])){
					echo '<span class="glyphicon glyphicon-lock"></span>';
				}
			?>
			</a></li>
            <?php
				if($page=='Edit'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=Edit&id=1">Edit Topics
			<?php
				if(!isset($_SESSION['Name'])){
					echo '<span class="glyphicon glyphicon-lock"></span>';
				}
			?>
			</a></li>   
          </ul>
		  </div>
		  
		  
		  <h3 id="meeting">Meeting Management</h3> 		  
		  <div>
			
			<ul class="nav nav-sidebar">
			
			<?php
				if($page=='AddMeeting'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=AddMeeting">Add Meeting
			<?php
				if(!isset($_SESSION['Name'])){
					echo '<span class="glyphicon glyphicon-lock"></span>';
				}
				else if(isset($_SESSION['Level'])){
					if($_SESSION['Level']<1){
						echo '<span class="glyphicon glyphicon-lock"></span>';
					}
				}
			?>
			</a></li>

			<?php
				if($page=='EditMeeting'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=EditMeeting">
			<?php
				//Note: In the final system this section will be uncommented so that admins will get the power not only to volentter but also to edit other aspects. But since Chris needs to see all the funtionality with one login, I am disabling that option here.
				
			//	if(isset($_SESSION['Level']) && $_SESSION['Level']>0){					
			//		echo 'Edit Meeting';					
			//	}
			//	else{
					echo 'Register for Role';
			//	}
				
				if(!isset($_SESSION['Name'])){
					echo '<span class="glyphicon glyphicon-lock"></span>';
				}
			?>
			</a></li>

			
		  </ul>
		  
		  </div>
		  
		  <h3 id="meeting">Member Area</h3> 		  
		  <div>
		  
		  <ul class="nav nav-sidebar">
		  
		  
			<?php
				if($page=='AddUser'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=AddUser">Add User
			<?php
				if(!isset($_SESSION['Name'])){
					echo '<span class="glyphicon glyphicon-lock"></span>';
				}
				else if(isset($_SESSION['Level'])){
					if($_SESSION['Level']<1){
						echo '<span class="glyphicon glyphicon-lock"></span>';
					}
				}
			?>
			</a></li>
			<?php
				if($page=='Speech'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=Speech">Do a Speech!</a></li>
			<?php
				if($page=='Evaluator'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=Evaluator">Be an Evaluator!</a></li>
			<?php
				if($page=='Progress'){
					echo "<li class='active'>";
				}
				else{
					echo "<li>";
				}				
			?>
			<a href="?page=Progress">Update Member Progress
			<?php
				if(!isset($_SESSION['Name'])){
					echo '<span class="glyphicon glyphicon-lock"></span>';
				}
				else if(isset($_SESSION['Level'])){
					if($_SESSION['Level']<1){
						echo '<span class="glyphicon glyphicon-lock"></span>';
					}
				}
			?>
			</a></li>
			
		  </ul>
		  
		  </div>
		  
		  </div>
		  
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
		
			
			
				
			
			include('connectionData.php');

			

			$con=mysqli_connect($server, $user, $pass, $dbname, $port);

			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
									
			$topics =array();
			LoadAllTopics();
			//echo $topics[2];
			
			$TitleID=0;
			$Title="";
			$keys=array();
			$MeetingID=0;
			
			
			if($page=='Login'){	//User interface for logging in	
				if(isset($_GET["Wrong"])){
					echo '<div class="alert alert-danger alert-dismissable">';
					echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					echo '<strong>Warning!</strong> Wrong email address or password!';
					echo '</div>';
				}
				echo '<div class="container"><form class="form-signin" role="form" action="." method="post">';
				echo '<h2 class="form-signin-heading">Please sign in</h2>';
				echo '<input type="hidden" class="form-control" value="CheckLogin" name="page">';
				if(!isset($_GET["Wrong"])){
					echo '<input type="hidden" class="form-control" value="'.$_SERVER['QUERY_STRING'].'" name="Redirect">';
				}
				echo '<input type="email" class="form-control" placeholder="Email address" name="email" ';
				if(isset($_GET["Wrong"])){
					echo 'value='.$_GET["email"];
				}
				echo 'required autofocus>';
				echo '<input type="password" class="form-control" placeholder="Password" name="password" required>';
				echo '<label class="checkbox">';
				echo '<input type="checkbox" value="remember-me"> Remember me';
				echo '</label>';
				echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>';
				echo '</form></div>';
			}
			else if($page=='CheckLogin') //Business logic to check login details
			{				
				if(isset($_POST["email"]) && isset($_POST["password"])){
					$pass=CryptPass($_POST["password"]);
					$email=$_POST["email"];					
					$sql="SELECT * FROM `tt_members` WHERE`Email` = '".$email."'";
					$result =mysqli_query($con,$sql);
					if (!$result){
						die('Error: ' . mysqli_error($con));
					}
					else{							   
						while($row = mysqli_fetch_array($result)) {
							if($pass==$row['Password']){
								$_SESSION['Name']=$row['Name'];
								$_SESSION['Level']=$row['Level'];
								$_SESSION['Index']=intval ($row['Index']);
								if($_POST["Redirect"]!=""){
									$params = explode("page=Login&Next=",(string)$_POST["Redirect"]);
									header( "Location: ./?page=".$params[1]);
								}
								else{
									header( "Location: ./?page=Random"); //Does not work/////////////////////////////////////////////////////////////////
								}								
							}
							else{
								header( "Location: ./?page=Login&Wrong&email=".$_POST["email"]);
							}
						}						   
					}
				}
			}
			else if($page=='LogOut') //Business logic LogOut
			{
				if(isset($_SESSION['Name'])){
						unset($_SESSION['Name']);
						unset($_SESSION['Level']);
				}
				header( "Location: ./?page=Random");
			}
			else if($page=='Show'){
				if (isset($_GET["id"]))
				{
					$TitleID=$_GET["id"];
					FetchTitle($TitleID,$topics,$con);								
					ShowTitle();
				}
				else{					
					ErrorMesage();
				}						
			}
			else if($page=='Random'){
				echo '<script type="text/javascript">panelIndex=0;</script>';
				$TitleID=array_rand($topics, 1);				
				FetchTitle($TitleID,$topics,$con);
								
				ShowTitle();
				echo '<hr>';
				echo ' <a href="?page=Random"><button type="button" class="btn btn-lg btn-success">More Random!</button></a>';
				
			}
			else if($page=='Search'){
				echo '<script type="text/javascript">panelIndex=0;</script>';
				$sql="SELECT DISTINCT`tt_title`.`Topic`,`tt_title`.`Index` FROM tt_title,(SELECT `tt_title_to_key`.`Title` FROM tt_title_to_key,tt_key WHERE `tt_title_to_key`.`Key` =`tt_key`.`Index`";

				echo '<form  action="." method="get">';
				echo '<input id="searchBox" type="text" class="form-control" placeholder="Search..." name="q" >';
				echo '</form>';
				
				if (isset($_GET["q"]))
				{
					$q=$_GET["q"];
					echo '<h3 class="sub-header">Search Results for "'.$q.'"</h3>';
					$sql=$sql."AND `tt_key`.`Key` = '".$q."'";
				}
				else{					
					echo '<h3 class="sub-header">Listing All Topics</h3>';					
				}
				$sql=$sql.") AS Sel WHERE `Sel`.`Title` =`tt_title`.`Index`";
							
				
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
				
				//echo '<div class="title-container">';
				echo '<div class="list-group">';
				while($row = mysqli_fetch_array($result))
				{					
					echo '<a href="?page=Show&id='.$row['Index'].'" class="list-group-item" style:width="100%">'.$row['Topic'].'</a>';
				}						
				echo '</div>';
				//echo '</div>';
			}
			else if($page=='Edit'){ //Ui for Edit				
				if(isset($_SESSION['Level'])){					
						if (isset($_GET["id"]))
						{
							$TitleID=$_GET["id"];
							if($TitleID<=0){
								$TitleID=1;
							}
							else if($TitleID>=count($topics)){
								$TitleID=count($topics)-1;
							}	
							FetchTitle($TitleID,$topics,$con);
							echo '<script type="text/javascript">panelIndex=0;</script>';
							echo '<h2 class="sub-header"><a href="?page=Edit&id='.($TitleID-1).'"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-backward"></span></button></a> ';
							echo 'Editing Topic Number '.$TitleID.' ';
							echo '<a href="?page=Edit&id='.($TitleID+1).'"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-forward"></span></button></a></h2><br>';
							ShowInputForm();
							if (isset($_GET["Updated"]))
							{
								echo '<div class="alert alert-success alert-dismissable">';
								echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								echo 'Topic Updated!';
								echo '</div>';
							}

						}
						else{					
							ErrorMesage();
						}					
				}
				else{
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}
			}
			else if($page=='Add'){ //Ui for Add
				if(isset($_SESSION['Level'])){
					echo '<script type="text/javascript">panelIndex=0;</script>';
					echo '<h2 class="sub-header">Adding New Topic</h2><br>';
					ShowInputForm();					
				}
				else{
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}
			}
			else if($page=='Update'){  //Handles the DB operation of both Edit and Add requests				
				if(isset($_SESSION['Level'])){ 
					if ((isset($_GET["topic"]))&&(isset($_GET["keys"])))
					{
						ExtractDBwriterInput();
						$isAdd=true;
						
						if(isset($_GET["id"])){ //ID is already set, i.e. This is an update
							$isAdd=false;
							$TitleID=$_GET["id"];
							
							//Checking and updating keys one by one is an unwanted overhead. So keys are dropped and reinserted.
							//This is not a problem because duplicates are not inserted. First, the Topic to Key mappings are dropped.
							$sql="DELETE FROM tt_title_to_key WHERE `Title` = '".$TitleID."'";	
							if (!mysqli_query($con,$sql)) {
								die('Error: ' . mysqli_error($con));
							}
							
							//Now update the Topic
							$sql="UPDATE tt_title SET `Topic`='".$Title."' WHERE `Index`='".$TitleID."'";
							if (!mysqli_query($con,$sql)) {
								die('Error: ' . mysqli_error($con));
							}
							
						}
						else{  //There is no id i.e this is an add 
						
							//Add the topic
							$sql="INSERT INTO tt_title (`Topic`,`Added by`) VALUES ('".$Title."',".$_SESSION['Index'].")";
							if (!mysqli_query($con,$sql)) {
								die('Error: ' . mysqli_error($con));
							}
							$TitleID=mysqli_insert_id($con);
						}
						
						
						//Now insert Keys and Topic to key mappings
						for ($j = 0; $j < count($keys); $j++) {  
							if (preg_match("/^.(?=.*[a-z])|(?=.*[A-Z]).*$/", $keys[$j])){ //Take only valid strings
								//See if the key already exists
								$sql="SELECT * FROM tt_key WHERE `Key` = '".$keys[$j]."'";
								$result =mysqli_query($con,$sql);
								if (!$result) {
									die('Error: ' . mysqli_error($con));
								}
								else{
								   if($result->num_rows>0){ //Already exists
										while($row = mysqli_fetch_array($result)) {
											$keyID=$row['Index'];
										}
								   }
								   else{
									   //Add the key
									   $sql="INSERT INTO tt_key (`Key`) VALUES ('".$keys[$j]."');";	
										if (!mysqli_query($con,$sql)) {
											die('Error: ' . mysqli_error($con));
										}
										$keyID=mysqli_insert_id($con);
								   }
								}
								
								//Add title to key mapping
								$sql="INSERT INTO `tt_title_to_key` (`Title`,`Key`) VALUES ('".$TitleID."','".$keyID."');";	
								if (!mysqli_query($con,$sql)) {
									die('Error: ' . mysqli_error($con));
								}
								$keyID=mysqli_insert_id($con);	
							
							}
						}
						
						//Now we need to clean up the orphaned keys
						
						//The following will return the indexes of the orphaned keys
						$sql="SELECT Res.Index FROM (SELECT tt_title_to_key.Title,tt_key.Index,tt_key.Key FROM tt_title_to_key RIGHT OUTER JOIN tt_key ON tt_title_to_key.Key = tt_key.Index) AS Res WHERE Res.Title IS NULL;";
						$result=mysqli_query($con,$sql);
						if (!$result) {
							die('Error: ' . mysqli_error($con));
						}
						
						//Now delete the orphaned keys
						while($row = mysqli_fetch_array($result)) {
							$sql="DELETE FROM tt_key WHERE `Index` = '".$row['Index']."'";	
							if (!mysqli_query($con,$sql)) {
								die('Error: ' . mysqli_error($con));
							}						
						}
						
						//Refresh loaded topic details
						LoadAllTopics();

						if($isAdd){
							//Re-fetch the Added Topic and show it
							FetchTitle($TitleID,$topics,$con);						
							ShowTitle();	
						}
						else{
							//Do forwarding!!!!
							header( "Location: ./?page=Edit&id=".$TitleID."&Updated") ;				
						}										
					}
					else{
						ErrorMesage();
					}
				}
				else{ //This should never happen due to this being an internal function. But I put the check to prevent hacking
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}
			}			
			else if($page=='AddUser') //User interface for adding users
			{
				if(isset($_SESSION['Level'])){
					if($_SESSION['Level']==1){
						echo '<script type="text/javascript">panelIndex=2;</script>';
						if(isset($_GET["PWMM"])){
							echo '<div class="alert alert-danger alert-dismissable">';
							echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							echo '<strong>Warning!</strong> Passwords do not match!';
							echo '</div>';
						}
						echo '<form action="." class="form-signin" role="form" method="post">';
						echo '<input type="hidden" class="form-control" value="AddUserDB" name="page">';
						echo '<h4>Name</h4>';
						echo '<input type="text" class="form-control" placeholder="Full Name" name="Name" ';
						if(isset($_GET["Name"])){
							echo 'value ="'.$_GET["Name"].'"';
						}
						echo 'required autofocus>';
						echo '<h4>Email address (Used to login)</h4>';
						echo '<input type="text" class="form-control" placeholder="Email address" name="Email" ';
						if(isset($_GET["Email"])){
							echo 'value ="'.$_GET["Email"].'"';
						}
						echo 'required>';
						echo '<h4>Password</h4>';
						echo '<input type="password" class="form-control" placeholder="Password" name="Password" required>';
						echo '<h4>Confirm Password</h4>';
						echo '<input type="password" class="form-control" placeholder="Confirm Password" name="CPassword" required>';
						echo '<label class="checkbox">';
						echo '<input type="checkbox" name="admin"> Is administrator';
						echo '</label>';
						echo '<br><button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok-circle"></span> Add User</button></form>';
					}
					else{
						echo '<div class="alert alert-warning alert-dismissable">';
						echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo 'You do not have admin powers!';
						echo '</div>';
					}
				}
				else{
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}
			}
			else if($page=='AddUserDB') //Business logic to add user
			{
				if(isset($_SESSION['Level'])){
					if($_SESSION['Level']==1){
						if(isset($_POST["Name"]) && isset($_POST["Email"]) && isset($_POST["Password"])&& isset($_POST["CPassword"])){
							//Check if passwords match if not error
							if($_POST["Password"]==$_POST["CPassword"]){						
								$pass=CryptPass($_POST["Password"]);
								if(isset($_POST["admin"])){
									if($_POST["admin"]=='on'){
										$status=1;
									}
									else{
										$status=0;
									}
								}
								else{
										$status=0;
								}
								$sql="INSERT INTO `tt_members` (`Name`,`Email`,`Password`,`Level`) VALUES ('".$_POST["Name"]."','".$_POST["Email"]."','".$pass."','".$status."');";
								if (!mysqli_query($con,$sql)) {
									die('Error: ' . mysqli_error($con));
								}
								else{
									echo '<div class="alert alert-success alert-dismissable">';
									echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
									echo 'User '.$_POST["Name"].' added!';
									echo '</div>';
									RandomButton();
								}
							}
							else{
								header( "Location: ./?page=AddUser&Name=".$_POST["Name"]."&Email=".$_POST["Email"]."&PWMM") ;
							}
						}
					}
					else{
						echo '<div class="alert alert-warning alert-dismissable">';
						echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo 'You do not have admin powers!';
						echo '</div>';
					}
				}
				else{
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}				
			}
			else if($page=='AddMeeting') //UI to add meeting
			{
				if(isset($_SESSION['Level'])){
					if($_SESSION['Level']==1){
						global $MeetingID;
						$MeetingID=0;
						echo '<h2 class="sub-header">Adding a New Meeting</h2><br>';
						ShowMeetingtForm($_SESSION['Level']);						
					}
					else{
						echo '<div class="alert alert-warning alert-dismissable">';
						echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo 'You do not have admin powers!';
						echo '</div>';
					}
				}
				else{					
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}
			}
			else if($page=='EditMeeting') //UI to edit meeting
			{
				if(isset($_SESSION['Level'])){				
						global $MeetingID;
						//$MeetingID=1;
						getNewMeetingID();						
						$mode=0;//Note: In the final system this will be "$_SESSION['Level']" So that only admins will get the power not only to volentter but also to edit other aspects. But since Chris needs to see all the funtionality with one login, I am disabling that option here. 
												
						if($mode==1){
							echo '<h2 class="sub-header">Editing the next Meeting</h2><br>';
						}
						else{
							echo '<h2 class="sub-header">Volunteering for a role</h2><br>';
						}
						ShowMeetingtForm($mode);  
				}
				else{					
					$params = explode("page=",(string)$_SERVER['QUERY_STRING']);
					header( "Location: ./?page=Login&Next=".$params[1]);
				}
			}
			else if($page=='Evaluator') //UI to Volenteer for a speech evaluator
			{
				echo '<script type="text/javascript">panelIndex=2;</script>';
				echo '<h2 class="sub-header">Volenteer to be a speech evaluator</h2><br>';
				
				global $MeetingID;
				getNewMeetingID();
				
				$claimedCount=0;
				$sql="SELECT * FROM `toastmastersdb`.`tt_speech` WHERE `meetingIndex`=".$MeetingID;			
																	
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
					
				echo '<table class="table table-hover">';
				echo '<tr><th>Speaker</th><th>Manual</th><th>Project Number</th><th>Evaluator</th></tr>';
				while($row = mysqli_fetch_array($result))
				{
					if(!is_null($row['evalIndex'])){ //If it is already claimed just print a line
						echo '<tr>';
						echo '<td>'.getMemberName(intval($row['memberIndex'])).'</td>';
						echo '<td>'.$row['manualName'].'</td>';	
						echo '<td>'.intval($row['projectNum']).'</td>';
						echo '<td>'.getMemberName(intval($row['evalIndex'])).'</td>';	
						echo '</tr>';
					}
					else{ //Else can claim					
						echo '<tr>';
						echo '<form action="." method="get">';
						echo '<input type="hidden" class="form-control" value="ClaimEvaluatorSlot" name="page">';	
						echo '<td>'.getMemberName(intval($row['memberIndex'])).'<input type="hidden" class="form-control" value='.intval($row['memberIndex']).' name="memberIndex"></td>';
						echo '<td>'.$row['manualName'].'</td>';	
						echo '<td>'.intval($row['projectNum']).'</td>';
						echo '<td><button type="submit" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok-circle"></span> Evaluate</button> </td>';
						echo '</form>';
						echo '</tr>';
					}
				}
				echo '</table>';
				
			}
			else if($page=='Speech') //UI to Volenteer to do a speech
			{
				echo '<script type="text/javascript">panelIndex=2;</script>';
				echo '<h2 class="sub-header">Volenteer to do a speech</h2><br>';
				
				global $MeetingID;
				getNewMeetingID();
				
				$claimedCount=0;
				$sql="SELECT * FROM `toastmastersdb`.`tt_speech` WHERE `meetingIndex`=".$MeetingID;	//Replace with Count(*)		
																	
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
								
				while($row = mysqli_fetch_array($result))
				{	
					$claimedCount++;
				}
				
				$sql="SELECT `numberOfSpeechSlots` AS c FROM `toastmastersdb`.`tt_meeting` WHERE `meeting_index`=".$MeetingID;			
																	
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
				
				if($row = mysqli_fetch_array($result))
				{						
					if((intval($row['c'])-$claimedCount)>0)
					{
						echo '<form action="." method="get">';
						echo '<table width="100%" border="0" ><tr><td width="15%" ><div class="extra">';
						echo '<input type="hidden" class="form-control" value="ClaimSpeechSlot" name="page">';						
						echo '<label for="date">Manual Name : </label></div>';
						echo '</td><td td width="85%">';
						echo '<input type="text" class="form-control" name="manualName" required>';
						echo '</td></tr><tr><td width="15%" ><div class="extra">';
						echo '<label for="date">Project Number : </label></div>';
						echo '</td><td td width="85%">';
						echo '<select class="form-control" name="projectNum" required>';
						for ($x = 1; $x <= 10; $x++) {
							echo '<option value='.$x.' >'.$x.'</option>';
						}
						echo '</select>';
						echo '</td></tr></table>';
						echo '<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok-circle"></span> ';						
						echo 'Claim Slot!';						
						echo '</button> </form>';							
					}
					else{
						echo '<div class="alert alert-warning alert-dismissable">';
						echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo 'Sorry. No speech slots available, try next meeting!';
						echo '</div>';
					}
					
				}
				
			}
			else if($page=='Progress') //UI to update member progress
			{
				echo '<script type="text/javascript">panelIndex=2;</script>';
				echo '<h2 class="sub-header">Update member progress</h2><br>';
				
				
			}
			else if($page=='UpdateMeeting') //Business logic to add/update meeting
			{
				if(isset($_SESSION['Level'])){
					echo '<script type="text/javascript">panelIndex=2;</script>';					
					if(isset($_GET["date"])){ //This is an add													
							$sql="INSERT INTO tt_meeting (`date`,`comment`,`toastmaster`,`tableTopicsMaster`,`voteCounter`,`timer`,`gramarian`,`generalEvaluator`,`ahCounter`,`numberOfSpeechSlots`) VALUES (STR_TO_DATE('".$_GET["date"]."', '%m-%d-%Y'),'".$_GET["comment"]."',".$_GET["toastmaster"].",".$_GET["tableTopicsMaster"].",".$_GET["voteCounter"].",".$_GET["timer"].",".$_GET["gramarian"].",".$_GET["generalEvaluator"].",".$_GET["ahCounter"].",".$_GET["numberOfSpeechSlots"].")";
							if (!mysqli_query($con,$sql)) {
								die('Error: ' . mysqli_error($con));
							}
							else{
								echo '<script type="text/javascript">panelIndex=1;</script>';
								echo '<div class="alert alert-success alert-dismissable">';
								echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								echo 'New meeting on '.$_GET["date"].' added!';
								echo '</div>';
							}
							//$TitleID=mysqli_insert_id($con);
					}
					else{
						global $MeetingID;
						getNewMeetingID();
						$sql="UPDATE tt_meeting SET `toastmaster`=".$_GET["toastmaster"].", `tableTopicsMaster`=".$_GET["tableTopicsMaster"].", `voteCounter`=".$_GET["voteCounter"].", `timer`=".$_GET["timer"].", `gramarian`=".$_GET["gramarian"].", `generalEvaluator`=".$_GET["generalEvaluator"].", `ahCounter`=".$_GET["ahCounter"]." WHERE `meeting_index`=".$MeetingID;
							if (!mysqli_query($con,$sql)) {
								die('Error: ' . mysqli_error($con));
							}
							else{
								echo '<script type="text/javascript">panelIndex=1;</script>';
								echo '<div class="alert alert-success alert-dismissable">';
								echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
								echo 'Meeting '.$MeetingID.' updated!';
								echo '</div>';
							}						
					}
				}
				else{
					echo '<div class="alert alert-warning alert-dismissable">';
					echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					echo 'You have to be a member to edit meeting roles!';
					echo '</div>';
				}
			}
			else if($page=='ClaimSpeechSlot') //Business logic to Claim a SpeechSlot
			{
				global $MeetingID,$con;
				getNewMeetingID();
			
				echo '<script type="text/javascript">panelIndex=2;</script>';
				$sql="INSERT INTO tt_speech (`meetingIndex`,`memberIndex`,`manualName`,`projectNum`) VALUES (".$MeetingID.",".$_SESSION['Index'].",'".$_GET["manualName"]."',".intval ($_GET["projectNum"]).")";
				if (!mysqli_query($con,$sql)) {
					
					if(mysqli_errno($con)==1062) //If already exists 
					{
						echo '<div class="alert alert-warning alert-dismissable">';
						echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						echo 'You have already claimed a Speech slot in this meeting. Cannot Add twice!';
						echo '</div>';
					}
					else{
						die();
					}					
				}	
				else{				
					echo '<div class="alert alert-success alert-dismissable">';
					echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					echo 'Speeech slot claimed!';
					echo '</div>';
				}
			}
			else if($page=='ClaimEvaluatorSlot'){
				global $MeetingID,$con;
				getNewMeetingID();
				echo '<script type="text/javascript">panelIndex=2;</script>';
				$sql="UPDATE tt_speech SET `evalIndex`=".$_SESSION['Index']." WHERE `meetingIndex`=".$MeetingID." AND `memberIndex`=".$_GET["memberIndex"];
				if (!mysqli_query($con,$sql)) {
					die('Error: ' . mysqli_error($con));
				}
				else{				
					echo '<div class="alert alert-success alert-dismissable">';
					echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					echo 'Evaluator slot claimed!';
					echo '</div>';
				}
			}
			
			function CryptPass($passW){
				global $key1,$key2;
				$hashed_password = crypt($key1,$key2);
				$pass=crypt($passW, $hashed_password);
				return $pass;
			}
			
			function getMemberName($index){
				global $con; //Refer to the global variables
				
				$sql="SELECT m.`Name` FROM `toastmastersdb`.`tt_members` AS m WHERE m.`Index`=".$index;			
																	
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
				
				if($row = mysqli_fetch_array($result))
				{
					return($row["Name"]);
				}
			}
			
			
			function getNewMeetingID(){
				global $MeetingID,$con; //Refer to the global variables
				
				$sql="SELECT Max(`meeting_index`) AS m FROM `toastmastersdb`.`tt_meeting`";			
					
												
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
				while($row = mysqli_fetch_array($result))
				{					
					$MeetingID=intval($row['m']);
				}	
				
				
			}
			
			function memberDropDown($selected){
				global $MeetingID,$con; //Refer to the global variables			
				
				$sql="SELECT m.`Index`,m.`Name` FROM `toastmastersdb`.`tt_members` AS m";			
				$options="";
												
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
				while($row = mysqli_fetch_array($result))
				{			
					$value=intval($row['Index']);
					if($MeetingID>0){ //Is update
						if($selected==$_SESSION['Index'] || $selected==0) //This is a role you have volenteered  OR a role no one has volenteered
						{
							if($value==0 || $value==$_SESSION['Index']){ //Quiting, remaining OR Volenteering allowed 
								$options=$options."<option value=".$value;
								if($value==$selected){
									$options=$options." selected='selected' ";
								}
								$options=$options.">".$row['Name']."</option>";
							}
						}						
						else{ //Otherwise only that volnteered one shown. (You cannot forcefully remove others)
							if($value==$selected){
								$options="<option value=".$value." selected='selected' >".$row['Name']."</option>";
							}
						}					
					}
					else{ //Is add
						$options=$options."<option value=".$value;
						if($value==$selected){
							$options=$options." selected='selected' ";
						}
						$options=$options.">".$row['Name']."</option>";	
					}						
				}	
				
				return $options;				
			}
			
			function ShowMeetingtForm($mode){
				global $MeetingID,$con; //Refer to the global variables

						$date=date('m-j-Y');
						$com="";
						$tm=0;
						$tt=0;
						$vc=0;
						$ti=0;
						$gr=0;
						$ge=0;
						$ac=0;
						$sp=0;
						
						if($MeetingID>0){
							$sql="SELECT * FROM `toastmastersdb`.`tt_meeting` WHERE `meeting_index`=".$MeetingID;
							$result =mysqli_query($con,$sql);
							if (!$result) {
								die('Error: ' . mysqli_error($con));
							}
							while($row = mysqli_fetch_array($result))
							{		
								$date=$row['date'];								
								$com=$row['comment'];
								$tm=$row['toastmaster'];
								$tt=$row['tableTopicsMaster'];
								$vc=$row['voteCounter'];
								$ti=$row['timer'];
								$gr=$row['gramarian'];
								$ge=$row['generalEvaluator'];
								$ac=$row['ahCounter'];
								$sp=$row['numberOfSpeechSlots'];
							}	
						}
						
				
						echo '<script type="text/javascript">panelIndex=1;</script>';						
						echo '<form action="." method="get">';
						echo '<table width="100%" border="0" ><tr><td width="15%" ><div class="extra">';
						echo '<input type="hidden" class="form-control" value="UpdateMeeting" name="page">';						
						echo '<label for="date">Date : </label></div>';
						echo '</td><td td width="35%">';
						echo '<input id="date" class="datepicker form-control" data-date-format="mm-dd-yyyy" name="date" value="'.$date.'" required';
						if($mode>=1){
							echo '>';
						}
						else{
							echo ' disabled>';
						}
						echo '</input></td><td td width="15%" ><div class="extra">';
						echo '<br><label for="numberOfSpeechSlots">Speech Slots : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select class="form-control" id="numberOfSpeechSlots" name="numberOfSpeechSlots" ';
						if($mode>=1){
							echo '>';
						}
						else{
							echo ' disabled>';
						}
						for ($x = 3; $x <= 5; $x++) {
							echo "<option value=".$x;
							if($sp==$x){
								echo " selected='selected' "; //Select the correct number
							}
							echo " >".$x."</option>";
						}
						echo '</select></td></tr><tr><td td width="15%"><div class="extra">';
						echo '<br><label for="comment">Comments : </label></div>';
						echo '</td><td td width="85%" colspan=3>';
						echo '<textarea class="form-control" rows="4" id="comment" name="comment"';
						if($mode>=1){
							echo '>';
						}
						else{
							echo ' disabled>';
						}
						echo $com.'</textarea>';
						echo '</td></tr><tr><td td colspan=4>';
						echo '<br><hr><h4>Meeting Roles</h4>';
						echo '</td></tr><tr><td td width="15%"><div class="extra">';
						echo '<br><label for="toastmaster">Toastmaster : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select class="form-control" id="toastmaster" name="toastmaster" >'.memberDropDown($tm).'</select>';
						echo '</td><td td width="15%"><div class="extra">';
						echo '<br><label for="tableTopicsMaster">TableTopics Master : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select class="form-control" id="tableTopicsMaster" name="tableTopicsMaster" >'.memberDropDown($tt).'</select>';
						echo '</td></tr><tr><td td width="15%"><div class="extra">';
						echo '<br><label for="voteCounter">Vote Counter : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select class="form-control" id="voteCounter" name="voteCounter" >'.memberDropDown($vc).'</select>';
						echo '</td><td td width="15%"><div class="extra">';
						echo '<br><label for="timer">Timer : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select class="form-control" id="timer" name="timer" >'.memberDropDown($ti).'</select>';
						echo '</td></tr><tr><td td width="15%"><div class="extra">';
						echo '<br><label for="gramarian">Gramarian : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select class="form-control" id="gramarian" name="gramarian" >'.memberDropDown($gr).'</select>';
						echo '</td><td td width="15%"><div class="extra">';
						echo '<br><label for="generalEvaluator">General Evaluator : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select type="text" class="form-control" id="generalEvaluator" name="generalEvaluator" >'.memberDropDown($ge).'</select>';		
						echo '</td></tr><tr><td td width="15%"><div class="extra">';
						echo '<br><label for="ahCounter">Ah Counter : </label></div>';
						echo '</td><td td width="35%">';
						echo '<select type="text" class="form-control" id="ahCounter" name="ahCounter" >'.memberDropDown($ac).'</select>';
						echo '</td><td td width="15%">';
						echo '<br>';
						echo '</td><td td width="35%">';												
						echo '</td></tr></table><hr>';
						echo '<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok-circle"></span> ';
						if($MeetingID>0){
							echo 'Update';
						}
						else{
							echo 'Add';
						}
						echo '</button> </form>';
			}
			
			
			
			
			
			function ShowInputForm(){
				global $Title,$keys,$TitleID; //Refer to the global variables
			
				echo '<form action="." method="get">';
				echo '<h4 class="sub-header">Topic</h4>';
				echo '<input type="hidden" class="form-control" value="Update" name="page">';
				if($TitleID>0){
					echo '<input type="hidden" class="form-control" value="'.$TitleID.'" name="id">';
				}
				echo '<input type="text" class="form-control" value="'.$Title.'" name="topic" required autofocus>';
				echo '<h4 class="sub-header">Keys</h4>';
				$keyList="";
				if($TitleID>0){
					$keyList=$keys[0];
					for ($i = 1; $i < count($keys); $i++) {
						$keyList=$keyList.", ".$keys[$i];
					}	
				}				
				echo '<input type="text" class="form-control" value="'.$keyList.'" name="keys" required>';					
				echo '<br>';	
				echo '<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok-circle"></span> ';
				if($TitleID>0){
					echo 'Update';
				}
				else{
					echo 'Add';
				}
				echo '</button> </form>';
			}
			
			
			function LoadAllTopics(){
				global $topics,$con;
				
				$result = mysqli_query($con,"SELECT * FROM tt_title");
				
				$topics =array($result->num_rows);
				while($row = mysqli_fetch_array($result))
				{
					$topics[$row['Index']] = $row['Topic'];
				}			
			}
			
			
			
			function ExtractDBwriterInput(){
			     global $Title,$keys,$TitleID; //Refer to the global variables
				
				$Title=$_GET["topic"];
				$keysString=$_GET["keys"];
				
					
				//KeyString cleaning
				$keysString=str_replace(array("(",")"," ","? "), "", $keysString);					
				$keysString=str_replace(array("?", ".", "'",",,"), "", $keysString);
				$keysString=str_replace("\n", "", $keysString);
					
				//Extract keys
				$keys = explode(",",(string)$keysString);
			}
			
			function ErrorMesage(){
				echo '<h2 class="sub-header">Invalid!</h2>';
				RandomButton();
			}
			
			function RandomButton(){
				echo '<a href="?page=Random"><button type="button" class="btn btn-lg btn-success">View a random topic!</button></a>';
			}
			
			function ShowTitle() {
				global $Title,$keys,$TitleID; //Refer to the global variables
				
				echo '<h2 class="sub-header">'.$Title;
				echo '<a href="?page=Edit&id='.$TitleID.'"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></a></h2>';
				print '<h4>Keys; </h4>';
				for ($i = 0; $i < count($keys); $i++) {
					echo '<a href="?page=Search&q='.$keys[$i].'"><button type="button" class="btn btn-sm btn-info">'.$keys[$i].'</button></a> ';
				}
			}
			
			
			function FetchTitle($Title_ID,$topics,$con) {
				global $Title,$keys; //Refer to the global variables
				
				$Title=$topics[$Title_ID];
				$keys=array();
				
				$sql="SELECT `tt_key`.`Key` FROM tt_title_to_key,tt_key WHERE `tt_title_to_key`.`Title` = '".$Title_ID."' AND`tt_title_to_key`.`Key` =`tt_key`.`Index`";
				$result =mysqli_query($con,$sql);
				if (!$result) {
					die('Error: ' . mysqli_error($con));
				}
				while($row = mysqli_fetch_array($result))
				{
					$keys[] = $row['Key'];
				}
			}		
			
			mysqli_close($con); //Close the MYSQL connector
		  ?>

        </div>
      </div>
    </div>
	
	

	
	
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" /> 
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>	
    <script src="./bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
    <script src="./bootstrap-3.1.1-dist/js/docs.min.js"></script>
	<script type="text/javascript">
 	$(function() {		
		
		$( "#TMM" ).accordion(
		{
			collapsible: true,
			active: panelIndex,
			heightStyle: "content"

		
		}	
		
		); 
		
		
		$('.datepicker').datepicker({
			startDate: '-3d'
		});
		
	});
</script>
</body>