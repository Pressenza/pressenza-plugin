<?php
/*
Plugin Name:       Pressenza
Plugin URI:        http://pressenza.com
Version:           0.1.2
Description:       collection of widgets and setup for pressenza.com
Author:            Stefano Cecere & Tom Butikofer
Author URI:        https://github.com/Pressenza
GitHub Plugin URI: https://github.com/Pressenza/pressenza-plugin
GitHub Branch:     master
*/

class MultilanguageHtmlWidget extends WP_Widget {

  function MultilanguageHtmlWidget()  {
    $widget_ops = array('classname' => 'MultilanguageHtmlWidget', 'description' => 'widget description' );
    $this->WP_Widget('MultilanguageHtmlWidget', 'Pressenza: Multilanguage HTML', $widget_ops);
  }

  function form($instance) {
    $instance = wp_parse_args( (array) $instance, array(
		'html_default' => '',
		'html_it' => '',
		'html_es' => '',
		'html_fr' => '',
		'html_pt' => '',
		'html_hu' => ''
		)
    );
	$html_default = esc_textarea($instance['html_default']);
	$html_it = esc_textarea($instance['html_it']);
	$html_es = esc_textarea($instance['html_es']);
	$html_fr = esc_textarea($instance['html_fr']);
	$html_pt = esc_textarea($instance['html_pt']);
	$html_hu = esc_textarea($instance['html_hu']);
?>
	<label for="<?php echo $this->get_field_id( 'html_default' ); ?>">HTML (default):</label>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html_default' ); ?>" name="<?php echo $this->get_field_name( 'html_default' ); ?>"><?php echo $html_default; ?></textarea>

	<label for="<?php echo $this->get_field_id( 'html_it' ); ?>">HTML (italian):</label>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html_it' ); ?>" name="<?php echo $this->get_field_name( 'html_it' ); ?>"><?php echo $html_it; ?></textarea>

	<label for="<?php echo $this->get_field_id( 'html_es' ); ?>">HTML (espanol):</label>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html_es' ); ?>" name="<?php echo $this->get_field_name( 'html_es' ); ?>"><?php echo $html_es; ?></textarea>

	<label for="<?php echo $this->get_field_id( 'html_fr' ); ?>">HTML (francais):</label>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html_fr' ); ?>" name="<?php echo $this->get_field_name( 'html_fr' ); ?>"><?php echo $html_fr; ?></textarea>

	<label for="<?php echo $this->get_field_id( 'html_pt' ); ?>">HTML (portoguese):</label>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html_pt' ); ?>" name="<?php echo $this->get_field_name( 'html_pt' ); ?>"><?php echo $html_pt; ?></textarea>

	<label for="<?php echo $this->get_field_id( 'html_hu' ); ?>">HTML (hungarian):</label>
	<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html_hu' ); ?>" name="<?php echo $this->get_field_name( 'html_hu' ); ?>"><?php echo $html_hu; ?></textarea>

<?php
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['html_default'] = $new_instance['html_default'];
    $instance['html_it'] = $new_instance['html_it'];
    $instance['html_es'] = $new_instance['html_es'];
    $instance['html_fr'] = $new_instance['html_fr'];
    $instance['html_pt'] = $new_instance['html_pt'];
    $instance['html_hu'] = $new_instance['html_hu'];

    return $instance;
  }

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		//echo $before_widget;

		switch (ICL_LANGUAGE_CODE) {
			case 'it':
				$html = $instance['html_it'];
			break;
			case 'es':
				$html = $instance['html_es'];
			break;
 			case 'fr':
				$html = $instance['html_fr'];
			break;
			case 'pt-pt':
				$html = $instance['html_pt'];
			break;
			case 'hu':
				$html = $instance['html_hu'];
			break;
			default:
				$html = $instance['html_default'];
			break;
		}

		echo $html;

		//echo $after_widget;
	}

}

add_action( 'widgets_init', create_function('', 'return register_widget("MultilanguageHtmlWidget");') );

?>