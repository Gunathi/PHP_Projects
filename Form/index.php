
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
<body>
    <div class="container-sm border p-4">
        <h1 class="text-center bg-primary p-2 rounded">Registration Form</h1>
        <form action="first.php" method="post" name="myForm">
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name: </label>
              <input type="text" class="form-control" id="firstName" name="firstName">
              <label for="lastName" class="form-label">Last Name: </label>
              <input type="text" class="form-control" id="lastName" name="lastName">
            </div>

            <div class="form-check">
                <p>Gender</p>
                <input class="form-check-input" type="radio" name="Gender" id="Male">
                <label class="form-check-label" for="Male">Male</label><br>
                <input class="form-check-input" type="radio" name="Gender" id="Female">
                <label class="form-check-label" for="Female">Female</label><br>
                <input class="form-check-input" type="radio" name="Gender" id="Others">
                <label class="form-check-label" for="Others">Others</label>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="phoneNo" class="form-label">Phone number: </label>
                <input type="number" class="form-control" id="phoneNo" name="phoneNo">
            </div>

            <button type="submit" class="btn btn-primary" onsubmit="return validateForm()">Submit</button>
          </form>
    </div>


    <?php

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['Gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNo = $_POST['phoneNo'];


        $conn = new mysqli('localhost','root','','formdb');
        if($conn -> connect_error){
            die('Connection failed : '.$conn->connect_error);
        }else {
            $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, password, phoneNo)
            values(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $phoneNo);
            $stmt->execute();
            echo "registration successfully...";
            $stmt->close();
            $conn->close();
        }

    ?>
    
<script src="script.js"></script>
</body>
</html>



    
  
