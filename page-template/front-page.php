<?php
// Déclaration des variables

global $wp_query;
$args = $wp_query -> query_vars; 
$args ['post_type'] = 'post';

$metaquery = array(); 


$args['meta_query'] = $metaquery;

$myquery = new WP_Query($args);

$wp_query = $myquery;

$post_number = $myquery -> found_posts;


?>

<div class="position-relative p-3 p-md-5  overflow-hidden header-image">
   <!-- header image-->
</div>

<div class="container">
    <h1 class="explorez">Nos offres d'emploi</h1>
</div>

<!-- Filigrane gauche -->

<div class="position-relative">
    <div class="single-bg-left position-absolute top-0 start-0 translate-middle-x">
    </div>
</div>
<div class="position-relative">
    <div class="single-bg-left-green position-absolute top-0 start-0 translate-middle-x">
    </div>
</div>


<!-- Affichage poste -->

<div class="container">
				<?php if ( $myquery->have_posts() ) : ?>
					<div class="row mb-3">
					<?php  
					while ( $myquery->have_posts() ) : $myquery->the_post(); 
                    
                    $postid = get_post_custom_values('job_id')[0];
                    $postcontract = get_post_custom_values('job_contract_type')[0];
                    $postlocation = get_post_custom_values('job_location')[0];
                    $postactivite = get_post_custom_values('custom_secteur_d\'activite')[0];
                    $postlink = get_post_custom_values('job_link')[0];
                    
                    ?>

						 <!-- Affichage des posts -->
						
        				<div class="col-md-12 col-lg-6 col-xxl-4 mb-5">
                                        <div class="block-offre mb-4 position-relative">
                                            <div class="row align-items-center">
                                                <div class="col-1">
                                                            
                                                </div>
                                                <div class="col-11"><div>		
                                                    <div class="row mt-2">
                                                            <h4 class="mt-3"> 
                                                                <?= the_title_attribute(); ?>
                                                            </h4>	               
                                                    </div>
                                                        <div class="row">
                                                            <h4 class="date-offre mt-3"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-muted font-italic">Publiée le <?php echo get_the_date();?></span></h4>

                                                            <?php affichage_localisation($postlocation); ?>

                                                            <h4 class="type-offre mt-3 mb-4"><i class="fa fa-briefcase" aria-hidden="true"></i>  <?php echo $postcontract?></h4>
                                                        </div>
                                                    </div>    
                                                    <hr class="featurette-divider mb-4">         
                                                    <div class="col-12 text-center">
                                                        <a href="<?php the_permalink();?>" class="" title="Visiter l'offre d'emploi <?php echo the_title_attribute();?>">
                                                            <button type="submit"  class="btn btn-primary see-post">Détails de l'offre </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
						</div>
						
					<?php endwhile; ?>
                    
				<?php else : ?>
                    <div class="container post-non-trouve shadow-sm bg-light rounded-3 mt-5 mb-5 ">
                        <div class="row justify-content-center mt-4">  
                            <div class="col-lg-4 mt-5 text-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-4  text-center">
                                <h3 class="aucun-poste mt-3 mb-3">Oups! Aucune offre disponible actuellement.</h3>
                                    <a  class="mt-5" href="https://jobaffinity.fr/apply/h7qk6u22iy2o1e1wsb" target="_blank" title="Soumettre une candidature spontanée">
                                    <button type="button" class="btn btn-primary btn-candidate-down" onclick="this.blur();">Candidature spontanée <i class="fa fa-user-o" aria-hidden="true"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
				<?php endif; ?>
	</div>
</div>

<!-- Filigrane droit -->

<div class="position-relative">
    <div class="single-bg-right position-absolute top-0 start-100 translate-middle">
    </div>
</div>


<div class="container d-flex align-items-center justify-content-center mt-5">
         <?php pagination_post();?> 
</div>

<?php 

//Ne pas afficher ce bloc si Post == 0

if ($post_number  > 0) :

?>

<div class="container post-non-trouve shadow-sm bg-light rounded-3 mt-5 mb-5 ">
    <div class="row justify-content-center mt-4">  
        <div class="col-lg-4 mt-5 text-center">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="col-lg-4 text-center">
        <h3 class="aucun-poste mt-3 mb-5">Aucune offre ne correspond à votre recherche ?</h3>
            <a  class="mt-5" href="https://jobaffinity.fr/apply/h7qk6u22iy2o1e1wsb" target="_blank" title="Soumettre une candidature spontanée">
                <button type="button" class="btn btn-primary btn-candidate-down" onclick="this.blur();">Candidature spontanée  <i class="fa fa-user-o" aria-hidden="true"></i></button>
            </a>
        </div>
      </div>
</div>
<?php endif; ?>