<?php
/**
 * Import dummy Content
 *
 *
 * @link https://github.com/thomasgriffin/TGM-Plugin-Activation
 * @package extension
 */

function extension_admin_notice() {
  global $current_user;
  $current_user_id   = $current_user->ID;
  $theme  = wp_get_theme();
  if ( !get_user_meta( $current_user_id, esc_html( $theme->get( 'TextDomain' ) ) . '_notice_ignore' ) ) {
    ?>
    <div class="notice extension-notice"  style="position:relative;">

      <h1>
        <?php
        /* translators: %1$s: theme name, %2$s theme version */
        printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'extension' ), esc_html( $theme->Name ), esc_html( $theme->Version ) );
        ?>
      </h1>

      <p>
        <?php
        /* translators: %1$s: theme name, %2$s link */
        printf( __( 'Welcome! Thank you for choosing %1$s! View  <a href="%2$s" target="_blank" class="notice-links">Multiple Demos</a> <a href="%3$s" target="_blank" class="notice-links">Documentation</a>', 'extension' ), esc_html( $theme->Name ), 'https://themefreesia.com/demos/extension-demos/', 'https://themefreesia.com/theme-instruction/extension/' );
        printf( '<a href="%1$s" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>', '?' . esc_html( $theme->get( 'TextDomain' ) ) . '_notice_ignore=0' );
        ?>
      </p>
      <p> <?php esc_html_e('We recommended you to install Elementor Plugins to display exactly as in our demo site.','extension'); ?></p>
      <p>
        <a href="https://themefreesia.com/theme-freesia-demo-import/"  target="_blank" class="button" style="text-decoration: none;">
          <?php
          /* translators: %s theme name */
          printf( esc_html__( 'Download Demo Import Plugin %s', 'extension' ), esc_html( $theme->Name ) )
          ?>
        </a>
      </p>
    </div>
    <?php
  }
}

add_action( 'admin_notices', 'extension_admin_notice' );

function extension_notice_ignore() {
  global $current_user;
  $theme_data  = wp_get_theme();
  $user_id   = $current_user->ID;
  /* If user clicks to ignore the notice, add that to their user meta */
  if ( isset( $_GET[ sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) && '0' == $_GET[ sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ] ) {
    add_user_meta( $user_id, sanitize_key( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore', 'true', true );
  }
}

add_action( 'admin_init', 'extension_notice_ignore' );