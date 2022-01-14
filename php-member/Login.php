<?php // query_API.php
    require_once '../login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    // Define variables and initialize with empty values
    $sId=$_POST["sId"];
    $sPhone=$_POST["sPhone"];
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM store WHERE sId ='".$sId."'";
        $result=mysqli_query($conn,$sql);
        $row=$result ->fetch_assoc();
        if(mysqli_num_rows($result)==1 &&$row['sPhone']==$sPhone){
            session_start();
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            //這些是之後可以用到的變數
            $_SESSION["sId"] = $row["sId"];
            $_SESSION["sPhone"] = $row["sPhone"];
            $_SEESION["sAdder"] = $row["sAdder"];
            header("location:../store.php");
        }else{
                function_alert("帳號或密碼錯誤"); 
            }
    }
        else{
            function_alert("Something wrong"); 
        }

        // Close connection
        mysqli_close($link);

    function function_alert($message) { 
        
        // Display the alert box  
        echo "<script>alert('$message');
        window.location.href='../HomePage.php';
        </script>"; 
        return false;
    } 
?>
