<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/header.php" ?>
</head>

<body>
    <?php include "includes/navbar.php" ?>

    <section id="blogpost">
        <div class="container">
            <?php
            if (isset($_GET['post'])) {
                $id = $_GET['post'];
            } else {
                header("Location: blog");
            }
            include "includes/conn.php";
            $sql = "SELECT * FROM blog WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="section">
                        <div class="float-right pl-3">
                            <img src="img/blog/<?php echo $row['img'] ?>" class="img-fluid img-rounded" alt="">
                        </div>
                        <div class=" p-3">
                            <?php
                            $date = $row['date'];
                            $date = str_replace('-"', '/', $date);
                            $date = date("d/m/Y", strtotime($date));
                            ?>
                            <h2><?php echo $date ?></h2>
                            <h3><?php echo $row['title'] ?></h3>
                            <?php
                            $body = explode('~', $row["body"]);
                            foreach ($body as $para) {
                            ?>
                                <p><?php echo $para ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <?php include "includes/footer.php" ?>
    <?php include "includes/scripts.php" ?>
</body>

</html>