<?php

require_once "../config.php";


$name = $phone = $address = $DOB = $salary = "";


if (isset($_POST["employeeId"]) && !empty($_POST["employeeId"])) {

    $id = $_POST["employeeId"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $DOB = $_POST["DOB"];
    $salary = $_POST["salary"];
    $address = $_POST["address"];


    $sql = "UPDATE employees SET name=?, phone=?, address=?, DOB=?, salary=? WHERE employeeId=?";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_phone, $param_address, $param_DOB, $param_salary, $param_id);


        $param_name = $name;
        $param_phone = $phone;
        $param_address = $address;
        $param_DOB = $DOB;
        $param_salary = $salary;
        $param_id = $id;


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

    if (isset($_GET["employeeId"]) && !empty(trim($_GET["employeeId"]))) {

        $id =  trim($_GET["employeeId"]);


        $sql = "SELECT * FROM employees WHERE employeeId = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $param_id);


            $param_id = $id;


            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["name"];
                    $phone = $row["phone"];
                    $address = $row["address"];
                    $DOB = $row["DOB"];
                    $salary = $row["salary"];
                } else {

                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }


        mysqli_stmt_close($stmt);


        mysqli_close($link);
    } else {

        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class=" wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                        </div>


                        <div class="form-group">
                            <label>DOB</label>
                            <input type="text" name="DOB" class="form-control" value="<?php echo $DOB; ?>">
                        </div>

                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                        </div>

                        <input type="hidden" name="employeeId" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="employee.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>