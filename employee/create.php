<?php

require_once "../config.php";

$name = $phone = $address = $DOB = $salary = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $sql = "INSERT INTO employees (name, phone, address, DOB, salary) VALUES (?, ?, ?, ?,?)";

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_phone,  $param_address, $param_DOB,  $param_salary);

        $param_name = $name;
        $param_phone = $phone;
        $param_address = $address;
        $param_DOB = $DOB;
        $param_salary = $salary;

        if (mysqli_stmt_execute($stmt)) {

            header("location: employee.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Add new employee</h2>
                    <p>Please fill this form and submit to add employee record to the SM System.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="employee.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>