<?php
/**
 * WP-Reactivate
 *
 *
 * @package   WP-Reactivate
 * @author    Pangolin
 * @license   GPL-3.0
 * @link      https://gopangolin.com
 * @copyright 2017 Pangolin (Pty) Ltd
 */

namespace Pangolin\WPR\Endpoint;
use Pangolin\WPR;

/**
 * @subpackage REST_Controller
 */
class Shortcode {
    /**
	 * Instance of this class.
	 *
	 * @since    0.8.1
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     0.8.1
	 */
	private function __construct() {
        $plugin = WPR\Plugin::get_instance();
		$this->plugin_slug = $plugin->get_plugin_slug();
	}

    /**
     * Set up WordPress hooks and filters
     *
     * @return void
     */
    public function do_hooks() {
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

	/**
	 * Return an instance of this class.
	 *
	 * @since     0.8.1
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
			self::$instance->do_hooks();
		}

		return self::$instance;
	}

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes() {
        $version = '1';
        $namespace = $this->plugin_slug . '/v' . $version;
        //********* endpoints Emergency Toolkit*/
        $endpointEmergency = '/emergency/(?P<id>\d+)';
        register_rest_route( $namespace,$endpointEmergency, array(
                       array(         
                        'methods'               => \WP_REST_Server::READABLE,
                        'callback'              => array( $this, 'get_emergency' ),
                        'args'                  => array(),                                          
                ),
            ) );

        register_rest_route( $namespace, $endpointEmergency, array(
            array(
                'methods'               => \WP_REST_Server::EDITABLE,
                'callback'              => array( $this, 'update_emergency' ),
                'args'                  => array(),
            ),
        ) );

        //********* endpoint Medications Toolkit */
        $endpointMedication = '/medication/(?P<id>\d+)';
        register_rest_route( $namespace,$endpointMedication, array(
                    array(         
                        'methods'               => \WP_REST_Server::READABLE,
                        'callback'              => array( $this, 'get_medication' ),
                        'args'                  => array(),                                          
                ),
            ) );

        register_rest_route( $namespace, $endpointMedication, array(
            array(
                'methods'               => \WP_REST_Server::EDITABLE,
                'callback'              => array( $this, 'update_medication' ),
                'args'                  => array(),
            ),
        ) );

       //********* endpoint Help Needed Toolkit */
       $endpointHelp = '/helpNeeded/(?P<id>\d+)';
       register_rest_route( $namespace,$endpointHelp, array(
                   array(         
                       'methods'               => \WP_REST_Server::READABLE,
                       'callback'              => array( $this, 'get_helpNeeded' ),
                       'args'                  => array(),                                          
               ),
           ) );

       register_rest_route( $namespace, $endpointHelp, array(
           array(
               'methods'               => \WP_REST_Server::EDITABLE,
               'callback'              => array( $this, 'update_helpNeeded' ),
               'args'                  => array(),
           ),
       ) );

        //********* endpoint Weekly Schedule Toolkit */
        $endpointSchedule = '/schedule/(?P<id>\d+)';
        register_rest_route( $namespace,$endpointSchedule, array(
                    array(         
                        'methods'               => \WP_REST_Server::READABLE,
                        'callback'              => array( $this, 'get_schedule' ),
                        'args'                  => array(),                                          
                ),
            ) );

        register_rest_route( $namespace, $endpointSchedule, array(
            array(
                'methods'               => \WP_REST_Server::EDITABLE,
                'callback'              => array( $this, 'update_schedule' ),
                'args'                  => array(),
            ),
        ) );

       //********* endpoint Physical therapy Toolkit */
       $endpointPhysical = '/physical/(?P<id>\d+)';
       register_rest_route( $namespace,$endpointPhysical, array(
                   array(         
                       'methods'               => \WP_REST_Server::READABLE,
                       'callback'              => array( $this, 'get_physical' ),
                       'args'                  => array(),                                          
               ),
           ) );

       register_rest_route( $namespace, $endpointPhysical, array(
           array(
               'methods'               => \WP_REST_Server::EDITABLE,
               'callback'              => array( $this, 'update_physical' ),
               'args'                  => array(),
           ),
       ) );

    }

    /**
     * Get Emergency
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function get_emergency( $request ) {
        $params = $request->get_params();
        $userID = sanitize_text_field($params['id']);
  
        global $wpdb;
        $row = $wpdb->get_var( $wpdb->prepare(
            "
                SELECT m.meta_value FROM wp_posts p, wp_postmeta m
                WHERE p.ID = m.post_id AND
                    m.meta_key = 'json_field' and
                    p.post_author = %d AND
                    p.post_status = 'publish' AND 
                    p.post_type = 'emergency'
            ",
            $userID
        ));
        
        $data = json_decode($row, true);
        $wpdb->flush();

        return new \WP_REST_Response( array(
            'success' => true,
            'value' => $data
        ), 200 );
    }

    /**
     * Update Emergency
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function update_emergency( $request ) {
        
        $userID = sanitize_text_field($request->get_param( 'id' ));
        $data = sanitize_text_field($request->get_param( 'data' ));

        global $wpdb;
        $postID = $wpdb->get_var( $wpdb->prepare(
            "
            SELECT p.ID FROM wp_posts p
            WHERE 
                p.post_author = %d AND
                p.post_status = 'publish' AND 
                p.post_type = 'emergency'
            ",
            $userID
        ));
        
        if (!empty($postID)) { //if post exists, update metadata json_field -> ACF
                
                    $wpdb->query( $wpdb->prepare( 
                        "
                        UPDATE wp_postmeta
                            set wp_postmeta.meta_value = %s
                            where wp_postmeta.meta_key = 'json_field' AND
                            wp_postmeta.post_id = %d
                        ",
                            $data, $postID
                        )
                    );

        } else { //if post does not exist, create new post and update metadata json_field -> ACF
                    $wpdb->query( $wpdb->prepare( 
                        "
                        INSERT INTO $wpdb->posts
                        ( post_author, post_status, comment_status, ping_status, post_type )
                        VALUES ( %d, %s, %s, %s, %s )
                        ", 
                            array(
                                $userID, 'publish', 'closed', 'closed', 'emergency'
                            ) 
                    ) );

                    $postID = $wpdb->insert_id; //extract the post ID inserted

                    $wpdb->query( $wpdb->prepare( 
                        "
                            INSERT INTO $wpdb->postmeta
                            ( post_id, meta_key, meta_value )
                            VALUES ( %d, %s, %s )
                        ", 
                            array(
                                $postID, 'json_field', $data
                            ) 
                    ) );
            }

        $wpdb->flush();
        $data = json_decode($data, true);
        return new \WP_REST_Response( array(
            'success'   => 'ok',
            'value'     => $data
        ), 200 );
    }


    /**
     * Get Medication
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function get_medication( $request ) {
        $params = $request->get_params();
        $userID = sanitize_text_field($params['id']);
        global $wpdb;
        $row = $wpdb->get_var( $wpdb->prepare(
            "
                SELECT m.meta_value FROM wp_posts p, wp_postmeta m
                WHERE p.ID = m.post_id AND
                    m.meta_key = 'json_field' and
                    p.post_author = %d AND
                    p.post_status = 'publish' AND 
                    p.post_type = 'medication'
            ",
            $userID
        ));
        
        $data = json_decode($row, true);
        $wpdb->flush();

        return new \WP_REST_Response( array(
            'success' => true,
            'value' => $data
        ), 200 );
    }

    /**
     * Update Medication
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function update_medication( $request ) {
        
        $userID = sanitize_text_field($request->get_param( 'id' ));
        $data = sanitize_text_field($request->get_param( 'data' ));

        global $wpdb;
        $postID = $wpdb->get_var( $wpdb->prepare(
            "
            SELECT p.ID FROM wp_posts p
            WHERE 
                p.post_author = %d AND
                p.post_status = 'publish' AND 
                p.post_type = 'medication'
            ",
            $userID
        ));
        
        if (!empty($postID)) { //if post exists, update metadata json_field -> ACF
                
                    $wpdb->query( $wpdb->prepare( 
                        "
                        UPDATE wp_postmeta
                            set wp_postmeta.meta_value = %s
                            where wp_postmeta.meta_key = 'json_field' AND
                            wp_postmeta.post_id = %d
                        ",
                            $data, $postID
                        )
                    );

        } else { //if post does not exist, create new post and update metadata json_field -> ACF
                    $wpdb->query( $wpdb->prepare( 
                        "
                        INSERT INTO $wpdb->posts
                        ( post_author, post_status, comment_status, ping_status, post_type )
                        VALUES ( %d, %s, %s, %s, %s )
                        ", 
                            array(
                                $userID, 'publish', 'closed', 'closed', 'medication'
                            ) 
                    ) );

                    $postID = $wpdb->insert_id; //extract the post ID inserted

                    $wpdb->query( $wpdb->prepare( 
                        "
                            INSERT INTO $wpdb->postmeta
                            ( post_id, meta_key, meta_value )
                            VALUES ( %d, %s, %s )
                        ", 
                            array(
                                $postID, 'json_field', $data
                            ) 
                    ) );
            }

        $wpdb->flush();
        $data = json_decode($data, true);
        return new \WP_REST_Response( array(
            'success'   => 'ok',
            'value'     => $data
        ), 200 );
    }



 /**
     * Get Help Needed
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function get_helpNeeded( $request ) {
        $params = $request->get_params();
        $userID = sanitize_text_field($params['id']);
        global $wpdb;
        $row = $wpdb->get_var( $wpdb->prepare(
            "
                SELECT m.meta_value FROM wp_posts p, wp_postmeta m
                WHERE p.ID = m.post_id AND
                    m.meta_key = 'json_field' and
                    p.post_author = %d AND
                    p.post_status = 'publish' AND 
                    p.post_type = 'help_needed'
            ",
            $userID
        ));
        
        $data = json_decode($row, true);
        $wpdb->flush();

        return new \WP_REST_Response( array(
            'success' => true,
            'value' => $data
        ), 200 );
    }

    /**
     * Update HelpNeeded
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function update_helpNeeded( $request ) {
        
        $userID = sanitize_text_field($request->get_param( 'id' ));
        $data = sanitize_text_field($request->get_param( 'data' ));

        global $wpdb;
        $postID = $wpdb->get_var( $wpdb->prepare(
            "
            SELECT p.ID FROM wp_posts p
            WHERE 
                p.post_author = %d AND
                p.post_status = 'publish' AND 
                p.post_type = 'help_needed'
            ",
            $userID
        ));
        
        if (!empty($postID)) { //if post exists, update metadata json_field -> ACF
                
                    $wpdb->query( $wpdb->prepare( 
                        "
                        UPDATE wp_postmeta
                            set wp_postmeta.meta_value = %s
                            where wp_postmeta.meta_key = 'json_field' AND
                            wp_postmeta.post_id = %d
                        ",
                            $data, $postID
                        )
                    );

        } else { //if post does not exist, create new post and update metadata json_field -> ACF
                    $wpdb->query( $wpdb->prepare( 
                        "
                        INSERT INTO $wpdb->posts
                        ( post_author, post_status, comment_status, ping_status, post_type )
                        VALUES ( %d, %s, %s, %s, %s )
                        ", 
                            array(
                                $userID, 'publish', 'closed', 'closed', 'help_needed'
                            ) 
                    ) );

                    $postID = $wpdb->insert_id; //extract the post ID inserted

                    $wpdb->query( $wpdb->prepare( 
                        "
                            INSERT INTO $wpdb->postmeta
                            ( post_id, meta_key, meta_value )
                            VALUES ( %d, %s, %s )
                        ", 
                            array(
                                $postID, 'json_field', $data
                            ) 
                    ) );
            }

        $wpdb->flush();
        $data = json_decode($data, true);
        return new \WP_REST_Response( array(
            'success'   => 'ok',
            'value'     => $data
        ), 200 );
    }


    /**
     * Get Weekly Schedule
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function get_schedule( $request ) {
        $params = $request->get_params();
        $userID = sanitize_text_field($params['id']);
        global $wpdb;
        $row = $wpdb->get_var( $wpdb->prepare(
            "
                SELECT m.meta_value FROM wp_posts p, wp_postmeta m
                WHERE p.ID = m.post_id AND
                    m.meta_key = 'json_field' and
                    p.post_author = %d AND
                    p.post_status = 'publish' AND 
                    p.post_type = 'schedule'
            ",
            $userID
        ));
        
        $data = json_decode($row, true);
        $wpdb->flush();

        return new \WP_REST_Response( array(
            'success' => true,
            'value' => $data
        ), 200 );
    }

    /**
     * Update Weekly Schedule
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function update_schedule( $request ) {
        
        $userID = sanitize_text_field($request->get_param( 'id' ));
        $data = sanitize_text_field($request->get_param( 'data' ));

        global $wpdb;
        $postID = $wpdb->get_var( $wpdb->prepare(
            "
            SELECT p.ID FROM wp_posts p
            WHERE 
                p.post_author = %d AND
                p.post_status = 'publish' AND 
                p.post_type = 'schedule'
            ",
            $userID
        ));
        
        if (!empty($postID)) { //if post exists, update metadata json_field -> ACF
                
                    $wpdb->query( $wpdb->prepare( 
                        "
                        UPDATE wp_postmeta
                            set wp_postmeta.meta_value = %s
                            where wp_postmeta.meta_key = 'json_field' AND
                            wp_postmeta.post_id = %d
                        ",
                            $data, $postID
                        )
                    );

        } else { //if post does not exist, create new post and update metadata json_field -> ACF
                    $wpdb->query( $wpdb->prepare( 
                        "
                        INSERT INTO $wpdb->posts
                        ( post_author, post_status, comment_status, ping_status, post_type )
                        VALUES ( %d, %s, %s, %s, %s )
                        ", 
                            array(
                                $userID, 'publish', 'closed', 'closed', 'schedule'
                            ) 
                    ) );

                    $postID = $wpdb->insert_id; //extract the post ID inserted

                    $wpdb->query( $wpdb->prepare( 
                        "
                            INSERT INTO $wpdb->postmeta
                            ( post_id, meta_key, meta_value )
                            VALUES ( %d, %s, %s )
                        ", 
                            array(
                                $postID, 'json_field', $data
                            ) 
                    ) );
            }

        $wpdb->flush();
        $data = json_decode($data, true);
        return new \WP_REST_Response( array(
            'success'   => 'ok',
            'value'     => $data
        ), 200 );
    }
    
    /**
     * Get Physical Therapy
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function get_physical( $request ) {
        $params = $request->get_params();
        $userID = sanitize_text_field($params['id']);
        global $wpdb;
        $row = $wpdb->get_var( $wpdb->prepare(
            "
                SELECT m.meta_value FROM wp_posts p, wp_postmeta m
                WHERE p.ID = m.post_id AND
                    m.meta_key = 'json_field' and
                    p.post_author = %d AND
                    p.post_status = 'publish' AND 
                    p.post_type = 'physical'
            ",
            $userID
        ));
        
        $data = json_decode($row, true);
        $wpdb->flush();

        return new \WP_REST_Response( array(
            'success' => true,
            'value' => $data
        ), 200 );
    }

    /**
     * Update Physical Therapy
     *
     * @param WP_REST_Request $request Full data about the request.
     * @return WP_Error|WP_REST_Request
     */
    public function update_physical( $request ) {
        
        $userID = sanitize_text_field($request->get_param( 'id' ));
        $data = sanitize_text_field($request->get_param( 'data' ));

        global $wpdb;
        $postID = $wpdb->get_var( $wpdb->prepare(
            "
            SELECT p.ID FROM wp_posts p
            WHERE 
                p.post_author = %d AND
                p.post_status = 'publish' AND 
                p.post_type = 'physical'
            ",
            $userID
        ));
        
        if (!empty($postID)) { //if post exists, update metadata json_field -> ACF
                
                    $wpdb->query( $wpdb->prepare( 
                        "
                        UPDATE wp_postmeta
                            set wp_postmeta.meta_value = %s
                            where wp_postmeta.meta_key = 'json_field' AND
                            wp_postmeta.post_id = %d
                        ",
                            $data, $postID
                        )
                    );

        } else { //if post does not exist, create new post and update metadata json_field -> ACF
                    $wpdb->query( $wpdb->prepare( 
                        "
                        INSERT INTO $wpdb->posts
                        ( post_author, post_status, comment_status, ping_status, post_type )
                        VALUES ( %d, %s, %s, %s, %s )
                        ", 
                            array(
                                $userID, 'publish', 'closed', 'closed', 'physical'
                            ) 
                    ) );

                    $postID = $wpdb->insert_id; //extract the post ID inserted

                    $wpdb->query( $wpdb->prepare( 
                        "
                            INSERT INTO $wpdb->postmeta
                            ( post_id, meta_key, meta_value )
                            VALUES ( %d, %s, %s )
                        ", 
                            array(
                                $postID, 'json_field', $data
                            ) 
                    ) );
            }

        $wpdb->flush();
        $data = json_decode($data, true);
        return new \WP_REST_Response( array(
            'success'   => 'ok',
            'value'     => $data
        ), 200 );
    }

    // /**
    //  * Check if a given request has access to update a setting
    //  *
    //  * @param WP_REST_Request $request Full data about the request.
    //  * @return WP_Error|bool
    //  */
    //public function admin_permissions_check( $request ) {
    //    return true;
        //return current_user_can( 'manage_options' );
    //}
}
