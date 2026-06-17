<?
/**
 * جلب بيانات الأقسام من ووردبريس (CPT، تصنيفات، مقالات).
 */

if ( ! function_exists( 'kayan_home_uses_wordpress_data' ) ) {
	function kayan_home_uses_wordpress_data( $vars ) {
		$vars = is_array( $vars ) ? $vars : array();
		if ( isset( $vars['data_source'] ) && $vars['data_source'] === 'manual_html' ) {
			return false;
		}
		return true;
	}
}

if ( ! function_exists( 'kayan_home_int' ) ) {
	function kayan_home_int( $value, $default ) {
		$n = (int) $value;
		return $n > 0 ? $n : (int) $default;
	}
}

if ( ! function_exists( 'kayan_home_get_posts_query' ) ) {
	function kayan_home_get_posts_query( $vars, $post_type, $default_count = 6 ) {
		$vars   = is_array( $vars ) ? $vars : array();
		$args   = array(
			'post_type'      => $post_type,
			'posts_per_page' => kayan_home_int( isset( $vars['posts_per_page'] ) ? $vars['posts_per_page'] : 0, $default_count ),
			'post_status'    => 'publish',
		);
		$filter = isset( $vars['Filter'] ) ? $vars['Filter'] : 'latest';
		if ( $filter === 'most_views' ) {
			$args['meta_key'] = 'views';
			$args['orderby']  = 'meta_value_num';
		} elseif ( $filter === 'most_rate' ) {
			$args['meta_key'] = 'TotalRate';
			$args['orderby']  = 'meta_value_num';
		} elseif ( $filter === 'pin' ) {
			$args['meta_key'] = 'pin';
		}
		if ( ! empty( $vars['category'] ) ) {
			$term = get_term_by( 'id', (int) $vars['category'], 'category' );
			if ( $term && ! is_wp_error( $term ) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				);
			}
		}
		if ( $post_type === 'team' && ! empty( $vars['team_members'] ) && is_array( $vars['team_members'] ) ) {
			$ids = array();
			foreach ( $vars['team_members'] as $row ) {
				if ( ! empty( $row['member_id'] ) ) {
					$ids[] = (int) $row['member_id'];
				}
			}
			if ( ! empty( $ids ) ) {
				$args['post__in'] = $ids;
				$args['orderby']  = 'post__in';
			}
		}
		return get_posts( $args );
	}
}

if ( ! function_exists( 'kayan_home_get_taxonomy_terms' ) ) {
	function kayan_home_get_taxonomy_terms( $vars, $taxonomy, $default_count = 8 ) {
		$vars = is_array( $vars ) ? $vars : array();
		$num  = kayan_home_int( isset( $vars['number'] ) ? $vars['number'] : 0, $default_count );
		if ( ! empty( $vars['taxonomy_option'] ) && is_array( $vars['taxonomy_option'] ) ) {
			$terms = array();
			foreach ( array_slice( $vars['taxonomy_option'], 0, $num ) as $term_id ) {
				$t = get_term_by( 'id', (int) $term_id, $taxonomy );
				if ( $t && ! is_wp_error( $t ) ) {
					$terms[] = $t;
				}
			}
			return $terms;
		}
		return get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'number'     => $num,
				'hide_empty' => false,
			)
		);
	}
}

if ( ! function_exists( 'kayan_home_get_works_posts' ) ) {
	function kayan_home_get_works_posts( $vars ) {
		$vars = is_array( $vars ) ? $vars : array();
		$args = array(
			'post_type'      => 'works',
			'posts_per_page' => kayan_home_int( isset( $vars['posts_per_page'] ) ? $vars['posts_per_page'] : 0, 6 ),
			'post_status'    => 'publish',
		);
		if ( ! empty( $vars['types'] ) ) {
			$term = get_term_by( 'id', (int) $vars['types'], 'category' );
			if ( $term && ! is_wp_error( $term ) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				);
			}
		}
		return get_posts( $args );
	}
}

if ( ! function_exists( 'kayan_home_get_works_filter_terms' ) ) {
	function kayan_home_get_works_filter_terms( $vars ) {
		$vars = is_array( $vars ) ? $vars : array();
		if ( empty( $vars['items__in__filter'] ) || ! is_array( $vars['items__in__filter'] ) ) {
			return array();
		}
		$terms = array();
		foreach ( $vars['items__in__filter'] as $term_id ) {
			$t = get_term_by( 'id', (int) $term_id, 'category' );
			if ( $t && ! is_wp_error( $t ) ) {
				$terms[] = $t;
			}
		}
		return $terms;
	}
}

if ( ! function_exists( 'kayan_home_get_faq_items' ) ) {
	function kayan_home_get_faq_items( $vars ) {
		$vars   = is_array( $vars ) ? $vars : array();
		$source = isset( $vars['faq_source'] ) ? $vars['faq_source'] : 'cpt';
		if ( $source === 'manual' && ! empty( $vars['Faqs__List'] ) && is_array( $vars['Faqs__List'] ) ) {
			$list = $vars['Faqs__List'];
			if ( function_exists( 'Sort__this__list' ) ) {
				$list = Sort__this__list( $list );
			}
			return $list;
		}
		$posts = kayan_home_get_posts_query( $vars, 'faq', 8 );
		$items = array();
		foreach ( $posts as $post ) {
			$items[] = array(
				'question' => get_the_title( $post ),
				'answer'   => apply_filters( 'the_content', $post->post_content ),
			);
		}
		return $items;
	}
}

if ( ! function_exists( 'kayan_home_get_price_plans' ) ) {
	function kayan_home_get_price_plans( $vars ) {
		$vars = is_array( $vars ) ? $vars : array();
		if ( empty( $vars['Price__List'] ) || ! is_array( $vars['Price__List'] ) ) {
			$posts = get_posts(
				array(
					'post_type'      => 'price',
					'posts_per_page' => 6,
					'post_status'    => 'publish',
				)
			);
			$list = array();
			$i    = 0;
			foreach ( $posts as $post ) {
				$i++;
				$list[] = array(
					'Plane__ID'  => $post->ID,
					'number'     => (string) $i,
					'ActivePlan' => '',
				);
			}
			return $list;
		}
		$list = $vars['Price__List'];
		if ( function_exists( 'Sort__this__list' ) ) {
			$list = Sort__this__list( $list );
		}
		return $list;
	}
}

if ( ! function_exists( 'kayan_home_get_finder_services' ) ) {
	function kayan_home_get_finder_services( $vars ) {
		$vars   = is_array( $vars ) ? $vars : array();
		$source = isset( $vars['finder_services_source'] ) ? $vars['finder_services_source'] : 'category';
		if ( $source === 'manual' ) {
			$list = kayan_home_sorted_group( $vars, 'finder_services_manual' );
			$out  = array();
			foreach ( $list as $row ) {
				if ( ! empty( $row['title'] ) ) {
					$out[] = $row['title'];
				}
			}
			return $out;
		}
		$terms = array();
		if ( ! empty( $vars['finder_categories'] ) && is_array( $vars['finder_categories'] ) ) {
			foreach ( $vars['finder_categories'] as $id ) {
				$t = get_term_by( 'id', (int) $id, 'category' );
				if ( $t && ! is_wp_error( $t ) ) {
					$terms[] = $t->name;
				}
			}
		} else {
			$got = get_terms( array( 'taxonomy' => 'category', 'number' => 12, 'hide_empty' => false ) );
			if ( is_array( $got ) ) {
				foreach ( $got as $t ) {
					$terms[] = $t->name;
				}
			}
		}
		return $terms;
	}
}

if ( ! function_exists( 'kayan_home_get_finder_cities' ) ) {
	function kayan_home_get_finder_cities( $vars ) {
		$vars = is_array( $vars ) ? $vars : array();
		$out  = array();
		if ( ! empty( $vars['finder_cities'] ) && is_array( $vars['finder_cities'] ) ) {
			foreach ( $vars['finder_cities'] as $id ) {
				$t = get_term_by( 'id', (int) $id, 'city' );
				if ( $t && ! is_wp_error( $t ) ) {
					$out[] = $t->name;
				}
			}
			return $out;
		}
		$got = get_terms( array( 'taxonomy' => 'city', 'number' => 20, 'hide_empty' => false ) );
		if ( is_array( $got ) ) {
			foreach ( $got as $t ) {
				$out[] = $t->name;
			}
		}
		return $out;
	}
}

if ( ! function_exists( 'kayan_home_term_image_url' ) ) {
	function kayan_home_term_image_url( $term_id, $meta_key = 'Image-Icon' ) {
		$url = get_term_meta( $term_id, $meta_key, true );
		if ( ! empty( $url ) ) {
			return $url;
		}
		$alt = get_term_meta( $term_id, 'image_blog_id', true );
		if ( ! empty( $alt ) ) {
			return $alt;
		}
		return '';
	}
}

if ( ! function_exists( 'kayan_home_post_thumb_url' ) ) {
	function kayan_home_post_thumb_url( $post_id, $size = 'medium_large' ) {
		if ( has_post_thumbnail( $post_id ) ) {
			$src = get_the_post_thumbnail_url( $post_id, $size );
			if ( $src ) {
				return $src;
			}
		}
		return '';
	}
}

if ( ! function_exists( 'kayan_home_works_ba_pair' ) ) {
	function kayan_home_works_ba_pair( $post_id ) {
		$before = get_post_meta( $post_id, 'before_image', true );
		$after  = get_post_meta( $post_id, 'after_image', true );
		if ( ! empty( $before ) && ! empty( $after ) ) {
			return array( 'before' => $before, 'after' => $after );
		}
		$gallery = get_post_meta( $post_id, 'works_gallery', true );
		if ( is_array( $gallery ) && count( $gallery ) >= 2 ) {
			return array(
				'before' => $gallery[0],
				'after'  => $gallery[1],
			);
		}
		$thumb = kayan_home_post_thumb_url( $post_id, 'large' );
		if ( $thumb ) {
			return array( 'before' => $thumb, 'after' => $thumb );
		}
		return array();
	}
}

if ( ! function_exists( 'kayan_home_work_category_slug' ) ) {
	function kayan_home_work_category_slug( $post_id ) {
		$terms = get_the_terms( $post_id, 'category' );
		if ( is_array( $terms ) && ! empty( $terms ) ) {
			return sanitize_title( $terms[0]->slug );
		}
		$type = get_post_meta( $post_id, 'services__type', true );
		return $type ? sanitize_title( $type ) : 'all';
	}
}
