<?php
/*
Plugin Name: MLB Magic Number Widget
Plugin URI: http://www.blogseye.com
Description: Displays the Calculated Major League Baseball Team Magic Number in a sidebar.
Author: Keith P. Graham
Version: 1.0
Requires at least: 2.8
Author URI: http://www.blogseye.com
Tested up to: 3.1

*/

class Widget_kpg_magicnumber extends WP_Widget {

   /** constructor */
    function Widget_kpg_magicnumber() {
        parent::WP_Widget(false, $name = 'MLB Magic Number Widget');	
    }


    /** @see WP_Widget::form */
    function form($instance) {				
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
		$team = esc_attr($instance['team']);
		if (empty($team)) $team='Mets';
       ?>
	   
	   
<fieldset style="border:thin black solid;padding:2px;"><legend>Title:</legend>	
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</fieldset>
	   
<fieldset style="border:thin black solid;padding:2px;"><legend>Team:</legend>	
		<select class="widefat" id="<?php echo $this->get_field_id('team'); ?>" name="<?php echo $this->get_field_name('team'); ?>">
			<option <?php if($team=='Red Sox') echo 'selected'; ?> value="Red Sox">Boston Red Sox</option>
			<option <?php if($team=='Orioles') echo 'selected'; ?> value="Orioles">Baltimore Orioles</option>
			<option <?php if($team=='Rays') echo 'selected'; ?> value="Rays">Tampa Bay Rays</option>
			<option <?php if($team=='Blue Jays') echo 'selected'; ?> value="Blue Jays">Toronto Blue Jays</option>
			<option <?php if($team=='Yankees') echo 'selected'; ?> value="Yankees">NY Yankees</option>
			<option <?php if($team=='White Sox') echo 'selected'; ?> value="White Sox">Chi White Sox</option>
			<option <?php if($team=='Indians') echo 'selected'; ?> value="Indians">Cleveland Indians</option>
			<option <?php if($team=='Tigers') echo 'selected'; ?> value="Tigers">Detroit Tigers</option>
			<option <?php if($team=='Royals') echo 'selected'; ?> value="Royals">Kansas City Royals</option>
			<option <?php if($team=='Twins') echo 'selected'; ?> value="Twins">Minnesota Twins</option>
			<option <?php if($team=='Angels') echo 'selected'; ?> value="Angels">LA Angels</option>
			<option <?php if($team=='Athletics') echo 'selected'; ?> value="Athletics">Oakland Athletics</option>
			<option <?php if($team=='Mariners') echo 'selected'; ?> value="Mariners">Seattle Mariners</option>
			<option <?php if($team=='Rangers') echo 'selected'; ?> value="Rangers">Texas Rangers</option>
			<option <?php if($team=='Braves') echo 'selected'; ?> value="Braves">Atlanta Braves</option>
			<option <?php if($team=='Marlins') echo 'selected'; ?> value="Marlins">Florida Marlins</option>
			<option <?php if($team=='Mets') echo 'selected'; ?> value="Mets">NY Mets</option>
			<option <?php if($team=='Phillies') echo 'selected'; ?> value="Phillies">Philadelphia Phillies</option>
			<option <?php if($team=='Nationals') echo 'selected'; ?> value="Nationals">Washington Nationals</option>
			<option <?php if($team=='Cubs') echo 'selected'; ?> value="Cubs">Chi Cubs</option>
			<option <?php if($team=='Reds') echo 'selected'; ?> value="Reds">Cincinnati Reds</option>
			<option <?php if($team=='Astros') echo 'selected'; ?> value="Astros">Houston Astros</option>
			<option <?php if($team=='Brewers') echo 'selected'; ?> value="Brewers">Milwaukee Brewers</option>
			<option <?php if($team=='Pirates') echo 'selected'; ?> value="Pirates">Pittsburgh Pirates</option>
			<option <?php if($team=='Cardinals') echo 'selected'; ?> value="Cardinals">St. Louis Cardinals</option>
			<option <?php if($team=='Diamondbacks') echo 'selected'; ?> value="Diamondbacks">Arizona Diamondbacks</option>
			<option <?php if($team=='Rockies') echo 'selected'; ?> value="Rockies">Colorado Rockies</option>
			<option <?php if($team=='Dodgers') echo 'selected'; ?> value="Dodgers">LA Dodgers Dodgers</option>
			<option <?php if($team=='Padres') echo 'selected'; ?> value="Padres">San Diego Padres</option>
			<option <?php if($team=='Giants') echo 'selected'; ?> value="Giants">San Francisco Giants</option>
		</select>
		
</fieldset>


<?PHP
		// end of the functional section
	}

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		// processes widget options to be saved
		// have to update the new instance
		return $new_instance;
	}

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
		// start of the display section
		echo "\r\n<!-- Start of MLB Magic Number Widget -->\r\n";
		// outputs the content of the widget
		extract( $args );
		$title = esc_attr($instance['title']);
		$team = esc_attr($instance['team']);
		

		if (empty($title)) $title='';
		if (empty($team)) $team='Mets';
		echo $before_widget;
		if ( $title) {
			echo $before_title . $title . $after_title;
		}
		
		// $team tells us who we are looking for, but we have to change that to a domain for Yankees, mets, etc
		// link and javascript goes here
		$link="http://www.mlbmagicnumbers.com/magicnumber/$team/index.html";
		switch ($team) {
			case 'Mets':
			case 'Yankees':
			case 'Astros':
			case 'Braves':
			case 'Cardinals':
			case 'Phillies';
			case 'Angels':
				$link="http://www.$team"."MagicNumber.com/";
		}
		?>
<a href="<?php echo $link; ?>">
<img border="0" src="http://www.mlbmagicnumbers.com/magicimage/<?php echo $team; ?>.png"><br>
<?php echo $team; ?> Magic Number</a>
		  <?php
		echo $after_widget;		
		echo "\r\n<!-- end of MLB Magic Number Widget -->\r\n";

	}
}

function kpg_magicnumber_control()  {
	// no options - just display begging message
	?>
<div class="wrap">
  <h2>MLB Magic Number Widget</h2>
  <h4>The MLB Magic Number Widget is installed and working correctly.</h4>
  <p>To use this, drag the widget to your sidebar</p>	
  <hr/>
  <p>This plugin is free and I expect nothing in return. If you would like to support my programming, you can buy my book of short stories.<br/>
<a targe="_blank" href="http://www.amazon.com/gp/product/1456336584?ie=UTF8&tag=thenewjt30page&linkCode=as2&camp=1789&creative=390957&creativeASIN=1456336584">Error Message Eyes: A Programmer's Guide to the Digital Soul</a></p>
<p>A link on your blog to one of my personal sites would be appreciated.</p>
  <p><a target="_blank" href="http://www.WestNyackHoney.com">West Nyack Honey</a> (I keep bees and sell the honey)<br />
   <a target="_blank" href="http://www.cthreepo.com/blog">Wandering Blog </a> (My personal Blog) <br />
    <a target="_blank"  href="http://www.cthreepo.com">Resources for Science Fiction</a> (Writing Science Fiction) <br />
    <a target="_blank"  href="http://www.jt30.com">The JT30 Page</a> (Amplified Blues Harmonica) <br />
    <a target="_blank"  href="http://www.harpamps.com">Harp Amps</a> (Vacuum Tube Amplifiers for Blues) <br />
    <a target="_blank"  href="http://www.blogseye.com">Blog&apos;s Eye</a> (PHP coding) <br />
    <a target="_blank"  href="http://www.cthreepo.com/bees">Bee Progress Beekeeping Blog</a> (My adventures as a new beekeeper) </p>
</div>
	
	
	<?php

}

add_action('widgets_init', create_function('', 'return register_widget("Widget_kpg_magicnumber");'));
function kpg_magicnumber_init() {
   add_options_page('Magic Number', 'Magic Number', 'manage_options',__FILE__,'kpg_magicnumber_control');
}
add_action('admin_menu', 'kpg_magicnumber_init');


