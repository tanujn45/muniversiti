<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/header.php" ?>
</head>

<body>
    <?php include "includes/navbar.php" ?>
    <section id="blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" class="section">
                        <h3>02/12/24</h3>
                        <h1>Title of the blog</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla beatae unde quia ex molestias maiores, dolore velit ipsa veniam vero vitae recusandae assumenda itaque rem reiciendis! Quos neque, ea veniam, voluptas quasi perspiciatis, sapiente temporibus cumque id laboriosam excepturi ratione amet repudiandae iste illum aliquam dolor! Deleniti rem itaque soluta!...</p>
                        <a href="blogpost.php" class="button hvr-sweep-to-top">full article</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/ws.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section id="all-blogs">
        <?php
        include "includes/conn.php";
        $sql = "SELECT * FROM blog";
        $result = mysqli_query($conn, $sql);
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-lg-4">
                            <div class="mx-1 mb-5" data-aos="fadeUp">
                                <img src="img/blog/<?php echo $row['img'] ?>" alt="Blog_image" class="img-fluid">
                                <?php
                                $date = $row['date'];
                                $date = str_replace('-"', '/', $date);
                                $date = date("d/m/Y", strtotime($date));
                                ?>
                                <h2><?php echo $date ?></h2>
                                <h3><?php echo $row['title'] ?></h3>
                                <a href="blogpost.php?post=<?php echo $row['id'] ?>">View article ></a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center mb-5">
        <a href="" class="button hvr-sweep-to-top">Load more</a>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/scripts.php" ?>
</body>

</html>