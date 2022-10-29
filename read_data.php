<?php
require "database.php";

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Products</h2>
        <h6><a href="form_db.php">Add Product</a></h6>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Photo</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    //output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["name"]; ?></td>
                            <td><?= $row["description"]; ?></td>
                            <td><?= $row["price"]; ?></td>
                            <td><img src="UTS/<?= $row['photo'] ?>" width=" 120px" height="100px"></td>
                            <td><?= $row["created"]; ?></td>
                            <td><?= $row["modified"]; ?></td>

                            <td><a href='update_data.php?id=<?= $row['id'] ?>'>Edit</a> |
                                <a onClick="return confirm ('Are you sure?')" href='delete_data.php?id=<?= $row['id'] ?>'>Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
<?php
                }
                $conn->close();
?>
</body>

</html>