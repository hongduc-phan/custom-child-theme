<?php 
    global $niletheme_option;
?>

<footer class="layout-dark">
    <?php if($niletheme_option['niletheme-footer-widget'] == '1'){ ?>
    <div class="output">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4 sm-mb-40px">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>

                <div class="col-lg-4 col-md-4 sm-mb-40px">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
                
                 <div class="col-lg-4 col-md-4 sm-mb-40px">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>

                <div class="col-lg-12 col-md-12" style="margin-top: 58px;">
                    <div class="copy-right-text text-center sm-mb-15px">
                        <p style="color: #fff;">© <?php echo date("Y"); ?> Orima-Tuote Oy</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php } ?>

</footer>