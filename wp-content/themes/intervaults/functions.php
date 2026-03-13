<?php

function theme_setup()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_editor_style('assets/scss/styles.css');
    add_theme_support('align-wide');
    add_theme_support('appearance-tools');
    add_theme_support('custom-spacing');



}
add_action('after_setup_theme', 'theme_setup');

function theme_enqueue_assets()
{
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
    wp_enqueue_style('sf-pro-font', 'https://fonts.cdnfonts.com/css/sf-pro-display', [], null);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.0');
    wp_enqueue_style('magnific-popup-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css', [], '1.1.0');
    wp_enqueue_style(
        'urbanist-google-font',
        'https://fonts.googleapis.com/css2?family=Gilda+Display&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxygen:wght@300;400;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap',
    );

    wp_enqueue_style('intervaults-style-custom', get_template_directory_uri() . '/assets/scss/styles.css', [], filemtime(get_template_directory() . '/assets/scss/styles.css'));
    wp_enqueue_script('magnific-popup-js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'magnific-popup-js'), filemtime(get_template_directory() . '/assets/js/script.js'), true);
    wp_localize_script('custom-js', 'intervaultsFaq', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('intervaults_faq_search'),
    ]);


    wp_enqueue_style('intervaults-style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);

    // Register ScrollTrigger - Note that 'gsap-js' is a dependency
    wp_enqueue_script('gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap-js'), '3.12.2', true);



}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');


add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11.0.0');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    wp_enqueue_style(
        'theme-editor-style',
        get_stylesheet_directory_uri() . '/assets/scss/styles.css'
    );
});



function mytheme_customize_register($wp_customize)
{

    //Navbar logo

    $wp_customize->add_section('mytheme_logo_section', array(
        'title' => __('Navbar Logo', 'mytheme'),
    ));


    $wp_customize->add_setting('mytheme_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));



    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_logo', array(
        'label' => __('Upload Logo', 'mytheme'),
        'section' => 'mytheme_logo_section',
        'settings' => 'mytheme_logo',
    )));

    //Navbar logo black
    $wp_customize->add_section('black_logo_section', array(
        'title' => __('Navbar Black Logo', 'mytheme'),
    ));


    $wp_customize->add_setting('black_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));



    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'black_logo', array(
        'label' => __('Upload Logo', 'mytheme'),
        'section' => 'black_logo_section',
        'settings' => 'black_logo',
    )));


    //footer logo

    $wp_customize->add_section('footer_logo_section', array(
        'title' => __('Footer Logo', 'intervaults'),
    ));


    $wp_customize->add_setting('footer_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));



    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => __('Upload Logo', 'intervaults'),
        'section' => 'footer_logo_section',
        'settings' => 'footer_logo',
    )));




    //Landing Page Logo
    /*$wp_customize->add_section('landing_page_logo_section', array(
        'title' => __('Landing Page Logo', 'mytheme'),
    ));


    $wp_customize->add_setting('landing_page_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_setting('landing_page_logo_link', [
        'type' => 'theme_mod',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'landing_page_logo', array(
        'label' => __('Upload Landing Page Logo', 'mytheme'),
        'section' => 'landing_page_logo_section',
        'settings' => 'landing_page_logo',
    )));

    $wp_customize->add_control('landing_page_logo_link', [
        'label' => __('Landing Page Logo link', 'hypertheme'),
        'section' => 'landing_page_logo_section',
        'type' => 'url',
        'settings' => 'landing_page_logo_link',
    ]);*/

    //Navbar button

    $wp_customize->add_section('navbar_button_section', [
        'title' => __('Navbar Button', 'intervaults'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('navbar_button_text', [
        'type' => 'theme_mod',
        'default' => 'Contact',
    ]);



    $wp_customize->add_control('navbar_button_text', [
        'label' => __('Navbar Button Text', 'intervaults'),
        'section' => 'navbar_button_section',
        'type' => 'text',
    ]);


    $wp_customize->add_setting('navbar_button_link', [
        'type' => 'theme_mod',
        'default' => 'Contact Link',
    ]);
    $wp_customize->add_control('navbar_button_link', [
        'label' => __('Navbar Button Link', 'intervaults'),
        'section' => 'navbar_button_section',
        'type' => 'text',
    ]);

    //Footer links

    $wp_customize->add_section('footer_links_section', [
        'title' => __('Footer Links', 'hypertype'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('copyright_text', [
        'type' => 'theme_mod',
    ]);

    $wp_customize->add_setting('powered_by_text', [
        'type' => 'theme_mod',
    ]);


    $wp_customize->add_control('copyright_text', [
        'label' => __('Copyright text', 'intervaults'),
        'section' => 'footer_links_section',
        'type' => 'text',
    ]);

    $wp_customize->add_control('powered_by_text', [
        'label' => __('Powered by text', 'intervaults'),
        'section' => 'footer_links_section',
        'type' => 'text',
    ]);

}
add_action('customize_register', 'mytheme_customize_register');


function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

function register_my_menus()
{
    register_nav_menus([
        'navbar-menu' => __('Navbar Menu'),
        'footer-menu' => __('Footer Menu'),
    ]);

}
add_action('after_setup_theme', 'register_my_menus');

function intervaults_register_faq_cpt()
{
    $labels = [
        'name' => __('FAQs', 'intervaults'),
        'singular_name' => __('FAQ', 'intervaults'),
        'menu_name' => __('FAQs', 'intervaults'),
        'add_new' => __('Add New', 'intervaults'),
        'add_new_item' => __('Add New FAQ', 'intervaults'),
        'edit_item' => __('Edit FAQ', 'intervaults'),
        'new_item' => __('New FAQ', 'intervaults'),
        'view_item' => __('View FAQ', 'intervaults'),
        'search_items' => __('Search FAQs', 'intervaults'),
        'not_found' => __('No FAQs found.', 'intervaults'),
    ];

    register_post_type('intervaults_faq', [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => ['title', 'editor', 'page-attributes'],
        'has_archive' => false,
        'rewrite' => false,
    ]);
}
add_action('init', 'intervaults_register_faq_cpt');

function intervaults_get_faq_posts($search = '', $limit = -1)
{
    $search = trim((string) $search);

    return get_posts([
        'post_type' => 'intervaults_faq',
        'post_status' => 'publish',
        'posts_per_page' => (int) $limit,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
        's' => $search,
    ]);
}

function intervaults_render_faq_items_markup($search = '')
{
    $faq_posts = intervaults_get_faq_posts($search);

    if (empty($faq_posts)) {
        return '';
    }

    $left_items = [];
    $right_items = [];

    foreach ($faq_posts as $index => $faq_post) {
        $item = [
            'id' => (int) $faq_post->ID,
            'question' => get_the_title($faq_post),
            'answer' => apply_filters('the_content', $faq_post->post_content),
        ];

        if ($index % 2 === 0) {
            $left_items[] = $item;
        } else {
            $right_items[] = $item;
        }
    }

    $suffix = wp_unique_id('faq-search-');
    $icon_plus_url = esc_url(get_template_directory_uri() . '/assets/images/plus-icon-black.svg');
    $icon_dash_url = esc_url(get_template_directory_uri() . '/assets/images/dash-icon.svg');

    ob_start();
    ?>
    <div class="accordion faq-accordion faq-accordion--left" id="<?php echo esc_attr('faqSearchLeft-' . $suffix); ?>">
        <?php foreach ($left_items as $index => $item): ?>
            <?php $collapse_id = 'faqSearchLeftItem-' . $suffix . '-' . $item['id'] . '-' . $index; ?>
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>" type="button"
                        data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                        aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                        <span class="faq-question"><?php echo esc_html($item['question']); ?></span>
                        <span class="faq-icon" aria-hidden="true">
                            <img class="faq-icon-plus" src="<?php echo $icon_plus_url; ?>" alt="">
                            <img class="faq-icon-dash" src="<?php echo $icon_dash_url; ?>" alt="">
                        </span>
                    </button>
                </h3>
                <div id="<?php echo esc_attr($collapse_id); ?>"
                    class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>">
                    <div class="accordion-body"><?php echo wp_kses_post($item['answer']); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="accordion faq-accordion faq-accordion--right" id="<?php echo esc_attr('faqSearchRight-' . $suffix); ?>">
        <?php foreach ($right_items as $index => $item): ?>
            <?php $collapse_id = 'faqSearchRightItem-' . $suffix . '-' . $item['id'] . '-' . $index; ?>
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>" type="button"
                        data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                        aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                        <span class="faq-question"><?php echo esc_html($item['question']); ?></span>
                        <span class="faq-icon" aria-hidden="true">
                            <img class="faq-icon-plus" src="<?php echo $icon_plus_url; ?>" alt="">
                            <img class="faq-icon-dash" src="<?php echo $icon_dash_url; ?>" alt="">
                        </span>
                    </button>
                </h3>
                <div id="<?php echo esc_attr($collapse_id); ?>"
                    class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>">
                    <div class="accordion-body"><?php echo wp_kses_post($item['answer']); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php

    return ob_get_clean();
}

function intervaults_handle_faq_search()
{
    check_ajax_referer('intervaults_faq_search', 'nonce');

    $query = isset($_POST['query']) ? sanitize_text_field(wp_unslash($_POST['query'])) : '';
    $html = intervaults_render_faq_items_markup($query);
    $suggestions = [];

    if ($query !== '') {
        $suggestion_posts = intervaults_get_faq_posts($query, 8);

        foreach ($suggestion_posts as $faq_post) {
            $title = trim((string) get_the_title($faq_post));
            if ($title !== '') {
                $suggestions[] = $title;
            }
        }

        $suggestions = array_values(array_unique($suggestions));
    }

    wp_send_json_success([
        'html' => $html,
        'suggestions' => $suggestions,
    ]);
}
add_action('wp_ajax_intervaults_faq_search', 'intervaults_handle_faq_search');
add_action('wp_ajax_nopriv_intervaults_faq_search', 'intervaults_handle_faq_search');



function intervaults_register_gutenberg_blocks()
{
    $block_dirs = glob(__DIR__ . '/blocks/*-section');
    if (empty($block_dirs)) {
        return;
    }

    foreach ($block_dirs as $block_dir) {
        if (file_exists($block_dir . '/block.json')) {
            register_block_type($block_dir);
        }
    }
}
add_action('init', 'intervaults_register_gutenberg_blocks');


class Footer_Menu_Walker extends Walker_Nav_Menu
{

    private $current_parent;

    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '<ul class="footer-submenu">';
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        if ($depth === 0) {
            $output .= '</ul></div>'; // Close footer-column
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {

        if ($depth === 0) {
            // Parent = Column wrapper
            $output .= '<div class="footer-column">';
            $output .= '<h6>' . esc_html($item->title) . '</h6>';
        } else {
            // Child = Links
            $output .= '<li>';
            $output .= '<a href="' . esc_url($item->url) . '">';
            $output .= esc_html($item->title);
            $output .= '</a></li>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($depth === 0 && !in_array('menu-item-has-children', $item->classes)) {
            // If parent has no children
            $output .= '</div>';
        }
    }
}
