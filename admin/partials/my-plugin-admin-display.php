<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://my-plugin/author
 * @since      1.0.0
 *
 * @package    My_Plugin
 * @subpackage My_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<form method="post" name="my_options" action="options.php">
 
        <?php

        /**
         *  Load all form element values
        */
        $options = get_option($this->plugin_name);

        /**
         *  Current state of options
         */
        $footer_text = $options['footer_text'];

        /**
         *   Returns nothing. Displays hidden input fields.
         */
        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );
        
        ?>

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Text in the footer', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name;?>-footer_text">
                <span><?php esc_attr_e('Text in the footer', $this->plugin_name);?></span>
            </label>
            <input type="text"
                   class="regular-text" id="<?php echo $this->plugin_name;?>-footer_text"
                   name="<?php echo $this->plugin_name;?>[footer_text]"
                   value="<?php if(!empty($footer_text)) esc_attr_e($footer_text, $this->plugin_name);?>"
                   placeholder="<?php esc_attr_e('Text in the footer', $this->plugin_name);?>"
            />
        </fieldset>

        <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>

</form>