<?php
class Save_Book_Form {
	public function __construct() {
		add_filter('wp_ajax_add_book', 'save_book_data');
		
		function save_book_data() {
			
			global $wpdb;
			 // Check for nonce security      
			if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( $_POST['nonce'] ), 'ajax-nonce' ) ) {
				 die ( 'Busted!');
			}
			$editor 	  = '';
			$author       = array(); 
			$full_name 	  = '';
			$edition_type = '';
			$volume_lines = '';
			$book_format  = '';
			$circulations = '';
			$neck         = '';
			$city         = '';
			$ISBN         = '';
			$MPF          = '';
			$budget       = '';
			$book_link    = '';
			$book_notes   = '';

			$funding_source = '';
			$IPM_availability = 0;

			if ( isset($_POST['editor']) ) {
				$editor = sanitize_text_field( $_POST['editor'] );
				
			}

			if ( isset($_POST['author']) ) {
				$author = sanitize_text_field( $_POST['author'] );
			}

			if ( isset($_POST['full_name']) ) {
				$full_name = sanitize_text_field( $_POST['full_name'] );
			}

			if ( isset($_POST['edition_type']) ) {
				$edition_type = sanitize_text_field( $_POST['edition_type'] );
			}

			if ( isset($_POST['volume_lines']) ) {
				$volume_lines = sanitize_text_field( $_POST['volume_lines'] );
			}

			if ( isset($_POST['book_format']) ) {
				$book_format = sanitize_text_field( $_POST['book_format'] );
			}
			if ( isset($_POST['circulations']) ) {
				$circulations = sanitize_text_field( $_POST['circulations'] );
			}
			if ( isset($_POST['neck']) ) {
				$neck = sanitize_text_field( $_POST['neck'] );
			}
			if ( isset($_POST['city']) ) {
				$city = sanitize_text_field( $_POST['city'] );
			}
			if ( isset($_POST['ISBN']) ) {
				$ISBN = sanitize_text_field( $_POST['ISBN'] );
			}
			if ( isset($_POST['MPF']) ) {
				$MPF = sanitize_text_field( $_POST['MPF'] );
			}
			if ( isset($_POST['funding_source']) ) {
				$funding_source = sanitize_text_field( $_POST['funding_source'] );
			}
			if ( isset($_POST['budget']) ) {
				$budget = sanitize_text_field( $_POST['budget'] );
			}
			if ( isset($_POST['IPM_availability']) ) {
				$IPM_availability = sanitize_text_field( $_POST['IPM_availability'] );
			}

			if ( isset($_POST['book_link']) ) {
				$book_link = sanitize_text_field( $_POST['book_link'] );
			}
			if ( isset($_POST['book_notes']) ) {
				$book_notes = sanitize_text_field( $_POST['book_notes'] );
			}
			$insert = $wpdb->query($wpdb->prepare('INSERT INTO `wp_books` (`editors`,`author`,`edition_type`,`full_name`,`volume`,`book_format`,`circulation`,`neck`,`city`,`ISBN`,`manuscript`,`funding_source`,`budget`,`IPM_availability`,`book_link`,`book_notes`) 
				values (%s, %s, %s,%s,%d,%s,%d,%s,%s,%s,%s,%s,%s,%d,%s,%s)', 
				$editor, $author, $edition_type , $full_name, $volume_lines, $book_format, $circulations,$neck,$city,$ISBN,$MPF,$funding_source,$budget,$IPM_availability,$book_link,$book_notes));

			if ($insert) { 

				wp_send_json_success( 'Your Book data has been saved successfully', 'maurl-book-form' );

			} else{
				wp_send_json_error( 'Your Book data couldnt be added', 'maurl-book-form' );

			}
		}
	}
}

new Save_Book_Form();
