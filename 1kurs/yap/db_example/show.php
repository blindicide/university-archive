<?php
	try {
		$conn = new PDO("mysql:host=localhost;dbname=j19458505_univ", "j19458505_a", "23112004");
		$sql = "SELECT * FROM mydb";
		$result = $conn->query($sql);
		echo "<table><tr><th>Id</th><th>Name</th><th>Age</th><th>Salary</th></tr>";
		while ($row = $result->fetch()){
			echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["age"]."</td>";
				echo "<td>".$row["salary"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
		catch (PDOException $e) {
		echo "Database error: " . $e->getMessage();
		}
	