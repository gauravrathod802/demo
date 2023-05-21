

<!-- edited one -->
<?php

    $servername= "localhost:3306";
    $usernamed = "root";
    $passwords = "12345";
    $dbname = "FinalProject";
	

    
$errorMsg = $successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Could not connect: " . mysqli_connect_error());
  }

  $FirstName = $_POST['FirstName'] ?? '';
  $LastName = $_POST['LastName'] ?? '';
  $Email = $_POST['Email'] ?? '';
  $Password = $_POST['Password'] ?? '';
  $PhoneNumber = $_POST['PhoneNumber'] ?? '';
  $DOB = $_POST['DOB'] ?? '';
  $City = $_POST['City'] ?? '';
  $State = $_POST['State'] ?? '';

  $query = "INSERT INTO signup (FirstName, LastName, Email, Password, PhoneNumber, DOB, City, State) 
            VALUES ('$FirstName', '$LastName', '$Email', '$Password', '$PhoneNumber', '$DOB', '$City', '$State')";

  if (mysqli_query($conn, $query)) {
    session_start();
    $successMsg = "Records added";
    $_SESSION['FirstName'] = $FirstName;
    $_SESSION['loggedin'] = true;
  } else {
    $errorMsg = "ERROR: Could not execute query: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign up</title>
  <link rel="stylesheet" href="Signup.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <div class="signup-image">
      <img src=".\Images\signUp.jpeg" height="722px" width="950px">
    </div>
    <div class="signup-box">
      <h1>SIGN UP</h1>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="name-fields">
          <div class="input-field">
            <label for="FirstName">First Name</label>
            <input type="text" placeholder="enter firstname" id="FirstName" name="FirstName" />
          </div>
          <div class="input-field">
            <label for="LastName">Last Name</label>
            <input type="text" placeholder="enter lastname" id="LastName" name="LastName" />
          </div>
        </div>

        <div class="input-field">
          <label for="Email">Email</label>
          <input type="email" placeholder="enter email" id="Email" name="Email" />
        </div>

        <div class="input-field">
          <label for="Password">Password</label>
          <input type="password" placeholder="enter password" id="Password" name="Password" />
        </div>

        <div class="input-field">
          <label for="PhoneNumber">Phone Number</label>
          <input type="tel" placeholder="enter phonenumber" id="PhoneNumber" name="PhoneNumber" />
        </div>

        <div class="input-field">
          <label for="DOB">DOB</label>
          <input type="date" placeholder="enter dob" id="DOB" name="DOB" />
        </div>

        <div class="name-fields">
          <div class="input-field">
            <label for="City">City</label>
            <input type="text" placeholder="enter city" id="City" name="City" />
          </div>
          <div class="input-field">
            <label for="State">State</label>
            <input type="text" placeholder="enter state" id="State" name="State" />
          </div>
        </div>

        <input type="submit" id="signup" value="Submit" />

  </form>
  <div id="error1" style="color:red;"><?php echo $errorMsg; ?></div>
  <div id="successMsg" style="color:green;"><?php echo $successMsg; ?></div>

  <p class="para-2">Already have an account? <a href="login.html">Login here</a></p>


</div>
  </div>
</body>
</html>
