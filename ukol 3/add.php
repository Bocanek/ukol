<?php 



if (isset($_POST['nahrat'])){
	
include_once("db_conn.php");

// Check connection
if ($spojeni = mysqli_connect($servername,$username,$password,$db)->connect_error) {
  die("Connection failed");
}
else
    echo "ok";

    
	$login = $_POST['jmeno'];
	$heslo = $_POST['heslo'];

	$datum = strftime("%Y-%m-%d %H:%M:%S",time());
    
    mysqli_query(mysqli_connect($servername,$username,$password,$db),"INSERT INTO uzivatele (login,heslo,datum) VALUES ('$login','$heslo','$datum')")
	or die("PŘI ZÁPISU uživatele došlo K CHYBĚ");
	
	header("Location: /?uzivatel=pridan");
}


?>

<h1> Vytvořit nového uživatele</h1>
<form action="?" method="post" enctype="multipart/form-data">
			
			<p><label for="jmeno">Loign : </label>
			<input type="text" id="jmeno" name="jmeno" required></p>
            
            <p><label for="heslo">Heslo : </label>
			<input type="text" id="heslo" name="heslo" required></p>
			
			<p><input type="submit" value="Přidat uživatele" name="nahrat" id="nahrat"></p> 
    
</form>
		<a href='/'>Zpět</a>