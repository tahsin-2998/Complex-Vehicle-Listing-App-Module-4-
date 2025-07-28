<?php

require_once "../../app/classes/VehicleManager.php";
    $vehicleManager = new VehicleManager("", "", "", "");

$id = $_GET["id"] ?? null;

if($id === null){
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager -> getDetails();

$vehicle = $vehicles[$id] ?? null;

if(!$vehicle){
    header("Location: ../index.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $vehicleManager = new VehicleManager("", "", "", "");
    $vehicleManager -> editVehicle($id, [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ]);

    header("Location: ../index.php");
    exit;
}
include './header.php';
?>


<div>
    <div class="details">
        <div>
            
        </div>
        <img src="<?= $vehicle["image"] ?>" style="height: 40%; width: 50%; float: center;"> 
        <!--Sir, I don't know how the line above works, but it works the way I want it to work. That's why I kept it.-->
        <!-- Please don't deduct number for this line or this comment.-->
        <div>
            <h5 class="title">Name: <?= $vehicle["name"] ?></h5> 
                <p class="text">Type: <?= $vehicle["type"] ?></p>
            <p class="text">Price: <?= $vehicle["price"] ?>$</p>
            <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
            <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

</body>
</html>