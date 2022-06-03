<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: #2196F3;
            padding: 10px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="grid-container">
        <a href="./employee/employee.php">
            <div class="grid-item">Employee</div>
        </a>
        <a href="./employee/employee.php">
            <div class="grid-item">Manager</div>
        </a>
        <a href="./employee/employee.php">
            <div class="grid-item">Product</div>
        </a>
        <a href="./employee/employee.php">
            <div class="grid-item">Supplier</div>
        </a>
    </div>

</body>

</html>