  <?php include_once "layout/header.php";?>    

    <!-- Navigation -->
    <?php include_once "layout/nav.php";?>       

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    News Site
                    <small>2020 Internship</small>
                </h1>

            <?php 
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }else{
                header('location:index.php');
            }

            include_once"../db.php";
            $query="SELECT * FROM new WHERE id='$id'";
            $data=mysqli_query($connect,$query);
            foreach ($data as $value) {
                # code...

            ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $value['title']?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $value['author']?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $value['date']?></p>
                <hr>
                <img class="img-responsive" src="../photo/<?php echo $value['image']?>" alt="">
                <hr>
                <p><?php echo $value['content']?></p>
                
                <hr>

            <?php
            }
            ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="position:sticky;top:60px;">

              <?php include_once "layout/sidebar.php";?>  

            </div>

        </div>
        <!-- /.row -->

        <hr>

 <?php include_once "layout/footer.php";?> 
