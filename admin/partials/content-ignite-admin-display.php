<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.linkedin.com/in/jamiedruce/
 * @since      1.0.0
 *
 * @package    Content_Ignite
 * @subpackage Content_Ignite/admin/partials
 */

$admin_dir = plugin_dir_url( dirname(__FILE__) );
?>

<div class="ci-wrap">
  <h1>Content Ignite - An Advertising Technology Company</h1>
  <p class="version">Version 1.1.0</p>

  <form method="post" action="options.php">
    <?php 
      settings_fields('ci_options');
      $options = get_option('ci_options');
    ?>
    <div class="metabox-holder">
      <div class="meta-box-sortables ui-sortable">
        <div id="ci-panel-overview" class="postbox">
					<h2><img src="<?php echo esc_url($admin_dir.'img/ci-logo.svg'); ?>" height="44" alt="Content Ignite" /></h2>
					<div class="ci-panel-overview">
            <p>This plugin adds your Content Ignite publisher tag to your site in just a few clicks.</p>
            <p>Content Ignite is a publisher first AdTech company. We believe in giving back control to you, the publisher, with a choice of demand and highly engaging ad formats. Our pricing and reporting are fully transparent, just as they should be. It's time for this industry to back the publisher!</p>
            <ul>
              <li><a target="_blank" rel="noopener noreferrer" href="https://docs.contentignite.com">Documentation</a></li>
              <li><a target="_blank" rel="noopener noreferrer" href="https://admin.contentignite.com">Your publishing cloud</a></li>
              <li><a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/plugins/ga-google-analytics/">Plugin Homepage</a></li>
              <li><a target="_blank" rel="noopener noreferrer" href="https://contentignite.com">ContentIgnite.com</a></li>
              <li><a target="_blank" rel="noopener noreferrer" href="https://contentignite.atlassian.net/servicedesk/customer/portals">Support</a></li>
            </ul>
          </div>
				</div>

        <div id="ci-panel-settings" class="postbox">
          <h2>Plugin Settings</h2>
          <div class="ci-grid">
            <div class="ci-col-1">
              <p>Simply input your publisher UID into the field below and hit save. You can do this as soon as your publisher is entered into your <a target="_blank" rel="noopener noreferrer" href="https://admin.contentignite.com">publishing cloud</a>, even while waiting for verification and set-up completion.</p>
              <p>You can find your UID from your publisher list inside your <a target="_blank" rel="noopener noreferrer" href="https://admin.contentignite.com/publisher">publishing cloud</a>.</p>
              <div class="ci-panel-settings">
                <table class="widefat">
                  <tbody>
                    <tr>
                      <th><label for="ci_options[uid]">Publisher UID</label></th>
                      <td><input id='ci_options[uid]' name='ci_options[uid]' type='number' value='<?php echo esc_attr( $options['uid'] ); ?>' /></td>
                    </tr>
                    <tr>
                      <th></th>
                      <td><input type="submit" class="button-primary" value="Save Changes"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="ci-col-2">
              <img src="<?php echo esc_url($admin_dir.'img/find_my_uid.png'); ?>" alt="Find your UID in your publisher list" class="ci-help-image" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>