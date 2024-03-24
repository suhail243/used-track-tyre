<?php
include_once'database.class.php';
class user
{
public static function signup($user, $pass)
    {
        $option = ['cost'=> 9,  ];
        $pass = password_hash($pass,PASSWORD_BCRYPT,$option);
        // Get the database connection
        $conn = database::get_connect();

        $sql = "INSERT INTO `login_details` (`username`, `password`)
                VALUES ('$user', '$pass');";

        $result = false;

        if ($conn->query($sql) === TRUE) {
            $result = true;
            
        } else {
            $result = $conn->error; // Change $conn->result to $conn->error to get the error message
        }

        $conn->close();
        return $result;
    }
    public static function login($user,$pass)
    {
      $conn = database::get_connect();
      
    $sql = "SELECT * FROM `login_details` WHERE `username` = '$user'";
    $result = $conn->query($sql);
    if(!$result) 
    {
        echo "Error: " . $conn->error;
    } 
    else 
    {
    if($result->num_rows == 1) 
    {
        // Fetch the user data
        $rows = $result->fetch_assoc();
        if(password_verify($pass,$rows['password']))
            {
                 return $rows['username'];
            }
             else
            {  
                 return false;
            }
    } else 
    {
        echo "No user found with username: $user";
        return false;
    }
    }
    }
}
