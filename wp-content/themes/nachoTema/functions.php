<?php    
function add_styles(){
    
    // Estilos
    
    wp_register_style('Bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',null,null,false);
    wp_enqueue_style('Bootstrap');
    
    wp_register_style('OwlCarrousel', get_template_directory_uri() . '/css/owl.carousel.min.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('OwlCarrousel');
    
    wp_register_style('Magnific', get_template_directory_uri() . '/css/magnific-popup.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('Magnific');
    
    wp_register_style('Fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css',array('Bootstrap'),null,false);
    wp_enqueue_style('Fontawesome');
    
    wp_register_style('Themify', get_template_directory_uri() . '/css/themify-icons.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('Themify');
    
    wp_register_style('NiceSelect', get_template_directory_uri() . '/css/nice-select.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('NiceSelect');
    
    wp_register_style('Flaticon', get_template_directory_uri() . '/css/flaticon.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('Flaticon');
    
    wp_register_style('gijgo', get_template_directory_uri() . '/css/gijgo.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('gijgo');
    
    wp_register_style('animate', get_template_directory_uri() . '/css/animate.min.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('animate');
    
    wp_register_style('slick', get_template_directory_uri() . '/css/slick.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('slick');

    wp_register_style('Slicknav', get_template_directory_uri() . '/css/slicknav.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('Slicknav');
    
    wp_register_style('Main', get_template_directory_uri() . '/css/style.css',array('Bootstrap','Fontawesome'),null,false);
    wp_enqueue_style('Main');

    
}

add_action('wp_enqueue_scripts','add_styles');

function add_scripts(){

    // Scripts
    // wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
    wp_enqueue_script('jquery');
    
    
    wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-3.5.0.min.js');
    wp_enqueue_script('modernizr');
    
    wp_register_script('popper', get_template_directory_uri() . '/js/popper.min.js');
    wp_enqueue_script('popper');
    
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js"');
    wp_enqueue_script('bootstrap');
    
    wp_register_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js');
    wp_enqueue_script('owl');
    
    wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js');
    wp_enqueue_script('isotope');
    
    wp_register_script('AjaxForm', get_template_directory_uri() . '/js/ajax-form.js');
    wp_enqueue_script('AjaxForm');
    
    wp_register_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js');
    wp_enqueue_script('waypoints');
    
    wp_register_script('counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js');
    wp_enqueue_script('counterup');
    
    wp_register_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js');
    wp_enqueue_script('imagesloaded');
    
    wp_register_script('scrollIt', get_template_directory_uri() . '/js/scrollIt.js');
    wp_enqueue_script('scrollIt');
    
    wp_register_script('scrollUp', get_template_directory_uri() . '/js/jquery.scrollUp.min.js');
    wp_enqueue_script('scrollUp');
    
    wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js');
    wp_enqueue_script('wow');
    
    wp_register_script('nice-select', get_template_directory_uri() . '/js/nice-select.min.js');
    wp_enqueue_script('nice-select');
    
    wp_register_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js');
    wp_enqueue_script('slicknav');
    
    wp_register_script('Popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js');
    wp_enqueue_script('Popup');
    
    wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js');
    wp_enqueue_script('plugins');
    
    wp_register_script('gijgo', get_template_directory_uri() . '/js/gijgo.min.js');
    wp_enqueue_script('gijgo');
    
    wp_register_script('contact', get_template_directory_uri() . '/js/contact.js');
    wp_enqueue_script('contact');
    
    wp_register_script('ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js');
    wp_enqueue_script('ajaxchimp');
    
    wp_register_script('form', get_template_directory_uri() . '/js/jquery.form.js');
    wp_enqueue_script('form');
    
    wp_register_script('validate', get_template_directory_uri() . '/js/jquery.validate.min.js');
    wp_enqueue_script('validate');
    
    wp_register_script('mail', get_template_directory_uri() . '/js/mail-script.js');
    wp_enqueue_script('mail');
    
    wp_register_script('main', get_template_directory_uri() . '/js/main.js');
    wp_enqueue_script('main');
    
    
}
add_action('wp_enqueue_scripts','add_scripts');


?>
