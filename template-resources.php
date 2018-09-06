<?php
/*
  Template Name: Resources
 */
get_header();
?>
<!-- Page content will go here -->
<section class="innerpage-banner contact-banner">
    <div class="banner-inner">
        <div class="row banner-wrap">
            <div class="banner-wrap1">
                <?php $banner_text = get_post_meta(get_the_ID(), 'banner_text', true); ?>
                <h1><?php echo $banner_text; ?></h1>
            </div>
            <div class="banner-wrap2 col"></div>
            <div class="banner-wrap1 w-100">
                <?php
                $banner_description = get_post_meta(get_the_ID(), 'banner_description', true);
                echo '<p>' . $banner_description . '</p>';
                ?>
            </div>
        </div>
    </div>
</section>
<section class="sec-breadcrumb">
    <?php woocommerce_breadcrumb(); ?>
</section>
<section class="resource-1">


<div class="row position-relative">
        <div class="lineR"></div>
        <div class="head-1">

            <?php $section_1_title = get_post_meta(get_the_ID(), 'section_1_title', true); ?>
                        <h2><?php echo $section_1_title; ?></h2>
        </div>
        <!-- <div class="col line"></div> -->
    </div>



    <div class="w-100"></div>
    <div class="col-6 col-md-6 col-md-offset-3 text-center offset-3 ">
        <?php $section_1_description = get_post_meta(get_the_ID(), 'section_1_description', true); ?>
        <p><?php echo $section_1_description; ?></p>
<!-- <p>Lorem Ipsum is simply dummy text of the printing and Ipsum has been the industry's my text ever since the 1500s, when an unknown printer toext of the printing and Ipsum has beey texhen</p>
<p> an unknown printe of typok a galley of type and scrambled. standard dummy text ever since the 1500s, when an unknownprinter took a galley of type and scrambled.</p> -->
    </div>
    <div class="container">
        <div class=" d-flex justify-content-center re-tab-wrap">
            <ul class="nav nav-pills align-items-center re-tab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" data-rowid="4-axis-solutions">4th Axis Solution</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" data-rowid="5-axis-solutions">5th Axis Solution</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="pill" data-rowid="">Solutions for Machine Builders</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" data-toggle="pill" data-rowid="">Accessories</a> 
                </li>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="home-sec5-media">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <form class="form-inline" id="prodSearch">
                                <input type="text" class="search1" name="post_type" name="post_type" placeholder="Search">
                                <input type="hidden" name="taxonomy" id="taxonomy" value="">
                                <button type="submit" class="res-but">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="resource-2">
    <div class="container">
        <div class="row res-text">
            <div class="offset-1 col-6 text-center">
                <p class="ax">4 Axis Solution</p>
                <p class="rotary-1">CNC Rotary Table</p>
                <p class="rotary-2">Lorem Ipsum is simply dummy text of the printing and Ipsum</p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 col-md-10 col-xs-12 col-sm-10 mx-auto cnc-rotary">
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 151</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 170</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 201</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 251</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 321</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 401</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 500</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 631</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="resourcy-3">
    <div class="container">
        <div class="row res-text">
            <div class="offset-1 col-6 text-center">
                <p class="ax">4 Axis Solution</p>
                <p class="rotary-1">Rotary Production ystem</p>
                <p class="rotary-2">Lorem Ipsum is simply dummy text of the printing and Ipsum</p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 col-md-10 col-xs-12 col-sm-10 mx-auto cnc-rotary">
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 201</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 251</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
                <div class="d-flex  mb-1 example-parent">
                    <div class="p-2 flex-grow-1  col-example1">
                        <p>URH - 321</p>
                    </div>
                    <div class="p-2 col-example2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">Brochure</div>
                    <div class="p-2 col-example3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png">CADD Drawing</div>
                </div>
            </div>
        </div>
        <div class="btn-block text-center mt-5">
            <button type="button" class="btn btn-primary btn-lg text-center"><span>Know more</span></button>
        </div>
    </div>
</section>
<section class="resuource-4">
    <div class="container">
        <div class=" d-flex justify-content-center re-tab-wrap">
            <ul class="nav nav-pills align-items-center re-tab">
                <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#axissolution">4th Axis Solution</a> </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#axis">5th Axis Solution</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#machbul">Solutions for 
                        Machine Builders</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#access">Accessories</a> </li>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="axissolution">
                <div class="home-sec5-media">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <form class="form-inline ">
                                <input type="search" class="search1" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="axis">
                <div class="home-sec5-media">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <form class="form-inline ">
                                <input type="search" class="search1" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="machbul">
                <div class="home-sec5-media">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <form class="form-inline">
                                <input type="search" class="search1" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="access">
                <div class="home-sec5-media">
                    <div class="row">
                        <div class="col-sm-6 mx-auto">
                            <form class="form-inline ">
                                <input type="search" class="search1" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
