<?php 
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
session_start();

        if(isset($_POST['Username'])){
				//connection
                require('conn_drone.php');
                $dbconn = pg_connect($conn_drone) or die('Could not connect'); 
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
                  
				//query 
                  $sql="SELECT * FROM users Where id_user='".$Username."' and id_pass='".$Password."' ";
 
                  $result = pg_query($sql);
				
                  if(pg_num_rows($result)==1){
 
                      $row = pg_fetch_array($result);

                      echo  $row[0];
                      echo  $row[1];
                      echo  $row[8];
 
                      $_SESSION["UserID"] = $row[0];
                      $_SESSION["User"] = $row[1]." ".$row[2];
                      $_SESSION["Userlevel"] = $row[8];
 
                      if($_SESSION["Userlevel"]=="user"){  
                        Header("Location: form_input.php"); 
                      }

                      if($_SESSION["Userlevel"]=="admin"){  
                        Header("Location: form_admin.php"); 
                      }
 
                      // if ($_SESSION["Userlevel"]=="farmer"){   
                      //   Header("Location: user_page.php"); 
                      // }
 
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
 
        }else{
 
 
             Header("Location: form_login.php"); 
 
        }
        pg_close($dbconn);
