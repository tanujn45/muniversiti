<?php
session_start();
if ($_SESSION['login'] != "true") {
    header("Location: login");
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
    $sql = "select id, title from blog";
    $result = mysqli_query($conn, $sql);
    ?>
    <section id="form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3>Current entries</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        if ($id == "") {
                            echo '<h3 style="color: red">Enter the id!</h3>';
                        } else {
                            $sqlDel = "delete from blog where id = $id";
                            $resultDel = mysqli_query($conn, $sqlDel);
                            if (mysqli_affected_rows($conn) == 1) {
                                echo '<h3 style="color: green">Record deleted! Refresh the page.</h3>';
                            } else {
                                echo '<h3 style="color: red">Record does not exist!</h3>';
                            }
                        }
                    }
                    ?>
                    <h3>Enter id to delete</h3>
                    <form action="delete" method="post">
                        <div class="form-group">
                            <input class="form-control" type="number" name="id" placeholder="Id">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-center">
                                <input type="submit" name="submit" class="button" value="DELETE">
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