<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
<title> Online Examination System | Feedback </title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>

<body>

<!--header start-->
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">Test Your Skill</span></div>
</div></div>
<!--header end-->

<nav class="navbar navbar-default title1">
 <a class="navbar-brand" href="#"><b>Give Your Feedback</b></a>
<!--navigation menu-->
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul>
         <li><div class="col-md-5 box col-md-offset-5">
             <?php
             include_once 'dbConnection.php';
            session_start();
              if(!(isset($_SESSION['email']))){
            header("location:index.php");
            }
            else
            {
            $name = $_SESSION['name'];
            $email=$_SESSION['email'];
            include_once 'dbConnection.php';
            echo '<span class="top"><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#userprofile">'."Hello,&nbsp;".$name.'</a></span></span>';
            }?>
          </div></li>
      </ul>        
    </div><!-- /.navbar-collapse -->
</nav>
<div class="bg3" style="padding-top: 0;background-image:url(image/1bg2.jpg);">
<div class="row" style="padding-bottom: .5%;">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background-image:url(image/bg1.jpg); min-height:400px;">
<h2 align="center" style="font-family:'typo'; color:#000066"> FEEDBACK / REPORT A PROBLEM </h2>
<div style="font-size:16px">
<?php if(@$_GET['q'])echo '<br><br><span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
<br />
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name :</b><br /><br /><br /><b>Subject :</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail address:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your email-id :" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="3" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';}?>
</div><!--col-md-6 end-->
<div class="col-md-3"></div></div>
</div></div>
</div><!--container end-->


<!-- Modal For User Profile-->
<?php 
$q=mysqli_query($con,"SELECT * FROM user WHERE email='$email' " )or die('Error231');
while ($row=mysqli_fetch_array($q) ) {
$name=$row['name'];
$gen=$row['gender'];
$college=$row['college'];
if($gen == 'M'){
  $gender="Male";
}else{
  $gender="Female";
}}
$q12=mysqli_query($con,"SELECT * FROM rank WHERE email='$email' " )or die('Error231');
while ($row=mysqli_fetch_array($q12) ) {
$score=$row['score'];
}
?>
<div class="modal fade title1" id="userprofile">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">User Profile</span></h4>
      </div>
      <div class="modal-body" style="padding: 2% 13%;">
    <div class="row">
      <p>
      <table class="table table-striped title1" style="font-size:20px;font-weight:1000;">
        <tr>
          <td>Name :</td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td>Gender :</td>
          <td><?php echo $gender; ?></td>
        </tr>
        <tr>
          <td>Email-id :</td>
          <td><?php echo $email; ?></td>
        </tr>
        <tr>
          <td>College :</td>
          <td><?php echo $college; ?></td>
        </tr>
        <tr>
          <td>Overall Score :</td>
          <td><?php echo $score; ?></td>
        </tr>
      </table>
  </div>
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Footer start-->
<div class="row footer">
<div class="col-md-4 box">
<a href="#" data-toggle="modal" data-target="#developers">Developers</a>
</div>
<div class="col-md-4 box">
<a href="account.php?q=1">Home</a>
</div>
<div class="col-md-4 box">
<a href="#" data-toggle="modal" data-target="#about">About Us</a>
</div></div>

<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
      </div>
      <div class="modal-body">
    <div class="row">
    <div class="col-md-5" style="text-align: center;">
     <img src="image/CAM00121.jpeg" width=150 height=170 alt="Trideep Das Modak" class="img-rounded">
     </div>
     <div class="col-md-5" style="text-align: center;"> <p>
      <h4 style="color:#202020; font-family:'typo' ;font-size:24px" class="title1">Trideep Das Modak</h4>
      <h4 style="color:#202020; font-family:'typo' ;font-size:20px" class="title1">+91 - 7031819055</h4>
      <h4 style="font-family:'typo' ;font-size:20px">Connect me at:</h4>
      <a href="https://github.com/trideepdasmodak" class="fa fa-github"></a>
      <a href="http://www.linkedin.com/in/trideepdm" class="fa fa-linkedin"></a>
      <a href="https://twitter.com/trideepdm" class="fa fa-twitter"></a>
      <a href="https://plus.google.com/u/0/106528753235677416638" class="fa fa-google-plus"></a></p>   
  </div></div>
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal For About us-->
<div class="modal fade title1" id="about">
  <div class="modal-dialog" style="width: 900px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">About Us</span></h4>
      </div>
      <div class="modal-body" style="width: 900px; padding: 1% 10%; padding-bottom: 5%;">  
      <div class="row" style="text-align: center;">
      <p><h4 style="color:#202020; font-family:'typo' ;font-size:30px; text-decoration: underline;" class="title1"> Online Examination System </h4>
      <h4 style="color:#202020; font-family:'typo' ;font-size:24px; text-align: left;" class="title1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Today Online Examination System has become a fast growing examination method because of its speed and accuracy. It is also needed less no of manpower to execute the examination. Almost all organization now a days, are conducting their objective exams with the help of online examination system, it saves students time in examinations. Organizations can also easily check the performance of the student that they give in an examination. As a result of this, organizations are releasing results in less time. It also helps the environment by saving paper. </h4></p>   
      </div>
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->

</body>
</html>
