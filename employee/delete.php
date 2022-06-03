<?php

if (isset($_POST["employeeId"]) && !empty($_POST["employeeId"])) {

    require_once "../config.php";


    $sql = "DELETE FROM employees WHERE employeeId = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $param_id);


        $param_id = trim($_POST["employeeId"]);


        if (mysqli_stmt_execute($stmt)) {


            header("location: employee.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }


    mysqli_stmt_close($stmt);


    mysqli_close($link);
} else {

    if (empty(trim($_GET["employeeId"]))) {

        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["employeeId"]); ?>" />
                            <p>Are you sure you want to delete this employee?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="employee.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>