<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
        $message = $_POST['message'];
		

		if(!empty($firstName) && !empty($phone) && !is_numeric($lastName))
		{

			//save to database
			$user_id = random_num(5);
			$query = "insert into addiction (user_id,firstName,lastName,email,phone,gender,message) VALUES ('$user_id','$firstName',
            '$lastName','$email','$phone','$gender','$message')";

			mysqli_query($con,$query);

			header("Location: counselling4addiction.html");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-image:url(https://th.bing.com/th/id/R.640e844bb530732eddc7aad67e1935dc?rik=amrsLv1Obrckfg&riu=http%3a%2f%2fwww.michaelchiropractic.com%2fpicts%2fInsurance.jpg&ehk=rEk0bk2pSq5L6xbGUJpkKBgz0BqmIRyK32X%2f85YHl7g%3d&risl=&pid=ImgRaw&r=0);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        label {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #f5f5f5;
        }

        input,
        select,
        textarea {
            width: 60%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #cccccc99;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0d581f6b;
            color: #ffffff;
            cursor: pointer;
            font-size: 16px;
        }

        img {
            max-width: 25%;
            height: auto;
        }

        input[type="submit"]:hover {
            background-color: #ae6a6a;
        }
    </style>
</head>


<p class="caption" style="font-size: 35px; font-style: normal; text-align: center;" >Book an Appointment</p>
        <p class="caption" style="font-size: 20px; text-align: center;">Please fill out the form below to book an appointment.</p>

<body>
    <div class="container">
        

        <form action="#" method="post">
            
            <img src="logo.png" >
            <br> <br>
            <label for="firstName">Full Name:</label>
            <input type="text" id="firstName" name="firstName" required>

        

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="gender">Services needed:</label>
            <select id="Service" name="Service" required>
                <option value="">Select</option>
                <option value="Drug">Drug</option>
                <option value="male">Depression</option>
                <option value="female">Alcohol</option>
                <option value="other">Counselling</option>
               
            </select>

            <label for="message"> Service Required:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
