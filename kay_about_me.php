<?php
/**
 * Plugin Name:   Kay Wordpress Widget Plugin
 * Plugin URI:    https://twitter.com/bigk009
 * Description:   Adds a widget that displays about me content.
 * Version:       1.0
 * Author:        Kay Odole
 * Author URI:    https://twitter.com/bigk009
 */


class kay_about_me extends WP_Widget
{
  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'kay_about_me', 'description' => 'This widget displays about me content' );
    parent::__construct( 'kay_about_me', 'About Me Widget Plugin', $widget_options );
  }

  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $imgurl1 = $instance[ 'imgurl1' ];
    $aboutme = $instance[ 'aboutme' ];
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
    <img src="<?php echo $imgurl1 ?>" width="100%"/>
    <p><?php echo $aboutme ?></p>
    <!-- <table style="width:100%">
    <tr>
    <th style="background:blue"><img src="<?php echo $imgurl1 ?>" width="100%"/></th>
    <td><img src="<?php echo $imgurl2 ?>" width="100%"/></td>
    </tr>
    </table> -->
    <br>
    <?php echo $args['after_widget'];
  }

  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
    $imgurl1 = ! empty( $instance['imgurl1'] ) ? $instance['imgurl1'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'imgurl1' ); ?>">About Me Image Url:</label>
      <input type="textarea" id="<?php echo $this->get_field_id( 'imgurl1' ); ?>" name="<?php echo $this->get_field_name( 'imgurl1' ); ?>" value="<?php echo esc_attr( $imgurl1 ); ?>" />
    </p><?php
    $aboutme = ! empty( $instance['aboutme'] ) ? $instance['aboutme'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'aboutme' ); ?>">About Me Content:</label>
      <input type="textarea" id="<?php echo $this->get_field_id( 'aboutme' ); ?>" name="<?php echo $this->get_field_name( 'aboutme' ); ?>" value="<?php echo esc_attr( $aboutme ); ?>" />
    </p><?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'imgurl1' ] = strip_tags( $new_instance[ 'imgurl1' ] );
    $instance[ 'aboutme' ] = strip_tags( $new_instance[ 'aboutme' ] );
    return $instance;
  }

}

 // Register and load the widget
function kay_about_me_load_widget() {
    register_widget( 'kay_about_me' );
}
add_action( 'widgets_init', 'kay_about_me_load_widget' );

?>