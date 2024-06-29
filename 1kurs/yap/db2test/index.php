<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap.css -->
    <link rel ="stylesheet" href="http://yap.kka1.ru/bootstrap/css/bootstrap.css"> 
    <!-- Bootstrap Font Icon css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap JavaScript (Popper.js и Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document2</title>
</head>
<body>

<?php
$conn = new PDO("mysql:host=localhost;dbname=j19458505_univ", "j19458505_a", "23112004");

// Удаление записи
if (isset($_GET["delete"])) {
    $sql = "DELETE FROM mydb WHERE id = ?";
    $query = $conn->prepare($sql);
    $query->execute([$_GET["delete"]]);
}

// Добавление записи
if (isset($_POST["ageavit"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];

    $sql = "INSERT INTO mydb (name, age, salary) VALUES (?, ?, ?)";
    $query = $conn->prepare($sql);

    if ($query->execute([$name, $age, $salary])) {
        echo "Запись успешно добавлена.";
    } else {
        echo "Ошибка при добавлении записи: " . print_r($query->errorInfo(), true);
    }
}

if (isset($_GET["update"])) {
    $sql = "UPDATE mydb SET name = :name, age = :age, salary = :salary WHERE mydb.id = :id";
    $query = $conn->prepare($sql);
    $query->execute(['name' => $_GET["name"], 'age' => $_GET["age"], 'salary' => $_GET["salary"], "id"=> $_GET["row_number"]]);
}

// Выборка данных
$sql = "SELECT * FROM mydb";
$result = $conn->query($sql);

echo '<table class="table">
        <thead class="thead-dark">
            <tr><th>id</th><th>name</th><th>age</th><th>salary</th><th>Actions</th></tr>
        </thead>
        <tbody>';

while ($row = $result->fetch()) {
    echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["age"] . "</td>
            <td>" . $row["salary"] . "</td>
            <td>
                <form action='index.php' method='get'>
                    <input type='hidden' name='delete' value=" . $row["id"] . ">
                    <button type='submit' class='btn btn-danger'>
                        <i class='bi bi-trash'></i>
                    </button>
                </form>
            </td>
            <td>
                <button type='button' class=btn btn-primary' data-bs-toggle='modal' data-bs-target='#red_chel_".$row["id"]."'>
                    <i class='bi bi-pen'></i>
                </button>

                <div class='modal fade' id='red_chel_" . $row["id"] . "' tabindex=*-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <form action = 'index.php' method = 'get'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>red_chel_" . $row["name"] . "</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal’ aria-label=’Закрыть'></button>
                            </div>
                            <div class='modal-body'>
                                <label class='sr-only' for='name'>Name</label>
                                <input type='text' class='form-control' name='name' id = 'name' value = '" . $row["name"] . "'>
                                <label class='sr-only' for='name'>Name</label>
                                <input type='text' class='form-control' name='age' id = 'age' value = '" . $row["age"] . "'>
                                <label class='sr-only' for='name'>Name</label>
                                <input type='text' class='form-control' name='salary' id = 'salary' value = '" . $row["salary"] . "'>
                            </div>
                            <div class='modal-footer'>
                                <input type = 'hidden' name = 'update' value = '1'>
                                <input type = 'hidden' name = 'row_number' value = '" . $row["id"] . "'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>3aкрыть</button>
                                <button type='submit' class='btn btn-primary'>Сохранить изменения</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>";
}

echo "</tbody></table>";
?>

<!-- Кнопка для открытия модального окна -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRecordModal">
  Добавить запись
</button>

<!-- Модальное окно для добавления записи -->
<div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Форма для добавления записи -->
        <form action="index.php" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="age" name="age" required>
          </div>
          <div class="mb-3">
            <label for="salary" class="form-label">Зарплата:</label>
            <input type="text" class="form-control" id="salary" name="salary" required>
          </div>
          <button type="submit" class="btn btn-primary" name="ageavit">Добавить</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>