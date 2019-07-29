<div id="overviews" class="section wb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2">
                <p class="lead">See a lot of interesting events and activities near you</p>
            </div>
        </div><!-- end title -->

        <hr class="invis">
<?php
    if (count($data)) {
        for ($i = 0; $i < count($data); $i++) {
            if (($i % 4) === 0) { ?>
                <div class="row">
            <?php
            }
            ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="course-item">
                    <!--div class="image-blog">
                        <img src="images/blog_1.jpg" alt="" class="img-fluid">
                    </div-->
                    <div class="course-br">
                        <div class="course-title">
                            <h2><?=$data[$i]->title?></h2>
                        </div>
                        <div class="course-desc">
                            <p><?=$data[$i]->description?></p>
                        </div>

                    </div>

                </div>
            </div><!-- end col -->


            <?php
            if ($i !== 0 && ($i % 3) === 0) { ?>
                </div><!-- end row -->
        <?php
                if ($i != count($data) -1 ) {
                    echo '<hr class="hr3"> ';
                }
            }

        }

    }

?>
        <br>
    </div><!-- end container -->
</div><!-- end section -->