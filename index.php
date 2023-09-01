<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- inter google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- bootstarp icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- for custom font -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

</head>

<body>
    <!-- backend -->
    <?php
    include 'dbconnect.php';
    
    if (isset($_POST['addtask'])) {
        $taskname = $_POST['taskname'];

        $sql = "INSERT INTO `todo`(`task`) VALUES(?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$taskname]);


        $taskadded = false;
        if (mysqli_stmt_execute($stmt)) {
            $alertmessage = "Your todo has been added.";
            $alertclass = "alert-success m-0";
        } else {
            $alertmessage  = "There was an error adding the todo, please try again!";
            $alertclass = "alert-danger m-0";
        }

        mysqli_stmt_close($stmt);
    }
    ?>
    <!-- alert message -->
    <?php if (isset($alertmessage)) { ?>
        <div class="alert <?php echo $alertclass; ?> alert-dismissible fade show" role="alert">
            <?php echo $alertmessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <!-- Form -->
    <form action="" method="post" class="">
        <div class="input-group">
            <input type="text" name="taskname" class="form-control form-control-lg shadow-none" placeholder="Enter your task here">
            <span class="input-group-text fs-5" id="basic-addon2">
                <input type="submit" value="Add Todo" name="addtask" class="btn">
                <!-- <i class="bi bi-plus-circle-fill"></i> -->
            </span>
        </div>
    </form>

    <!-- display todo's -->
    <?php
    include("../admin/dbconnect.php");

    $query = "SELECT * FROM todo";
    $result = mysqli_query($con, $query);
    while ($row = $result->fetch_assoc()) {
        echo "
        <form action='' class='d-flex justify-content-between bg-light p-3 border-bottom '>
            <div class='w-75 d-flex justify-content-start'>
                <div class='mx-2'>
                    <input class='form-check-input form-control form-control-lg'  type='checkbox'  id='flexCheckDefault'>
                </div>
                <div>
                    <input type='' class='shadow-none form-control form-control-lg' value='" . $row["task"] . "'>
                </div>
            </div>    
            <div class='w-25 d-flex justify-content-end '>
                <div>
                <button type='submit' class='btn' name='removetodo'><i class='bi bi-save-fill'></i></button>
                <button type='submit' class='btn' name='removetodo'><i class='bi bi-trash3'></i></button>
                </div>
            </div>      
        </form>";
    }
    ?>
</body>

</html>
