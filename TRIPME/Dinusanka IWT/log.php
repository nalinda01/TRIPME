<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="Styles/styleslog.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <div class="form">
    <form action="Includes/pw_Connection.php" method="post">
      <label for="username" Place-holder="E-mail">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password" Place-holder="Password">Password:</label>
      <input type="password" id="password" name="password" required>
    </div>
                  <div class="radio-group">
                <input type="radio" id="option1" name="options" value="option1">
                <label for="option1">Tourist</label>

                <input type="radio" id="option2" name="options" value="option2">
                <label for="option2">Accommodation Provider</label>

                <input type="radio" id="option3" name="options" value="option3">
                <label for="option3">Tour Agent</label>

                <input type="radio" id="option4" name="options" value="option4">
                <label for="option4">Tour Guide</label>
              </div>
        <div class="button"> 
        <button name ="submit" type="submit" >Sign in</button>
       </div> 
       <div class="remember">
                          <label><input type="checkbox" name ="remember">Remember Me      <a href="../Movindu IWT/help.php">Forget Password</a></label>
                        </div>
                        <div class="register">
                            <p>Don't have an account      <a href ="signup.php">Sign Up</p></a>
                </div>
    </form>
  </div>
</body>
</html>