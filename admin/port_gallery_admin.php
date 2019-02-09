<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Port_Gallery_Admin {

    /**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/port_gallery_admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/port_gallery_admin.js', array( 'jquery' ), $this->version, false );

	}
    /**
     * [new_gallery description]
     * @return [type] [description]
     *
     * @since 1.0.0
     */
    public static function new_gallery() {
        $plural         = 'Galleries';
        $single         = 'Gallery';
        $cus_post_name  = 'port_gallery';
        $description    = 'Create a gallery';
        $capable_type   = 'port_gallery';
        $cap_type       = 'post';

        $capabilities   = array(
            'delete_others_posts'       => "delete_others_{$capable_type}s",
            'delete_post'               => "delete_{$capable_type}",
            'delete_posts'              => "delete_{$capable_type}s",
            'delete_private_posts'      => "delete_private_{$capable_type}s",
            'delete_published_posts'    => "delete_published_{$capable_type}s",
            'edit_others_posts'         => "edit_others_{$capable_type}s",
            'edit_post'                 => "edit_{$capable_type}",
            'edit_posts'                => "edit_{$capable_type}s",
            'edit_private_posts'        => "edit_private_{$capable_type}s",
            'edit_published_posts'      => "edit_published_{$capable_type}s",
            'publish_posts'             => "publish_{$capable_type}s",
            'read_post'                 => "read_{$capable_type}",
            'read_private_posts'        => "read_private_{$capable_type}s"
        );

        $labels = array(
            'add_new'                   => esc_html__("Add New {$single}", 'port_gallery'),
            'add_new_item'              => esc_html__("Add New {$single}", 'port_gallery'),
            'all_items'                 => esc_html__($plural, 'port_gallery'),
            'edit_item'                 => esc_html__("Edit {$single}", 'port_gallery'),
            'menu_name'                 => esc_html__($plural, 'port_gallery'),
            'name'                      => esc_html__($plural, 'port_gallery'),
            'name_admin_bar'            => esc_html__($single,'port_gallery'),
            'new_item'                  => esc_html__("New {$single}",'port_gallery'),
            'not_found'                 => esc_html__("No {$plural}",'port_gallery'),
            'not_found_in_trash'        => esc_html__("No {$plural}",'port_gallery'),
            'parent_item_colon'         => esc_html__("Parent {$plural}",'port_gallery'),
            'search_items'              => esc_html__("Search {$plural}",'port_gallery'),
            'singular_name'             => esc_html__($single,'port_gallery'),
            'view_item'                 => esc_html__("View {$single}",'port_gallery')
        );

        $rewrites = array(
            'ep_mask'                   => EP_PERMALINK,
            'feeds'                     => FALSE,
            'pages'                     => TRUE,
            'slug'                      => esc_html__(strtolower($plural), 'port_gallery'),
            'with_front'                => FALSE
        );

        $supports = array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'comments',
            'excerpt'
        );

        $opts = array(
            'can_export'                => TRUE,
            'capabilities'              => $capabilities,
            'capability_type'           => $cap_type,
            'description'               => $description,
            'exclude_from_search'       => FALSE,
            'has_archive'               => TRUE,
            'hierarchical'              => FALSE,
            'labels'                    => $labels,
            'map_meta_cap'              => TRUE,
            'menu_icon'                 => 'dashicons-format-gallery',
            'menu_position'             => 5,
            'public'                    => TRUE,
            'publicly_querable'         => TRUE,
            'query_var'                 => TRUE,
            'register_meta_box_cb'      => '',
            'rewrite'                   => $rewrites,
            'show_in_admin_bar'         => TRUE,
            'show_in_menu'              => TRUE,
            'show_in_nav_menu'          => TRUE,
            'supports'                  => $supports,
            'taxonomies'                => array('gallery_type')
        );

        $opts = apply_filters('port-gallery-cpt-options', $opts);

        register_post_type(strtolower($cus_post_name), $opts);
    }

    public static function gallery_taxonomy() {

        $plural         = 'Types';
        $single         = 'Type';
        $tax_name       = 'gallery_type';

        $tax_capables = array(
            'assign_terms'              => 'edit_posts',
            'delete_terms'              => 'manage_categories',
            'edit_terms'                => 'manage_categories',
            'manage_terms'              => 'manage_categories'
        );

        $labels = array(
            'add_new_item'              => esc_html__("Add New {$single}", 'port_gallery'),
            'add_or_remove_items'       => esc_html__("Add or Remove {$plural}",'port_gallery'),
            'all_items'                 => esc_html__($plural,'port_gallery'),
            'choose_from_most_used'     => esc_html__("Choose from most used {$plural}",'port_gallery'),
            'edit_item'                 => esc_html__("Edit {$single}",'port_gallery'),
            'menu_name'                 => esc_html__($plural,'port_gallery'),
            'name'                      => esc_html__($plural,'port_gallery'),
            'new_item_name'             => esc_html__("New {$single}",'port_gallery'),
            'not_found'                 => esc_html__("No {$plural} found",'port_gallery'),
            'parent_item'               => esc_html__("Parent {$single}",'port_gallery'),
            'parent_item_colon'         => esc_html__("Parent {$single}:",'port_gallery'),
            'popular_items'             => esc_html__("Popular {$plural}",'port_gallery'),
            'search_items'              => esc_html__("Search {$plural}",'port_gallery'),
            'separate_items_with_commas'=> esc_html__("Separate {$plural} with commas",'port_gallery'),
            'singular_name'             => esc_html__($single,'port_gallery'),
            'update_item'               => esc_html__("Update {$single}",'port_gallery'),
            'view_item'                 => esc_html__("View {$single}", 'port_gallery')
        );

        $rewrites = array(
            'ep_mask'                   => EP_NONE,
            'hierarchical'              => FALSE,
            'slug'                      => esc_html__(strtolower($tax_name), 'port_gallery'),
            'with_front'                => FALSE
        );

        $opts = array(
            'hierarchical'              => TRUE,
            'public'                    => TRUE,
            'query_var'                 => $tax_name,
            'show_admin_column'         => FALSE,
            'show_in_nav_menus'         => TRUE,
            'show_tag_cloud'            => TRUE,
            'show_ui'                   => TRUE,
            'sort'                      => '',
            'capabilities'              => $tax_capables,
            'labels'                    => $labels,
            'rewrite'                   => $rewrites
        );

        $opts = apply_filters('port-gallery-tax-options', $opts);

        register_taxonomy($tax_name, array('port_gallery'), $opts);
    }
}
