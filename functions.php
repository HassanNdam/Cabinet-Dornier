<?php



//Limitation excerpt POST

function wpdocs_custom_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);



// Retrait de [] dans excerpt

function wpdocs_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');



function dornier_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support("post-thumbnails");
}

add_action('after_setup_theme', 'dornier_support');

function dornier_style()
{
    wp_enqueue_style('my-custom-style', get_template_directory_uri() . '/style.css', array('ms-bootstrap'), time());
    wp_enqueue_style(
        'ms-bootstrap',
        "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css",
        array(),
        '5.1.3',
        'All'
    );
    wp_enqueue_style(
        'ms-font',
        "https://use.fontawesome.com/releases/v5.7.0/css/all.css",
        array(),
        '5.7.0',
        'All'
    );
}
add_action('wp_enqueue_scripts', 'dornier_style');


function reinitialiser()
{
    if ($_GET) {
        if ((isset($_GET['s'])) or isset($_GET['location']) or isset(($_GET['activite']))) {
            ?>
            <a href="<?php echo get_site_url(); ?>" class="mt-5">
                Actualiser <i class="fas fa-sync fa-sync"></i>
            </a>
            <?php
        }
    }
}


if (! function_exists('pagination_post_nav')) {
    function pagination_post_nav()
    {
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next     = get_adjacent_post(false, '', false);

        if (! $next && ! $previous) {
            return;
        }
        ?>
				<nav class="container navigation post-navigation">
					<div class="row nav-links justify-content-between">
						<?php

                            if (get_previous_post_link()) {
                                previous_post_link('<span class="nav-previous">%link</span>', '<');
                            }
                            if (get_next_post_link()) {
                                next_post_link('<span class="nav-next">%link</span>', '>');
                            }
        ?>
					</div>
				</nav>

		<?php
    }
}

if (! function_exists('pagination_post')) {
    function pagination_post($args = array(), $class = 'pagination')
    {
        if ($GLOBALS['wp_query']->max_num_pages <= 1) {
            return;
        }
        $args = wp_parse_args($args, array(
            'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'          => __('&laquo;'),
            'next_text'          => __('&raquo;'),
            'screen_reader_text' => __('Posts navigation'),
            'type'               => 'array',
            'current'            => max(1, get_query_var('paged')),
        ));
        $links = paginate_links($args);
        ?>

        <nav aria-label="<?php echo $args['screen_reader_text']; ?>">

            <ul class="pagination">

                <?php
                    foreach ($links as $key => $link) { ?>

                        <li class="page-item <?php echo strpos($link, 'current') ? 'active' : '' ?>">

                            <?php echo str_replace('page-numbers', 'page-link', $link); ?>

                        </li>

                <?php } ?>

            </ul>

        </nav>

        <?php
    }
}

// Fonction remplacement du texte dans l'offre


function replace_text_wps($text)
{
    $replace = array(
        // 'MOT A REMPLACER' => 'REMPLACER AVEC CECI'
        '<h3>Poste</h3>' => '<h3>Vos missions</h3>'
    );
    $text = str_replace(array_keys($replace), $replace, $text);

    return $text;
}

add_filter('the_content', 'replace_text_wps');


//Fonction affichage et/ou masque localisation

function affichage_localisation_accueil(string $post_location)
{
    if (!$post_location) {
    } else {
        echo '<h4 class="local-offre mt-3"><i class="fa fa-map-marker" aria-hidden="true"></i>' .' '. $post_location . '</h4>';
    }
    return $post_location;
}


function center_bloc_content_page(string $post_location, string $contract_type)
{
    if (!$post_location) {
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <h4 class="date-offre text-white"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo " Publiée le " . get_the_date(); ?></h4>
            </div>
            <div class="col-lg-4">
                <h4 class="type-offre text-white"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $contract_type; ?></h4>
            </div>
        </div>

        <?php
    } else {
        ?>
        <div class="row">
            <div class="col-lg-4">
                <h4 class="date-offre text-white"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo " Publiée le " . get_the_date(); ?></h4>
            </div>
            <div class="col-lg-4">
                <h4 class="type-offre text-white"><i class="fa fa-briefcase" aria-hidden="true"></i> <?php echo $contract_type; ?></h4>
            </div>
            <div class="col-lg-4 mb-5">
                <h4 class="local-offre text-white"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo  " " . $post_location; ?> </h4>
            </div> 
        </div>
        <?php
    }
}
