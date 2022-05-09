<?php 
require_once '../model/model.php';
require_once '../model/Stor.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        // $stors = new Stor();
        // $data = $stors->select()->get();
        // print_r(json_encode($data));
    ?>

    <form action="http://iug.lact/Markets/controller/api/LoginController.php?m=user" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>




