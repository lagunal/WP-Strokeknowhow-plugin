<?php

// enqueue .js file 
add_action('wp_enqueue_scripts','toolkit_api_js');

function toolkit_api_js() {
    wp_enqueue_script('toolkit-js', plugins_url('/custom-toolkit/js/Toolkit.js'), array('jquery'), microtime(), false);
}

//Adding an endpoint to get emergency Toolkit json data on WP REST API
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/get-emergency/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'getEmergency',
    ) );
} );

// Return emergency toolkit json data for current user id
function getEmergency($data) {

	$row = new WP_Query(array(
		'post_type' => 'emergency',
		'post_per_page' => -1,
		'author' => $data['id']
	));

	while ($row->have_posts()) {
		$row->the_post();
        $data = json_decode(get_field('json_field'), true);
    }
    return $data;
}

//Adding an endpoint to get schedule Toolkit json data on WP REST API
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/get-schedule/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'getSchedule',
    ) );
} );

// Return schedule toolkit json data for current user id
function getSchedule($data) {

	$row = new WP_Query(array(
		'post_type' => 'schedule',
		'post_per_page' => -1,
		'author' => $data['id']
	));

	while ($row->have_posts()) {
		$row->the_post();
        $data = json_decode(get_field('json_field'), true);
    }
    return $data;
}

//Adding an endpoint to get physical Toolkit json data on WP REST API
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/get-physical/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'getPhysical',
    ) );
} );

// Return physical toolkit json data for current user id
function getPhysical($data) {

	$row = new WP_Query(array(
		'post_type' => 'physical',
		'post_per_page' => -1,
		'author' => $data['id']
	));

	while ($row->have_posts()) {
		$row->the_post();
        $data = json_decode(get_field('json_field'), true);
    }
    return $data;
}

//Adding an endpoint to get medication Toolkit json data on WP REST API
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/get-medication/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'getMedication',
    ) );
} );

// Return physical toolkit json data for current user id
function getMedication($data) {

	$row = new WP_Query(array(
		'post_type' => 'medication',
		'post_per_page' => -1,
		'author' => $data['id']
	));

	while ($row->have_posts()) {
		$row->the_post();
        $data = json_decode(get_field('json_field'), true);
    }
    return $data;
}

//Adding an endpoint to get help_needed Toolkit json data on WP REST API
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/get-help_needed/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'getHelp_needed',
    ) );
} );

// Return physical toolkit json data for current user id
function getHelp_needed($data) {

	$row = new WP_Query(array(
		'post_type' => 'help_needed',
		'post_per_page' => -1,
		'author' => $data['id']
	));

	while ($row->have_posts()) {
		$row->the_post();
        $data = json_decode(get_field('json_field'), true);
    }
    return $data;
}

//Adding an endpoint to save post emergency Toolkit
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/save-emergency', array(
        'methods' => 'POST',
        'callback' => 'postEmergency',
    ) );
} );

// callback function to post emergency data
function postEmergency($data) {

	$row = new WP_Query(array(
		'post_type' => 'emergency',
		'post_per_page' => -1,
		'author' => $data['id']
    ));

    if ($row->found_posts) {

        update_post_meta( $row->post->ID, 'json_field', json_encode($data['json']));

    } else {

            wp_insert_post(array(
            'post_type' => 'emergency',
            'post_status' => 'publish',
            'meta_input' => array(
                'json_field' => json_encode($data['json']),
            )
            ));

    }

}

//Adding an endpoint to save post schdule Toolkit
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/save-schedule', array(
        'methods' => 'POST',
        'callback' => 'postSchedule',
    ) );
} );

// callback function to post emergency data
function postSchedule($data) {

	$row = new WP_Query(array(
		'post_type' => 'schedule',
		'post_per_page' => -1,
		'author' => $data['id']
    ));

    if ($row->found_posts) {

        update_post_meta( $row->post->ID, 'json_field', json_encode($data['json']));

    } else {

            wp_insert_post(array(
            'post_type' => 'schedule',
            'post_status' => 'publish',
            'meta_input' => array(
                'json_field' => json_encode($data['json'])
            )
            ));

    }

}

//Adding an endpoint to save post physical Toolkit
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/save-physical', array(
        'methods' => 'POST',
        'callback' => 'postPhysical',
    ) );
} );

// callback function to post physical data
function postPhysical($data) {

	$row = new WP_Query(array(
		'post_type' => 'physical',
		'post_per_page' => -1,
		'author' => $data['id']
    ));

    if ($row->found_posts) {

        update_post_meta( $row->post->ID, 'json_field', json_encode($data['json']));

    } else {

            wp_insert_post(array(
            'post_type' => 'physical',
            'post_status' => 'publish',
            'meta_input' => array(
                'json_field' => json_encode($data['json'])
            )
            ));

    }

}

//Adding an endpoint to save post medication Toolkit
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/save-medication', array(
        'methods' => 'POST',
        'callback' => 'postMedication',
    ) );
} );

// callback function to post medication data
function postMedication($data) {

	$row = new WP_Query(array(
		'post_type' => 'medication',
		'post_per_page' => -1,
		'author' => $data['id']
    ));

    if ($row->found_posts) {

        update_post_meta( $row->post->ID, 'json_field', json_encode($data['json']));

    } else {

            wp_insert_post(array(
            'post_type' => 'medication',
            'post_status' => 'publish',
            'meta_input' => array(
                'json_field' => json_encode($data['json'])
            )
            ));

    }

}

//Adding an endpoint to save post help needed Toolkit
add_action( 'rest_api_init', function () {
    register_rest_route( 'toolkit/v1', '/save-help_needed', array(
        'methods' => 'POST',
        'callback' => 'postHelpNeeded',
    ) );
} );

// callback function to post physical data
function postHelpNeeded($data) {

	$row = new WP_Query(array(
		'post_type' => 'help_needed',
		'post_per_page' => -1,
		'author' => $data['id']
    ));

    if ($row->found_posts) {

        update_post_meta( $row->post->ID, 'json_field', json_encode($data['json']));

    } else {

            wp_insert_post(array(
            'post_type' => 'help_needed',
            'post_status' => 'publish',
            'meta_input' => array(
                'json_field' => json_encode($data['json'])
            )
            ));

    }

}