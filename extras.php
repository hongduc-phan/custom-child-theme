<?php

function imgCarouselCode( $atts ) { ?>

	<?php
		extract(shortcode_atts( array(
                'img1' => $img1,  
                'img2' => $img2,  
                'img3' => $img3,  
 				'img4' => $img4,  
                'img5' => $img5,  
                'img6' => $img6, 
 				'img7' => $img7,  
                'img8' => $img8,  
                'img9' => $img9, 
                'img10' => $img10, 
            ), $atts ));
    ?>

	<div class="container my-4">

    <!--Carousel Wrapper-->
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo $img1; ?>" alt="First slide">
        </div>

        <?php if ($img2) { ?>
	        <div class="carousel-item">
	          <img class="d-block w-100" src="<?php echo $img2; ?>" alt="Second slide">
	        </div>
	    <?php } ?>

        <?php if ($img3) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img3; ?>" alt="Third slide">
        </div>
    	<?php } ?>

        <?php if ($img4) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img4; ?>" alt="">
        </div>
    	<?php } ?>

        <?php if ($img5) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img5; ?>" alt="">
        </div>
    	<?php } ?>

    	<?php if ($img6) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img6; ?>" alt="">
        </div>
    	<?php } ?>

    	<?php if ($img7) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img7; ?>" alt="">
        </div>
    	<?php } ?>

    	<?php if ($img8) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img8; ?>" alt="">
        </div>
    	<?php } ?>

    	<?php if ($img9) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img9; ?>" alt="">
        </div>
    	<?php } ?>

    	<?php if ($img10) { ?>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?php echo $img10; ?>" alt="">
        </div>
    	<?php } ?>

      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
      <ol class="carousel-indicators">
        <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="<?php echo $img1; ?>"
            class="img-fluid"></li>

		<?php if ($img2) { ?>
        <li data-target="#carousel-thumb" data-slide-to="1"><img class="d-block w-100" src="<?php echo $img2; ?>"
            class="img-fluid"></li>
        <?php } ?>

		<?php if ($img3) { ?>
        <li data-target="#carousel-thumb" data-slide-to="2"><img class="d-block w-100" src="<?php echo $img3; ?>"
            class="img-fluid"></li>
        <?php } ?>

		<?php if ($img4) { ?>
        <li data-target="#carousel-thumb" data-slide-to="3"><img class="d-block w-100" src="<?php echo $img4; ?>"
            class="img-fluid"></li>
        <?php } ?>

		<?php if ($img5) { ?>
        <li data-target="#carousel-thumb" data-slide-to="4"><img class="d-block w-100" src="<?php echo $img5; ?>"
            class="img-fluid"></li>
        <?php } ?>

		<?php if ($img6) { ?>
        <li data-target="#carousel-thumb" data-slide-to="5"><img class="d-block w-100" src="<?php echo $img6; ?>"
            class="img-fluid"></li>
        <?php } ?>

		<?php if ($img7) { ?>
        <li data-target="#carousel-thumb" data-slide-to="6"><img class="d-block w-100" src="<?php echo $img7; ?>"
            class="img-fluid"></li>
        <?php } ?>   

		<?php if ($img8) { ?>
        <li data-target="#carousel-thumb" data-slide-to="7"><img class="d-block w-100" src="<?php echo $img8; ?>"
            class="img-fluid"></li>
        <?php } ?>             

		<?php if ($img9) { ?>
        <li data-target="#carousel-thumb" data-slide-to="8"><img class="d-block w-100" src="<?php echo $img9; ?>"
            class="img-fluid"></li>
        <?php } ?>        

		<?php if ($img10) { ?>
        <li data-target="#carousel-thumb" data-slide-to="9"><img class="d-block w-100" src="<?php echo $img10; ?>"
            class="img-fluid"></li>
        <?php } ?>

      </ol>
    </div>
    <!--/.Carousel Wrapper-->

  </div>

<?php
}
add_shortcode( 'imgCarousel', 'imgCarouselCode');	