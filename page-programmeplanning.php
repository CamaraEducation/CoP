<?php get_header();?>



<!--  Hero Section -->
    <section id="hero">
        <div class="hero-container" style="background: #993C9F; height: 295px;">
            <div class="col-xs-6 col-centered">
                <p class="directory-hero-text">Programme Planning</p>
            </div>
        </div>
    </section>
    <!-- #hero -->

    <section>
        <div class="container mt-5">
            <a href="" class="filter-text">Filter by </a>


               <?php
$tax_terms = get_terms( 'programme_planning_type', 'orderby=id');
//var_dump($tax_terms);
foreach ( $tax_terms as $term ) {
///loop though the types 
?>
 
            <div class="btn-group ml-2">
      <a href="#<?php echo  $term->name; ?>">        
        <button type="button" class="btn" style="border: 1px solid #3E4C59;box-sizing: border-box;border-radius: 100px;">
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
              
            <h2 class="headtitle"><?php echo $Ptype->name ?></h2>
            <hr>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p class="pass-desc">
                        <?php echo $Ptype->description; ?>
                        
                    </p>
                </div>
                <div class="col-md-9">

                    <div class="row">


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
      ?>        


                        <div class="card ml-2 mt-2" style="width:200px; background: #E6EEF3;border: none; margin-right: 12px;">

                           
                           <img class="card-img-top" src="<?php the_field('programme_cover'); ?>" alt="Card image cap">
                            <div class="card-body">
                                <p class="program-title"><?php the_title() ?></p>
                                <a href="<?php the_field('document_link'); ?>" class="download-card" target="new">Download PDF +</a><br>
                                <div class="badge card-badge1 mt-2"><?php echo $Ptype->name;?></div>
                            </div>
                        </div>
                        
        

                         <?php endforeach; ?>
                      </div>
</div>                
</section>

<?php endforeach; ?>


          
<?php get_footer();?>