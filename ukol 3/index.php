ahoj
<?php 

session_start();

include_once("db_conn.php");

echo "<h1> Uživatelé </h1>";
 
 /* Checknutí jestli je přihlášení a dle toho vypíšu */
if($_SESSION["name"]){
    echo "<p>Jste přihlášen jako uživatel s nickem: <b> ".$_SESSION["name"]." </b></p> Chci se <a href='logout.php'> odhlásit </a>";
}
else 
    echo "<p style='float:left;padding-left:100px;'><a href='/add.php'>Vytvořit nového uživatele </a></p><p style='float:right;padding-right:100px;'><a href='/login.php'> Přihlásit se</a></p>";


$conn = mysqli_connect($servername,$username,$password,$db);
$sql = "SELECT * FROM uzivatele";
$result = mysqli_query($conn, $sql);
        $table = '
        <table style="width:100%" border="1" cellpadding="5" cellspacing="4">
		<tr>
            <th> ID </th>
            <th> Uživatel </th>
            <th> Poslední log </th>
        </tr>
        ';

		echo '
        <table style="width:100%" border="1" cellpadding="5" cellspacing="4">
		<tr>
            <th> ID </th>
            <th> Uživatel </th>
            <th> Poslední log </th>
        </tr>
        ';

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	  
   		echo "
		<tr>
			<td>".$row['id']."</td>
			<td>".$row["login"]."</td>
			<td>".$row["datum"]."</td>
		</tr>";
      
      $table .= "
		<tr>
			<td>".$row['id']."</td>
			<td>".$row["login"]."</td>
			<td>".$row["datum"]."</td>
		</tr>";
  }
} else {
  echo "0 results";
	
}
$table .= "</table>";
echo "</table>";


echo "<a href='/?export=xls'> Exportovat</a>";


/* Export do excelu */
if(!empty($_GET['export'])){
    header("Content-Disposition: attachment; filename=export.xls");
    header("Content-Type: application/vnd.ms-excel");

}


?>


   