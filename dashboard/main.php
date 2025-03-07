<?php
// Add menu item to the dashboard
function xquisitehospitality_add_admin_menu()
{
  $svg_icon = 'data:image/svg+xml;base64,' . base64_encode(file_get_contents(plugin_dir_path(__FILE__) . '../assets/images/logo.svg'));

  add_menu_page(
    'xquisitehospitality Settings',
    'xquisitehospitality',
    'edit_posts',
    'xquisitehospitality-settings',
    'xquisitehospitality_settings_page',
    $svg_icon,
    20
  );
}
add_action('admin_menu', 'xquisitehospitality_add_admin_menu');

function xquisitehospitality_enqueue_media_uploader()
{
  wp_enqueue_media();
  wp_enqueue_script('xquisitehospitality-media-uploader', plugin_dir_url(__FILE__) . 'js/media-uploader.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'xquisitehospitality_enqueue_media_uploader');

function xquisitehospitality_settings_page()
{
  $isAdmin = current_user_can('manage_options');
  if (!$isAdmin) {
    echo '<h1>Sorry, you do not have permission to access this page.</h1>';
    return;
  }
?>
  <h1>xquisitehospitality Settings</h1>
<?php
}
