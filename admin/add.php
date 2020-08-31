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
    <?php
    include "../includes/conn.php";
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $title = $_POST['title'];
        $body = $_POST['body'];
        $img = $_FILES['img'];
        if ($logo == "" || $name == "" || $about == "" || $img == "") {
            echo '<h2 style="margin-bottom: -40px; color: red">Please fill the form!</h2>';
        } else {
            $sql = "insert into work(logo, name, about, img) value('$logo', '$name', '$about', '$img')";
            if (mysqli_query($conn, $sql)) {
                echo '<h2 style="margin-bottom: -40px; color: green">Entry inserted!</h2>';
            } else {
                echo '<h2 style="margin-bottom: -40px; color: red">Entry was not inserted!</h2>';
            }
        }
    }
    ?>

    <section id="form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Enter details</h2>
                    <form action="add.php" method="post" enctype="multipart/form-data">
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