<?php
    //Session Related Code
    require_once("../session.php");

try {
    
//Checking For Sumbtion
if (!empty($_GET['userId']) or !($_GET['userId']<1)) {

    $id=$_GET['userId'];
    $cn=new mysqli("localhost",'root','',"ecom");
    $SQL="select itemsInCart from users where id=$id And active=1";
    
    $r=$cn->query($SQL);
    $data=$r->fetch_row();
   

    // //Define the query
    $SQL=" update users set itemsInCart=0
    where `id`=$id";
    
    // echo $SQL;
    //Query The Database
    $cn->query($SQL)?
    //If true do this
    print("Inserted"):
    //If Not do this
    print("Not Inserted");
    
    //Close Connection
    mysqli_close($cn);
    if ($_SESSION['admin']) {
        header("Location:viewUsers.php");
    }else {
        header("Location:viewUser.php");
    }
}

} catch (Throwable $th) {
    l1:echo "
    <h1>ERROR</h1>
     <h1>오류</h1>
     <h1>エラー</h1>
     <h1>错误</h1>
     ";
  }
?>
