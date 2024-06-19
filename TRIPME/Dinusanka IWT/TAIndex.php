<!DOCTYPE html>
<html>
<head>
  <title>Tour Agent Sign Up Page</title>
  <link rel="stylesheet" type="text/css" href="Styles/TAstyles.css">
</head>
<body>
  <div class="container">
    <h1>Tour Agent</h1>
    <form action=" TAConnect.php" method="post">
      
      <div class="inputs">
                      <label for="first_name">First Name:</label>
                      <input type="text" id="first_name" name="first_name"  required>
                      
                      <label for="last_name">Last Name:</label>
                      <input type="text" id="last_name" name="last_name" required>
                      
                      <label for="phone_number">Phone Number:</label>
                      <input type="text" id="phone_number" name="phone_number" required>
                      
                      <label for="email">Email Address:</label>
                      <input type="email" id="email" name="email" required>
                      
                      <label for="age">Age:</label>
                      <input type="number" min="18" id="age" name="age" required>
                      
                      <label for="gender">Gender:</label>
                          <div class="radio-group">
                              <input type="radio" id="male" name="gender" value="male" required>
                              <label for="male">Male</label>
                            
                              <input type="radio" id="female" name="gender" value="female" required>
                              <label for="female">Female</label>
                          
                          </div>
                      
                      
                      
      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4" required></textarea>
      
      <label for="number_plate">Number Plate:</label>
      <input type="text" id="number_plate" name="number_plate" required>
      
      <label for="vehicle_type">Vehicle Type:</label>
      <select id="vehicle_type" name="vehicle_type" required>
        <option value="">Select Vehicle Type</option>
        <option value="Hotel">Tuk Tuk</option>
        <option value="Apartment">Car</option>
        <option value="Guest House">Van</option>
        <option value="Resort">Bus</option>
      </select>
        <label for="license_number">Driving License Number:</label>
        <input type="text" id="license_number" name="license_number" required>

      </select>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required>
      <div class="pw">
                            <p>Password has to at least 8 characters long</p>
                            <p>Password should contains at least one uppercase letter</p>
                            <p>Password should contains at least one lowercase letter</p>
                            <p>Password should contains at least one number</p>
                            <p>Password should contains at least one special character</p>
                </div>
      <div class="account">
                           <center> <p>Already have an account       <a href ="log.php">Log in</a></p></center>
                </div>
                
      <div class="button"> 
        <button name ="submit" type="submit" >Sign Up</button>
       </div>
    </form>
  </div>
</body>
</html>