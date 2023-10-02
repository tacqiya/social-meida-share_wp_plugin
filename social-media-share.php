<?php

/**
 * Plugin Name: Social Media Share
 * Description: A simple custom plugin for WordPress.
 * Version: 1.0
 * Author: Bohahahaha
 */

if (!defined('ABSPATH')) {
    echo "no plugee";
    exit;
}

class SocialMediaShare
{
    public function __construct()
    {
        add_action('init', array($this, 'create_social_media_share'));

        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        // echo  plugin_dir_url(__FILE__).'js/share.js';
        add_shortcode('share-buttons', array($this, 'load_shortcode'));
    }

    public function create_social_media_share()
    {
        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Social media share',
                'singular_name' => 'Social Shares'
            ),
            'menu-icon' => 'dashicons-media-text'
        );

        register_post_type('social_media_share', $args);
    }

    public function load_assets()
    {
        wp_enqueue_style(
            'social-media-share',
            plugin_dir_url(__FILE__) . 'css/share.css',
            array(),
            1,
            'all'
        );

        wp_enqueue_script(
            'social-media-share',
            plugin_dir_url(__FILE__) . 'js/share.js',
            array('jquery'),
            1,
            true
        );
    }

    public function load_shortcode()
    {
        ob_start(); ?>
        <div class="share-buttons-container">
            <div class="main-share-btn">
                <img src="https://cdn-icons-png.flaticon.com/512/61/61020.png">
            </div>
            <div class="share-list">
                <!-- FACEBOOK -->
                <a class="fb-h" onclick="return fbs_click()" target="_blank">
                    <img src="https://img.icons8.com/material-rounded/96/000000/facebook-f.png">
                </a>

                <!-- TWITTER -->
                <a class="tw-h" onclick="return tbs_click()" target="_blank">
                    <img src="https://img.icons8.com/material-rounded/96/000000/twitter-squared.png">
                </a>

                <!-- LINKEDIN -->
                <a class="li-h" onclick="return lbs_click()" target="_blank">
                    <img src="https://img.icons8.com/material-rounded/96/000000/linkedin.png">
                </a>

                <!-- REDDIT -->
                <a class="re-h" onclick="return rbs_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/reddit.png">
                </a>

                <!-- PINTEREST -->
                <a data-pin-do="buttonPin" data-pin-config="none" class="pi-h" onclick="return pbs_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/pinterest.png">
                </a>

                <!-- WHATSAPP -->
                <a data-action="share/whatsapp/share" class="wh-h" onclick="return whp_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/whatsapp.png">
                </a>

                <!-- MAIL -->
                <a data-action="share/whatsapp/share" class="ma-h" onclick="return whp_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/gmail.png">
                </a>

                <!-- INSTAGRAM -->
                <a data-action="share/whatsapp/share" class="in-h" onclick="return whp_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/instagram.png">
                </a>

                <!-- GMAIL -->
                <a data-action="share/whatsapp/share" class="gm-h" onclick="return whp_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/gmail.png">
                </a>

                <!-- Thread -->
                <a data-action="share/whatsapp/share" class="gm-h" onclick="return whp_click()" target="_blank">
                    <img src="https://img.icons8.com/ios-glyphs/90/000000/gmail.png">
                </a>
            </div>
        </div>
<?php return ob_get_clean(); }
}

new SocialMediaShare;
