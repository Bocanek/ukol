<?php 

session_start();

if (isset($_POST['nahrat'])){
	
include_once("db_conn.php");

// Check connectio
if ($spojeni = mysqli_connect($servername,$username,$password,$db)->connect_error) {
  die("Connection failed");
}

// Check correction - check password and login with datas form database
	$login = $_POST['jmeno'];
	$heslo = $_POST['heslo'];
    
    $conn = mysqli_connect($servername,$username,$password,$db);
    
    $sql = "SELECT * FROM uzivatele WHERE login='$login' AND heslo = '$heslo'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    if(is_array($row)){
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['login'];
    }
    else{
        $message = "Invalid login;"; //bonus #1
    }
    
    /* Bonus #2 */
	$datum = strftime("%Y-%m-%d %H:%M:%S",time());
    mysqli_query(mysqli_connect($servername,$username,$password,$db),"UPDATE uzivatele SET datum = '$datum' WHERE login='$login' AND heslo = '$heslo'") or die("PŘI aktualizaci přihlašování došlo k chybě");
    
    if(isset($_SESSION["id"])) header("Location: /");
	
}


?>

<h1>Přihlásit se</h1>
<form action="?" method="post" enctype="multipart/form-data">
			
			<p><label for="jmeno">Login : </label>
			<input type="text" id="jmeno" name="jmeno" required></p>
            
            <p><label for="heslo">Heslo : </label>
			<input type="password" id="heslo" name="heslo" required></p>
			
			<p><input type="submit" value="Přihlásit" name="nahrat" id="nahrat"></p> 
    
</form>
<?php 
    if(!empty($message)) echo $message;
?>
		<a href='/'>Zpět</a>