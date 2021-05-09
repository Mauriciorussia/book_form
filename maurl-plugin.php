<?php
/**
	* Plugin Name: Book Form
	* Description:  Add Your Books
	* version: 1.0.0
	* Author: maurl
	* Text Domain: maurl-book-form
	* Domain Path: /languages
*/

if (! defined('WPINC')) {
	die;
}

require_once('includes/short_code.php');
require_once('includes/save_book.php');

register_activation_hook(__FILE__, 'maurl_create_tables');
function maurl_create_tables() {
	global $wpdb;
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$table_name = $wpdb->prefix . 'books';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {

		$charset_collate = $wpdb->get_charset_collate();
	
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			editors text NOT NULL,
			author text NOT NULL,
			edition_type text NOT NULL,
			full_name text NOT NULL,
			volume int NOT NULL,
			book_format text NOT NULL,
			circulation int NOT NULL,
			neck text NOT NULL,
			city text NOT NULL,
			ISBN text NOT NULL,
			manuscript text NOT NULL,
			funding_source text NOT NULL,
			budget text NOT NULL,
			IPM_availability boolean NOT NULL,
			book_link text NOT NULL,
			book_notes text NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );
		
	}
	
	$table_name = $wpdb->prefix . 'book_formats';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			Book_Format text NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}

	$table_name = $wpdb->prefix . 'book_authors';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}

	$table_name = $wpdb->prefix . 'types_of_edition';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			name text NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}

	$table_name = $wpdb->prefix . 'territory_types_of_edition';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}

	$table_name = $wpdb->prefix . 'publication_types';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}
	$table_name = $wpdb->prefix . 'articles';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}
	$table_name = $wpdb->prefix . 'articles_authors';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}

	$table_name = $wpdb->prefix . 'manuscript_prepartion_forms';
	if ( $wpdb->prepare($wpdb->get_var('SHOW TABLES LIKE %s '), $table_name) != $table_name ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			name text NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";
		dbDelta( $sql );   
	}
	
}
