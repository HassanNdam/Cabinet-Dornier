<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('name');?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="icon" href="<?php echo (get_template_directory_uri() . '/assets/favicone/favicone.png') ?>" sizes="16x16 32x32 48x48 64x64">
    
<?php
include_once("listes.php");
wp_head();
?>
</head>
<body>

<header class="site-header">
    <nav class="navbar navbar-default navbar-expand d-flex container flex-column flex-md-row justify-content-between py-2">
        <a class="navbar-brand" title="Aller sur la page d'accueil" href="https://frederic276.wixsite.com/cabinet-dornier" target="_blank">
            <img src="<?php echo get_template_directory_uri(). '/assets/logo/dornierlogo1.png'?>" alt="Logo Cabinet Dornier" style="max-width:200px" class="img-fluid"> 
        </a>
    <div class="d-flex">
        <a href="https://jobaffinity.fr/apply/h7qk6u22iy2o1e1wsb" target="_blank">
            <button type="button" class="btn btn-primary" onclick="this.blur();">Candidature spontanée <i class="fa fa-user-o" aria-hidden="true"></i></button>
        </a>
    </div>
    </nav>

</header>


