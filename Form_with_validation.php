<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nameError = $emailError = "";
        $name = $email = $message = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST['name'])){
                $nameError = "Name is mandatory";
            }
            else{
                //data collect
                $name = test_input($_POST['name']);

                // check if name only contains letters and emptyspaces
                if(!preg_match("/^[a-zA-Z-' ]*$/" , $name)){
                    $nameError = "Only letters allowed";
                }
            }
        }
        
        if(empty($_POST['email'])){
            $emailError = "Email is mandatory";

        }
        else{
            $email = test_input($_POST['email']);
            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $email = "Invalid email format";
            }
        }

        if(empty($_POST['message'])){
            $message = "";

        }
        else{
            $message = test_input($_POST["message"]);

        }


        function test_input($data){
            $data = trim($data);
            $data = striplashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <form>
        UserId: <input type="text" name="name">
        <span>*<?php echo $nameError;?></span> <br>

        Email: <input type="email" name="email"> 
        <span>*<?php echo $emailError;?></span> <br>

        Message: <textarea name="message" id="6" cols="24" rows="10"></textarea>
        <input type="submit" value="Submit">
        
    </form>

    
    
</body>
</html>