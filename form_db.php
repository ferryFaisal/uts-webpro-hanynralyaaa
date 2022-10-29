<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Add Products</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        * .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // define variables and set to empty values
    $nameErr = $descErr = $priceErr = $photoErr = "";
    $name = $desc = $price = $photo = "";
    $valid_name = $valid_desc = $valid_price = $valid_photo = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["product_name"])) {
            $nameErr = "Name is Required";
            $valid_name = false;
        } else {
            $name = test_input($_POST["product_name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $valid_name = false;
            } else {
                $valid_name = true;
            }
        }

        if (empty($_POST["product_description"])) {
            $descErr = "Description is Required";
            $valid_desc = false;
        } else {
            $desc = test_input($_POST["product_description"]);
            $valid_desc = true;
        }

        if (empty($_POST["product_price"])) {
            $priceErr = "price is Required";
            $valid_price = false;
        } else {
            $price = test_input($_POST["product_price"]);
            $valid_price = true;
        }

        if (empty($_POST["photo"])) {
            // $photoErr = "Photo is required";
        } else {
            $photo = test_input($_POST["photo"]);
            $valid_photo = true;
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Form Name -->
        <br><br>
        <h2 class="fw-bold text-center mb-5">ADD PRODUCT</h2>
        <br><br>
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">NAME</label><span class="error">* <?php echo $nameErr; ?></span>
            <div class="col-md-4">
                <input id="product_name" name="product_name" class="form-control input-md" type="text" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">DESCRIPTION</label><span class="error">* <?php echo $descErr; ?></span>
            <div class="col-md-4">
                <textarea class="form-control" id="product_description" name="product_description" value="<?php echo $desc; ?>"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="product_price">PRICE</label><span class="error">* <?php echo $priceErr; ?></span>
            <div class="col-md-4">
                <input id="product_price" name="product_price" class="form-control input-md" type="text" value="<?php echo $price; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">PHOTO</label><span class="error">* <?php echo $photoErr; ?></span>
            <div class="col-md-4">
                <!-- <input id="filebutton" name="filebutton" class="input-file" type="file"> -->
                <input type="file" accept="image/*" name="photo" onchange="loadFile(event)" value="<?php echo $photo; ?>">
                <img id="output" />
                <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                </script>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-danger">Add</button>
            </div>
        </div>
    </form>

    <?php
    if ($valid_name && $valid_desc && $valid_price && $valid_photo == true) {
        include 'insert_db.php';
    }
    ?>
</body>

</html>