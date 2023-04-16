<?php
/**
 * Create a schema for a Job Posting as listed on schema.org.
 *
 * @package   BusinessProfile
 * @copyright Copyright (c) 2019, Five Star Plugins
 * @license   GPL-2.0+
 * @since     2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'bpfwpSchemaJobPosting' ) ) :

	/**
	 * Job Posting schema for Business Profile
	 *
	 * @since 2.0.0
	 */
	class bpfwpSchemaJobPosting extends bpfwpSchema {

		/**
		 * The name used by Schema.org
		 *
		 * @since  2.0.0
		 * @access public
		 * @var    string
		 */
		public $slug = 'JobPosting';

		/**
		 * The display name for this schema
		 *
		 * @since  2.0.0
		 * @access public
		 * @var    string
		 */
		public $name = 'Job Posting';


		/**
		 * Load the schema's default fields
		 *
		 * @since  2.0.0
		 * @access public
		 * @return void
		 */
		public function set_fields() {
			require_once BPFWP_PLUGIN_DIR . '/includes/schemas/class-schema-field.php';

			$fields = array(
				new bpfwpSchemaField( array( 
					'slug' 				=> 'name', 
					'name' 				=> 'Name', 
					'input' 			=> 'text',
					'recommended'		=> true,
					'callback'			=> apply_filters( 'bpfwp_schema_field_callback', 'function get_the_title', 'name', $this->slug )
				) ),
				new bpfwpSchemaField( array(
					'slug' 				=> 'description', 
					'name' 				=> 'Description', 
					'input' 			=> 'text',
					'callback' 			=> apply_filters( 'bpfwp_schema_field_callback', 'function get_the_excerpt', 'description', $this->slug )
				) ),
				new bpfwpSchemaField( array(
					'slug' 				=> 'datePosted', 
					'name' 				=> 'Date Posted', 
					'input' 			=> 'text',
					'callback' 			=> apply_filters( 'bpfwp_schema_field_callback', 'function get_the_date', 'datePosted', $this->slug )
				) ),
				new bpfwpSchemaField( array(
					'slug' 				=> 'validThrough', 
					'name' 				=> 'Valid Until', 
					'input' 			=> 'text',
					'callback' 			=> apply_filters( 'bpfwp_schema_field_callback', null, 'validThrough', $this->slug )
				) ),
				new bpfwpSchemaField( array(
					'slug' 				=> 'employmentType', 
					'name' 				=> 'Employment Type', 
					'input' 			=> 'text',
					'callback' 			=> apply_filters( 'bpfwp_schema_field_callback', null, 'employmentType', $this->slug )
				) ),
				new bpfwpSchemaField( array( 
					'slug' 				=> 'hiringOrganization', 
					'name' 				=> 'Hiring Organization', 
					'type'				=> 'Organization',
					'input'				=> 'SchemaField',
					'children' 			=> array (
						new bpfwpSchemaField( array( 
							'slug' 				=> 'name', 
							'name' 				=> 'Name', 
							'input' 			=> 'text',
							'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'name', $this->slug, 'hiringOrganization' )
						) ),
						new bpfwpSchemaField( array( 
							'slug' 				=> 'sameAs', 
							'name' 				=> 'Corresponding URL (sameAs)', 
							'input' 			=> 'text',
							'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'sameAs', $this->slug, 'hiringOrganization' )
						) ),
						new bpfwpSchemaField( array(
							'slug' 				=> 'logo', 
							'name' 				=> 'Logo', 
							'input' 			=> 'url',
							'callback' 			=> apply_filters( 'bpfwp_schema_field_callback', 'function bpfwp_get_post_image_url', 'logo', $this->slug, 'hiringOrganization' )
						) ),
					)
				) ),
				new bpfwpSchemaField( array( 
					'slug' 				=> 'jobLocation', 
					'name' 				=> 'Job Location', 
					'type'				=> 'Place',
					'input'				=> 'SchemaField',
					'children' 			=> array (
						new bpfwpSchemaField( array( 
							'slug' 				=> 'address', 
							'name' 				=> 'Address', 
							'type'				=> 'PostalAddress',
							'input'				=> 'SchemaField',
							'children' 			=> array (
								new bpfwpSchemaField( array( 
									'slug' 				=> 'streetAddress', 
									'name' 				=> 'Street Address', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'streetAddress', $this->slug, 'jobLocation', 'address' )
								) ),
								new bpfwpSchemaField( array( 
									'slug' 				=> 'addressLocality', 
									'name' 				=> 'Location (City, Province)', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'addressLocality', $this->slug, 'jobLocation', 'address' )
								) ),
								new bpfwpSchemaField( array( 
									'slug' 				=> 'postalCode', 
									'name' 				=> 'Postal/Zip Code', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'postalCode', $this->slug, 'jobLocation', 'address' )
								) ),
								new bpfwpSchemaField( array( 
									'slug' 				=> 'addressRegion', 
									'name' 				=> 'Address Region', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'addressRegion', $this->slug, 'jobLocation', 'address' )
								) ),
								new bpfwpSchemaField( array( 
									'slug' 				=> 'addressCountry', 
									'name' 				=> 'Address Country', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'addressCountry', $this->slug, 'jobLocation', 'address' )
								) ),
							)
						) ),
					)
				) ),
				new bpfwpSchemaField( array( 
					'slug' 				=> 'baseSalary', 
					'name' 				=> 'Salary', 
					'type'				=> 'MonetaryAmount',
					'input'				=> 'SchemaField',
					'children' 			=> array (
						new bpfwpSchemaField( array( 
							'slug' 				=> 'currency', 
							'name' 				=> 'Currency', 
							'input' 			=> 'text',
							'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'currency', $this->slug, 'baseSalary' )
						) ),
						new bpfwpSchemaField( array( 
							'slug' 				=> 'value', 
							'name' 				=> 'Value', 
							'type'				=> 'QuantitativeValue',
							'input'				=> 'SchemaField',
							'children' 			=> array (
								new bpfwpSchemaField( array( 
									'slug' 				=> 'value', 
									'name' 				=> 'Value', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'value', $this->slug, 'baseSalary', 'value' )
								) ),
								new bpfwpSchemaField( array( 
									'slug' 				=> 'unitText', 
									'name' 				=> 'Unit Text', 
									'input' 			=> 'text',
									'callback'			=> apply_filters( 'bpfwp_schema_field_callback', null, 'unitText', $this->slug, 'baseSalary', 'value' )
								) ),
							)
						) ),
					)
				) ),
			);

			$this->fields = apply_filters( 'bpfwp_schema_fields', $fields, $this->slug );
		}


		/**
		 * Load the schema's child classes
		 *
		 * @since  2.0.0
		 * @access public
		 * @return void
		 */
		public function initialize_children(  $depth ) {
			$depth--;

			$child_classes = array ();

			foreach ( $child_classes as $slug => $name ) {
				require_once BPFWP_PLUGIN_DIR . '/includes/schemas/class-schema-' . $slug . '.php';

				$class_name = 'bpfwpSchema' . $name;
				$this->children[$slug] = new $class_name( array( 'depth' => $depth ) );
			}
		}

	}
endif;