<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

    function sage_register_styles(){
        $version = wp_get_theme()->get( 'Version' );
        wp_enqueue_style( 'sage-style', get_template_directory_uri(). '/style.css', array('sage-bootstrap'), $version, 'all');
        wp_enqueue_style('sage-bootstrap',"https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css",array(),'4.5.2','all');
    }

    add_action('wp_enqueue_scripts', 'sage_register_styles');

    function mytheme_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


add_theme_support('sage');

//REMOVE GUTENBERG
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
}, 20 );

// REGISTER CPT AND TAXONOMIES
function create_post_types() {

    register_post_type('movie', array(
        'label' => __( 'Movie' ),
        'singular_label' => __( 'Movie' ),
        'description' => __( 'Description of the Movie type' ),
        'public' => true,
        'has_archive' => true,
    ));
}

add_theme_support( 'post-thumbnails');
add_action( 'init', 'create_post_types' );

function create_movie_taxonomies() {

    $labels_regista = array(
        'name'                       => _x( 'Registi', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Regista', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Registi', 'text_domain' ),
        'all_items'                  => __( 'Tutti i registi', 'text_domain' ),
        'new_item_name'              => __( 'Nome nuovo regista', 'text_domain' ),
        'add_new_item'               => __( 'Aggiungi nuovo regista', 'text_domain' ),
        'edit_item'                  => __( 'Modifica regista', 'text_domain' ),
        'update_item'                => __( 'Aggiorna regista', 'text_domain' ),
        'view_item'                  => __( 'Vedi item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separa i registi con virgole', 'text_domain' ),
        'add_or_remove_items'        => __( 'Aggiungi o rimuovi registi', 'text_domain' ),
        'choose_from_most_used'      => __( 'Scegli tra i registi più frequenti', 'text_domain' ),
        'popular_items'              => __( 'Item popolari', 'text_domain' ),
        'search_items'               => __( 'Cerca registi', 'text_domain' ),
        'not_found'                  => __( 'Non trovato', 'text_domain' ),
        'no_terms'                   => __( 'Nessun item', 'text_domain' ),
        'items_list'                 => __( 'Lista item', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );

    $args_regista = array(
        'labels'                     => $labels_regista,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
    );

    register_taxonomy('registi', array( 'movie' ), $args_regista );

    $labels_genere = array(
        'name'                       => _x( 'Generi', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'genere', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Genere', 'text_domain' ),
        'all_items'                  => __( 'Tutti i generi', 'text_domain' ),
        'new_item_name'              => __( 'Nome nuovo genere', 'text_domain' ),
        'add_new_item'               => __( 'Aggiungi nuovo genere', 'text_domain' ),
        'edit_item'                  => __( 'Modifica genere', 'text_domain' ),
        'update_item'                => __( 'Aggiorna genre', 'text_domain' ),
        'view_item'                  => __( 'Vedi item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separa i generi con virgole', 'text_domain' ),
        'add_or_remove_items'        => __( 'Aggiungi o rimuovi generi', 'text_domain' ),
        'choose_from_most_used'      => __( 'Scegli tra i generi più frequenti', 'text_domain' ),
        'popular_items'              => __( 'Item popolari', 'text_domain' ),
        'search_items'               => __( 'Cerca generi', 'text_domain' ),
        'not_found'                  => __( 'Non trovato', 'text_domain' ),
        'no_terms'                   => __( 'Nessun item', 'text_domain' ),
        'items_list'                 => __( 'Lista item', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );

    $args_genere = array(
        'labels'                     => $labels_genere,
        'hierarchical'               => false,
        'public'                     => false,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
    );
    register_taxonomy( 'genere', array( 'movie' ), $args_genere );
}

add_action( 'init', 'create_movie_taxonomies', 0 );

// WOOCOMMERCE ACTION CUSTOMIZATION.
include_once get_template_directory() . '/custom-wchooks.php';