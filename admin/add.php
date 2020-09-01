<?php
session_start();
if ($_SESSION['login'] != "true") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/bootstrap-better-nav.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Muniversiti</title>
</head>

<body>
    <section id="form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php
                    include "../includes/conn.php";
                    if (isset($_POST['submit'])) {
                        $date = $_POST['date'];
                        $title = $_POST['title'];
                        $body = $_POST['body'];

                        $root_path = "/opt/lampp/htdocs/muniversiti/";

                        if ($date == "" || $title == "" || $body == "") {
                            echo '<h2 style="color: red">Please fill the form!</h2>';
                        } else {
                            if (!empty($_FILES['img'])) {
                                $image_name = time() . "_" . $_FILES['img']['name'];
                                $destination = $root_path . "img/blog/" . $image_name;
                                $result = move_uploaded_file($_FILES['img']['tmp_name'], $destination);
                                if ($result) {
                                    $sql = "INSERT INTO blog(date, title, body, img) VALUE('$date', '$title', '$body', '$image_name')";
                                    if (mysqli_query($conn, $sql)) {
                                        echo '<h3 style="color: green">Entry inserted!</h3>';
                                    } else {
                                        echo "inside";
                                        echo '<h3 style="color: red">Entry was not inserted!</h3>';
                                    }
                                }
                            } else {
                                echo '<h3 style="color: red">Entry was not inserted!</h3>';
                            }
                        }
                    }
                    ?>
                    <h2>Enter details</h2>
                    <form action="add" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="date" name="date" placeholder="Date">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" cols="30" rows="9" placeholder="Body"></textarea>
                            <p>Separate paragraphs with tilde (~)</p>
                        </div>
                        <div class="form-group">
                            <label for="img">Select image</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <input type="submit" name="submit" value="submit" class="button hvr-sweep-to-top">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>