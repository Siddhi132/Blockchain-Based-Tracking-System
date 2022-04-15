<?php
$login=false;
$notlogin=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
require "dbconnect.php";

$AccountId=$_POST['AccountId'];
$Password=$_POST['Password'];

$sql2="SELECT * FROM `account` where AccountId='$AccountId'";

 $result2=mysqli_query($conn,$sql2);
 $num=mysqli_num_rows($result2);
 if($num == 1){
// echo "numm1";
// echo "$num";
while($row=mysqli_fetch_assoc($result2))
{
    // echo "hello";
    // echo $row['Password'];
    // echo $Password;
if($Password==$row['Password'])
{
    $login=true;
    session_start();

$_SESSION['login']=true;
$_SESSION['AccountId']=$AccountId;
// echo "Done";
// header("location: project_home.php");
}
else{
    $notlogin=true;
    // echo "Not done";
}
}
 }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/login_style.css">
    <title>Login</title>
</head>

<body>
<?php
if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!!</strong>Your login process done successfully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  if($notlogin){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Fail!!</strong>Your login process not done successfully Due to your email address not sign up or password must be wrong...
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }

  ?>

    <div class="d-flex justify-content-center align-items-center login-container">
        <form class="login-form text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="AccountId" name="AccountId">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="Password">
            </div>
            <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Password</label>
                </div>
                <!-- <a href="#">Forgot Password?</a> -->
            </div>
            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>