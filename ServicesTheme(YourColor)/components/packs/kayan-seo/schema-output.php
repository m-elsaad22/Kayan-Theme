<?
if ( ! function_exists( 'kayan_seo_build_local_business_node' ) ) {
	function kayan_seo_build_local_business_node( $settings, $node_id = 'https://example.com/#business' ) {
		$node = array(
			'@type' => $settings['@type'],
			'@id' => $node_id,
			'name' => $settings['name'],
			'description' => $settings['description'],
			'url' => home_url( '/' ),
			'telephone' => $settings['telephone'],
			'priceRange' => $settings['priceRange'],
			'address' => array(
				'@type' => 'PostalAddress',
				'streetAddress' => $settings['streetAddress'],
				'addressLocality' => $settings['addressLocality'],
				'addressRegion' => $settings['addressRegion'],
				'postalCode' => $settings['postalCode'],
				'addressCountry' => $settings['addressCountry'],
			),
		);

		if ( ! empty( $settings['image'] ) ) {
			$node['image'] = $settings['image'];
		}
		if ( ! empty( $settings['logo'] ) ) {
			$node['logo'] = $settings['logo'];
		}

		$same_as = kayan_seo_parse_same_as( $settings );
		if ( ! empty( $same_as ) ) {
			$node['sameAs'] = $same_as;
		}

		if ( ! empty( $settings['latitude'] ) && ! empty( $settings['longitude'] ) ) {
			$node['geo'] = array(
				'@type' => 'GeoCoordinates',
				'latitude' => $settings['latitude'],
				'longitude' => $settings['longitude'],
			);
		}

		if ( ! empty( $settings['openingHours'] ) ) {
			$node['openingHoursSpecification'] = array(
				array(
					'@type' => 'OpeningHoursSpecification',
					'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ),
					'opens' => '00:00',
					'closes' => '23:59',
				),
			);
		}

		return $node;
	}
}

if ( ! function_exists( 'kayan_seo_output_home_schema' ) ) {
	function kayan_seo_output_home_schema() {
		if ( ! kayan_seo_uses_modern_schema() || ( ! is_front_page() && ! is_home() ) ) {
			return;
		}

		$business = kayan_seo_get_business_settings();
		$site_id = home_url( '/#website' );
		$business_id = home_url( '/#business' );
		$org_id = home_url( '/#organization' );

		$graph = array(
			array(
				'@type' => 'WebSite',
				'@id' => $site_id,
				'url' => home_url( '/' ),
				'name' => kayan_seo_get_site_name(),
				'description' => kayan_seo_get_description(),
				'inLanguage' => 'ar',
				'publisher' => array( '@id' => $org_id ),
				'potentialAction' => array(
					'@type' => 'SearchAction',
					'target' => home_url( '/search/{search_term_string}' ),
					'query-input' => 'required name=search_term_string',
				),
			),
			array(
				'@type' => 'Organization',
				'@id' => $org_id,
				'name' => $business['name'],
				'url' => home_url( '/' ),
				'logo' => ! empty( $business['logo'] ) ? $business['logo'] : $business['image'],
				'sameAs' => kayan_seo_parse_same_as( $business ),
			),
			kayan_seo_build_local_business_node( $business, $business_id ),
		);

		kayan_seo_print_json_ld( $graph );
	}
}

if ( ! function_exists( 'kayan_seo_output_single_schema' ) ) {
	function kayan_seo_output_single_schema() {
		if ( ! kayan_seo_uses_modern_schema() || ! is_singular( 'post' ) ) {
			return;
		}

		global $post;
		$permalink = get_permalink( $post );
		$business = kayan_seo_get_business_settings();
		$graph = array();
		$thumbnail = get_the_post_thumbnail_url( $post, 'full' );
		$author = get_userdata( $post->post_author );

		$graph[] = array(
			'@type' => 'Article',
			'@id' => $permalink . '#article',
			'headline' => kayan_seo_text( get_the_title( $post ) ),
			'description' => kayan_seo_get_description(),
			'datePublished' => get_the_date( 'c', $post ),
			'dateModified' => get_the_modified_date( 'c', $post ),
			'mainEntityOfPage' => $permalink,
			'inLanguage' => 'ar',
			'author' => array(
				'@type' => 'Person',
				'name' => $author ? $author->display_name : kayan_seo_get_site_name(),
			),
			'publisher' => array(
				'@type' => 'Organization',
				'name' => $business['name'],
				'logo' => array(
					'@type' => 'ImageObject',
					'url' => $business['logo'] ? $business['logo'] : $business['image'],
				),
			),
			'image' => $thumbnail ? array( $thumbnail ) : array(),
		);

		$graph[] = array(
			'@type' => 'Service',
			'@id' => $permalink . '#service',
			'name' => kayan_seo_text( get_the_title( $post ) ),
			'description' => kayan_seo_get_description(),
			'url' => $permalink,
			'provider' => kayan_seo_build_local_business_node( $business, home_url( '/#business' ) ),
			'areaServed' => ! empty( $business['addressLocality'] ) ? $business['addressLocality'] : $business['addressCountry'],
		);

		$questions = get_post_meta( $post->ID, 'yourcolor__faqs', true );
		if ( is_array( $questions ) && ! empty( $questions ) ) {
			$entities = array();
			foreach ( $questions as $faq ) {
				if ( empty( $faq['question'] ) || empty( $faq['answer'] ) ) {
					continue;
				}
				$entities[] = array(
					'@type' => 'Question',
					'name' => kayan_seo_text( $faq['question'] ),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text' => kayan_seo_text( $faq['answer'] ),
					),
				);
			}
			if ( ! empty( $entities ) ) {
				$graph[] = array(
					'@type' => 'FAQPage',
					'@id' => $permalink . '#faq',
					'mainEntity' => $entities,
				);
			}
		}

		kayan_seo_print_json_ld( $graph );
	}
}

if ( ! function_exists( 'kayan_seo_output_page_schema' ) ) {
	function kayan_seo_output_page_schema() {
		if ( ! kayan_seo_uses_modern_schema() || ! is_page() ) {
			return;
		}

		global $post;
		$permalink = get_permalink( $post );
		$business = kayan_seo_get_business_settings();
		$thumbnail = get_the_post_thumbnail_url( $post, 'full' );

		$graph = array(
			array(
				'@type' => 'WebPage',
				'@id' => $permalink . '#webpage',
				'name' => kayan_seo_text( get_the_title( $post ) ),
				'description' => kayan_seo_get_description(),
				'url' => $permalink,
				'inLanguage' => 'ar',
				'isPartOf' => array(
					'@type' => 'WebSite',
					'@id' => home_url( '/#website' ),
					'name' => kayan_seo_get_site_name(),
				),
				'publisher' => array(
					'@type' => 'Organization',
					'name' => $business['name'],
					'logo' => array(
						'@type' => 'ImageObject',
						'url' => $business['logo'] ? $business['logo'] : $business['image'],
					),
				),
			),
		);

		if ( $thumbnail ) {
			$graph[0]['primaryImageOfPage'] = array(
				'@type' => 'ImageObject',
				'url' => $thumbnail,
			);
		}

		kayan_seo_print_json_ld( $graph );
	}
}

if ( ! function_exists( 'kayan_seo_output_breadcrumb_schema' ) ) {
	function kayan_seo_output_breadcrumb_schema() {
		if ( ! kayan_seo_uses_modern_schema() || is_front_page() || is_home() ) {
			return;
		}

		$items = array();
		$position = 1;
		$items[] = array(
			'@type' => 'ListItem',
			'position' => $position,
			'name' => kayan_seo_get_site_name(),
			'item' => home_url( '/' ),
		);

		if ( is_singular() ) {
			$categories = get_the_terms( get_queried_object_id(), 'category' );
			if ( is_array( $categories ) ) {
				foreach ( array_slice( $categories, 0, 1 ) as $category ) {
					$position++;
					$items[] = array(
						'@type' => 'ListItem',
						'position' => $position,
						'name' => $category->name,
						'item' => get_term_link( $category ),
					);
				}
			}
			$position++;
			$items[] = array(
				'@type' => 'ListItem',
				'position' => $position,
				'name' => kayan_seo_get_title(),
				'item' => get_permalink(),
			);
		} elseif ( is_category() || is_tax() || is_tag() ) {
			$obj = get_queried_object();
			$position++;
			$items[] = array(
				'@type' => 'ListItem',
				'position' => $position,
				'name' => $obj->name,
				'item' => get_term_link( $obj ),
			);
		}

		if ( count( $items ) < 2 ) {
			return;
		}

		kayan_seo_print_json_ld(
			array(
				array(
					'@type' => 'BreadcrumbList',
					'@id' => kayan_seo_get_canonical_url() . '#breadcrumb',
					'itemListElement' => $items,
				),
			)
		);
	}
}

if ( ! function_exists( 'kayan_seo_output_schema_graph' ) ) {
	function kayan_seo_output_schema_graph() {
		if ( ! kayan_seo_uses_modern_schema() ) {
			return;
		}
		if ( get_option( 'validate__schema' ) ) {
			return;
		}

		kayan_seo_output_home_schema();
		kayan_seo_output_single_schema();
		kayan_seo_output_page_schema();
		kayan_seo_output_breadcrumb_schema();
	}
}
