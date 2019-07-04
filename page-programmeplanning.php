<?php get_header();?>
<!--  Hero Section -->
<section id="hero">
    <div class="hero-container" style="background: #993C9F; height: 295px;opacity: 0.8">
        <div class="container" style="height:255px; background-image: url(<?php echo get_template_directory_uri();  ?>/images/dotback.png);">

            <div class="row h-100 w-100">
             <div class="col-sm-12 my-auto">
                <p class="directory-hero-text">Programme Planning</p>
            </div>
        </div>
    </div>
</div>
</section> 
<!-- #hero -->

<section>
    <div class="container mt-5">
        <a href="" class="filter-text">Jump to </a>


        <?php
        $tax_terms = get_terms( 'programme_planning_type', 'orderby=id');
//var_dump($tax_terms);
        foreach ( $tax_terms as $term ) {
///loop though the types 

            ?>

            <div class="btn-group ml-2">
              <a href="#<?php echo  $term->name; ?>">        
                <button type="button" class="btn dropdown-filter" style="border:<?php echo !empty($search_level) ? '':'1px solid #000000';?>" onMouseOver="this.style.borderColor='#993C9F'"  onMouseOut="this.style.borderColor='#000000'">
                    <?php echo $term->name; ?>
                </button>
                
            </a>
        </div>
        <?php
    }
    ?>

</div>
</section>


<?php // Output all Taxonomies names with their respective items
$programmePlanningType = get_terms('programme_planning_type');

foreach( $programmePlanningType as $Ptype ):
    ?>            


    <a name="<?php echo $Ptype->name ?>"></a>


    <section class="my-5">
        <div class="container">

            <h2 class="pptitle"><?php echo $Ptype->name ?></h2>
            <hr>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <p class="pass-desc">
                        <?php echo $Ptype->description; ?>
                        
                    </p>
                </div>
                <div class="col-md-10">

                    <div class="container">
                        <div class="card-deck">

                            <?php                         
                            $posts = get_posts(array(
                                'post_type' => 'programme_planning',

                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'programme_planning_type',
                                        'field' => 'name',
                                        'terms' => array($Ptype->name )
                                    )
                                ),

            'numberposts' => 6, // to show all posts in this taxonomy, could also use 'numberposts' => -1 instead
        ));

          foreach($posts as $post): // begin cycle through posts of this taxonmy
            setup_postdata($post); //set up post data for use in the loop (enables the_title(), etc without specifying a post ID)
            $docPathway_id = get_field('document_pathway');

            $docPathway = get_term_by( 'id', (int) $docPathway_id, 'pathway');


// load thumbnail for this taxonomy term
$pathwayColor = get_field('main_color', $docPathway->taxonomy . '_' . $docPathway->term_id);

            ?>       

            <div class="col-md-4" style="margin-bottom:30px;">
                <a href="<?php the_field('document_link'); ?>"  target="new">

                    <div class="card h-100 ppcard" style="width: 280px;"> 



                        <div class="download-card" id="download-card" style="background-image: url(<?php the_field('programme_cover');?>);
                        background-size:280px 368px;">

                            <div id="downloadhover" class="downloadhover"> 
                                <h2 class="downloadview" id="downloadview">
                                    View
                                </h2>

                            </div>
                        </div>

                        <div class="card-body">
                           <p class="ppbig"><?php the_title() ?></p>
                           <p class="ppsmall">Download PDF +</p>
                           <div class="badge card-badge1 mt-2" style="min-height: 16px; line-height:16px;"><?php echo $Ptype->name;?></div>

                           <?php  if ($docPathway->name != NULL) {
                            ?>

                            <span class="badge badge-primary" style="min-height: 16px; line-height:16px;background-color:<?php echo $pathwayColor;?>"> <?php  echo $docPathway->name ?></span>



                        <?php }
                        ?>
                    </div>

                </div>
            </a>
        </div>

    <?php endforeach; ?>
</div>
</div>          
</div>
</div>
</div>
</div>
</section>

<?php endforeach; ?>

<?php get_footer();?>