<?php
/*
	Plugin Name: Web Dev Estimator
	Plugin URI: http://blah.com
	Description: This plugin is a simple cost estimator for web development projects.
	Author: Levi
	Version: .1
	Author URI: http://levisawesomedevelopment.com/
*/

add_shortcode('estimator', 'display_dev_estimator');
function display_dev_estimator() {
	// Enqueue our styles
	wp_enqueue_style('datetimepicker', plugins_url('css/jquery.datetimepicker.css', __FILE__), false, '2.2.8');
	wp_enqueue_style('dev-estimator', plugins_url('css/dev-estimator.css', __FILE__), false, '1.0');
	// Enqueue our scripts
	wp_enqueue_script('datetimepicker', plugins_url('js/jquery.datetimepicker.js', __FILE__), array('jquery'), '2.2.8', true);
	wp_enqueue_script('momentjs', plugins_url('js/moment.min.js', __FILE__), false, '2.6.0', true);
	wp_enqueue_script('dev-estimator', plugins_url('js/dev-estimator.js', __FILE__), array('jquery', 'datetimepicker', 'momentjs'), '1.0', true);

	// Setup output from the [estimator] shortcode
$html = <<<HTML
	<p>Please fill out the form below to generate a rough estimate of cost to complete your project. <br><small><em><strong>Note:</strong> all estimates are subject to change based on any additional details provided. This cost is not a fixed bid or guarantee.</em></small></p>
	<form id="dev-estimator" method="post">
		<fieldset>
			<legend>Development Cost Estimator</legend>
			<label>Number of pages: <input id="page-count" type="number" min="1"></label><br>
			<label>Deadline: <input id="deadline" class="datepicker" type="text"></label><br>
			<input type="submit" value="Estimate Cost">
		</fieldset>
	</form>
	<div id="estimate"></div>
HTML;

	return $html;
}