<?php // insert_API.php

    require_once '../login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sId=$_POST["sId"];
        $sAdder=$_POST["sAdder"];
        $sPhone=$_POST["sPhone"];
        //檢查帳號是否重複
        $check="SELECT * FROM store WHERE sId='".$sId."'";
        if(mysqli_num_rows(mysqli_query($conn,$check))==0){
            $sql="INSERT INTO store ( sId,sAdder, sPhone)
                VALUES('".$sId."','".$sAdder."','".$sPhone."')";
            
            if(mysqli_query($conn, $sql)){
                echo "註冊成功!3秒後將自動跳轉頁面<br>";
                echo "<a href='../HomePage.php'>未成功跳轉頁面請點擊此</a>";
                header("refresh:3;url=../HomePage.php",true);
                exit;
            }else{
                echo "Error creating table: " . mysqli_error($conn);
            }
        }
        else{
            echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
            echo "<a href='../HomePage.php'>未成功跳轉頁面請點擊此</a>";
            header('HTTP/1.0 302 Found');
            header("refresh:3;url=../HomePage.php",true);
            exit;
        }
    }


    mysqli_close($conn);

    // function function_alert($message) { 
        
    //     // Display the alert box  
    //     echo "<script>alert('$message');
    //     window.location.href='../test.php';
    //     </script>"; 
        
    //     return false;
    // } 
?>