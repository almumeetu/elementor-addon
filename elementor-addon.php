<?php

/**
 * Plugin Name: Elementor Addon Extension
 * Description: Custom Elementor extension which includes custom widgets.
 * Plugin URL: https://example.com
 * Version: 1.0.0
 * Author: Al Mumeetu Saikat
 * Text Domain: elementor-addon
 * Domain Path: /languages
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * The main class that initiates directly.
 * 
 * @since 1.0.0
 */
final class Elementor_Addon_Extension
{

    /**
     * Plugin Version
     * 
     * @since 1.0.0
     * 
     * @var string The Plugin Version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     * 
     * @since 1.0.0
     * 
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     * 
     * @since 1.0.0
     * 
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';


    /**
     * Instance
     * 
     * @since 1.0.0
     * 
     * @access private
     * @static
     * 
     * @var Elementor_Addon_Extension The single instance of the Class.
     */
    private static $_instance = null;

    /**
     * Instance
     * 
     * Ensures only one instance of the class is loaded or can be loaded
     * 
     * @since 1.0.0
     * 
     * @access public
     * @static
     * 
     * @return Elementor_Addon_Extension The single instance of the class.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * @since 1.0.0
     * 
     * @access public
     */
    public function __construct()
    {
        add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * Load Textdomain
     * 
     * Load plugin localization files.
     * 
     * Fired by `init` action hook.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function i18n()
    {
        load_plugin_textdomain('elementor-addon', false, basename(dirname(__FILE__)) . '/languages/');
    }

    /**
     * Initialize the plugin
     * 
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fails don't continue,
     * if all checks have passed load the files required to run the plugin.
     * 
     * Fired by `plugins_loaded` action hook.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function init()
    {

        //Check if Elementor is installed and activated
        if (! did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (! version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (! version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

        // Add Plugin Action
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
        add_action('elementor/controls/controls_registered', [$this, 'init_controls']);

        // Category Init
        add_action('elementor/init', [$this, 'elementor_addon_category']);
    }

    
    /**
     * Admin Notice
     * 
     * Warning when the site doesn't have Elementor installed or activated.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function admin_notice_missing_main_plugin()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-addon'),
            '<strong>' . esc_html__('Elementor Addon Extension', 'elementor-addon') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'elementor-addon') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin Notice
     * 
     * Warning when the site doesn't have the minimum required Elementor version.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function admin_notice_minimum_elementor_version()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-addon'),
            '<strong>' . esc_html__('Elementor Addon Extension', 'elementor-addon') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'elementor-addon') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin Notice
     * 
     * Warning when the site doesn't have the minimum required PHP version.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {

        if (isset($_GET['activate'])) unset($_GET['activate']);

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-addon'),
            '<strong>' . esc_html__('Elementor Addon Extension', 'elementor-addon') . '</strong>',
            '<strong>' . esc_html__('PHP', 'elementor-addon') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Init Widgets
     * 
     * Include widget files and register them.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function init_widgets()
    {
         require_once(__DIR__ . '/widgets/elementor-test.php');
        // Register widgets, loading all widget names
         \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor_Test_Widget());
    }

    /**
     * Init Controls
     * 
     * Include control files and register them.
     * 
     * @since 1.0.0
     * 
     * @access public
     */
    public function init_controls()
    {
        // Include control files
        // require_once(__DIR__ . '/controls/test-control.php');
        // Register control
        // \Elementor\Plugin::$instance->controls_manager->register_control('control-type', new \Test_Control());
    }

    // Custom CSS
    public function widget_styles()
    {
        wp_register_style('elementor-addon-style', plugins_url('style.css', __FILE__));
        wp_enqueue_style('elementor-addon-style');
    }

    // Custom JS
    public function widget_scripts()
    {
        wp_register_script('elementor-addon-js', plugins_url('main.js', __FILE__));
        wp_enqueue_script('elementor-addon-js');
    }

    // Custom Category
    public function elementor_addon_category()
    {
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'elementor-addon-category',
            [
                'title' => __('Elementor Addon Category', 'elementor-addon'),
                'icon' => 'fa fa-plug',
            ],
            2
        );
    }
}

function register_shop_categories_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/shop-categories.php' );
    $widgets_manager->register( new \Shop_Categories_Widget() );
}
add_action( 'elementor/widgets/register', 'register_shop_categories_widget' );

function shop_categories_widget_enqueue_styles() {
    wp_enqueue_style( 'shop-categories-widget-style', plugins_url( '/css/shop-categories-widget.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'shop_categories_widget_enqueue_styles' );

Elementor_Addon_Extension::instance();
