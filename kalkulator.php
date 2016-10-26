<HTML>
	<HEAD>
	</HEAD>
	<BODY>
		<form method="POST">
			A<input type="text" name="A"><br />
			B<input type="text" name="B"><br />
			+<input type="radio" name="opc" value="1">-<input type="radio" name="opc" value="2">*<input type="radio" name="opc" value="3">/<input type="radio" name="opc" value="4"><br />
			<input type="submit">
		</form>
		<?php
			$serwer='localhost';
			$uzytkownik='root';
			$haslo='';
			$polaczenie=mysql_connect($serwer, $uzytkownik, $haslo);
			if(!$polaczenie){
				die('Błąd połączenia: '.mysql_error());
			}
			else{
				echo"<br />".'połączenie z serwerem OK'."<br />";
			}
			if(@$_POST['opc']){
				$A=$_POST['A'];
				$B=$_POST['B'];
				if($_POST['opc']==1){
					$opc="+";
					$wynik=$A+$B;
					mysql_select_db("kakao") or die ("błąd wyboru bazy danych");
					echo "<br />";
					$query = "insert into matma(A, B, opc, wynik) values('".$A."','".$B."','".$opc."','".$wynik."')";
					$result = mysql_query($query) or die("błąd zapytania");
					$query1 = "select A,B,opc,wynik from matma;";
					$result2 = mysql_query($query1) or die("błąd zapytania");
					while ($row = mysql_fetch_array($result2)) {
					echo $row["A"].$row["opc"].$row["B"]."=".$row["wynik"]."<br />";
				}
				}
				else{
					if($_POST['opc']==2){
						$opc="-";
						$wynik=$A-$B;
						mysql_select_db("kakao") or die ("błąd wyboru bazy danych");
						echo "<br />";
						$query = "insert into matma(A, B, opc, wynik) values('".$A."','".$B."','".$opc."','".$wynik."')";
						$result = mysql_query($query) or die("błąd zapytania");
						$query1 = "select A,B,opc,wynik from matma;";
						$result2 = mysql_query($query1) or die("błąd zapytania");
						while ($row = mysql_fetch_array($result2)) {
						echo $row["A"].$row["opc"].$row["B"]."=".$row["wynik"]."<br />";
					}
					}
					else{
						if($_POST['opc']==3){
						$opc="*";
						$wynik=$A*$B;
						mysql_select_db("kakao") or die ("błąd wyboru bazy danych");
						echo "<br />";
						$query = "insert into matma(A, B, opc, wynik) values('".$A."','".$B."','".$opc."','".$wynik."')";
						$result = mysql_query($query) or die("błąd zapytania");
						$query1 = "select A,B,opc,wynik from matma;";
						$result2 = mysql_query($query1) or die("błąd zapytania");
						while ($row = mysql_fetch_array($result2)) {
						echo $row["A"].$row["opc"].$row["B"]."=".$row["wynik"]."<br />";
						}
						}
						else{
							if($_POST['opc']==4){
								$opc="/";
								$wynik=$A/$B;
								mysql_select_db("kakao") or die ("błąd wyboru bazy danych");
								echo "<br />";
								$query = "insert into matma(A, B, opc, wynik) values('".$A."','".$B."','".$opc."','".$wynik."')";
								$result = mysql_query($query) or die("błąd zapytania");
								$query1 = "select A,B,opc,wynik from matma;";
								$result2 = mysql_query($query1) or die("błąd zapytania");
								while ($row = mysql_fetch_array($result2)) {
								echo $row["A"].$row["opc"].$row["B"]."=".$row["wynik"]."<br />";
								}
							}
						}
					}
				}
			}
			mysql_close($polaczenie);
		?>
	</BODY>
</HTML>
