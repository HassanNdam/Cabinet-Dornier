
<?php

$postid = get_post_custom_values('job_id')[0];
$postcontract = get_post_custom_values('job_contract_type')[0];
$postlocation = get_post_custom_values('job_location')[0];
$postactivite = get_post_custom_values('custom_secteur_d\'activite')[0];
$postlink = get_post_custom_values('job_link')[0];
?>

<div class="position-relative p-3 p-md-5 text-center overflow-hidden single-image">
    <div class="show-poste text-white">
      <h4 class="titre-single mb-5"></i><?php echo  the_title_attribute()?></h4>
        <div class="row">
            <div class="col-lg-4">
                <h4 class="date-offre text-white"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo " " . get_the_date(); ?></h4>
            </div>
            <div class="col-lg-4">
                <h4 class="type-offre text-white"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $postcontract; ?></h4>
            </div>
            <div class="col-lg-4 mb-5">
                <?php  affichage_localisation($postlocation);  ?>
            </div> 
        </div>          
   </div>
   <div class="je-postule">
            <a class="" href="<?php echo $postlink; ?>" target="_blank" title="Postuler à l'offre <?php echo the_title_attribute();?>">
                <button type="button" class="btn btn-primary btn-gris" onclick="this.blur();">Je postule maintenant </button>
            </a>
    </div>
</div>


<div class="container mt-5 mb-5 ">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item " aria-current="page"><a href="https://frederic276.wixsite.com/cabinet-dornier" target="_blank">Dornier Consulting</a></li> -->
        <li class="breadcrumb-item accueil"><a href="<?php echo get_site_url();?>">Accueil</a></li>
        <li class="breadcrumb-item " aria-current="page">Nos offres</li>
        <li class="breadcrumb-item active"><?php echo the_title_attribute();?></li>
    </ol>
    </nav>
</div>

<hr class="featurette-divider">


<!-- Filigrane gauche -->

<div class="position-relative">
    <div class="single-bg-left-green position-absolute top-0 start-0 translate-middle-x">
    </div>
</div>
<div class="position-relative">
    <div class="single-bg-left position-absolute top-0 start-0 translate-middle-x">
    </div>
</div>

<div id="single-page">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
                <div class="col-lg-12 p-5 border shadow-sm rounded-3">
                    <?php the_content();?>
                </div>
        </div>
    </div>
 </div>

 <!-- Filigrane droit -->

<div class="position-relative">
    <div class="single-bg-right position-absolute top-0 start-100 translate-middle">
    </div>
</div>

 <div class="container col-lg-12 text-center bg-light p-5 rounded-3">
            <a href="<?php echo $postlink ;?>" target="_blank" title="Postuler à l'offre <?php echo the_title_attribute();?>">
                <button type="button" class="btn btn-primary" onclick="this.blur();">Je postule maintenant</button>
            </a>
 </div>
 
 <div class="col-lg text-center mt-5">
        <a class="back-offre-text" href="<?php echo get_site_url();?>"  title="Revenir aux offres d'emploi">
        <i class="fa fa-angle-left" aria-hidden="true"></i> Je retourne aux offres d'emploi 
        </a>
 </div>