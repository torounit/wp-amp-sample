<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	      content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
	<title><?php get_the_title(); ?> &#8211; <?php echo get_bloginfo( 'name' ); ?></title>
	<link rel="canonical" href="<?php echo get_permalink(); ?>"/>
	<script src="https://cdn.ampproject.org/v0.js" async></script>
	<script type="application/ld+json">
		<?php
		$json_ld = array(
			'@context'         => 'http://schema.org',
			'@type'            => 'BlogPosting',
			'mainEntityOfPage' => get_permalink(),

			'headline'      => get_the_title(),
			'datePublished' => get_the_time( 'c' ),
			'dateModified'  => get_the_modified_time( 'c' ),
			'author'        =>
				array(
					'@type' => 'Person',
					'name'  => 'Toro_Unit',
				),

		);
		if ( has_post_thumbnail() ) {
			$post_thumbnail_id = get_post_thumbnail_id();
			$post_thumbnail    = wp_get_attachment_image_src( $post_thumbnail_id, 'post-thumbnail' );
			$json_ld['image']  = array(
				'@type'  => 'ImageObject',
				'url'    => $post_thumbnail[0],
				'width'  => $post_thumbnail[1],
				'height' => $post_thumbnail[2],
			);
		}

		$json_ld['publisher'] = array(
			'@type' => 'Organization',
			'name'  => get_bloginfo( 'name' ),
		);

		if ( get_site_icon_url( 32 ) ) {
			$json_ld['publisher']['logo'] = array(
				'@type'  => 'ImageObject',
				'url'    => get_site_icon_url( 32 ),
				'height' => 32,
				'width'  => 32,
			);
		}


		echo json_encode( $json_ld );

		?>


	</script>

	<style amp-custom>
		/* Generic WP styling */
		amp-img.alignright {
			float: right;
			margin: 0 0 1em 1em;
		}

		amp-img.alignleft {
			float: left;
			margin: 0 1em 1em 0;
		}

		amp-img.aligncenter {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		.alignright {
			float: right;
		}

		.alignleft {
			float: left;
		}

		.aligncenter {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		.wp-caption.alignleft {
			margin-right: 1em;
		}

		.wp-caption.alignright {
			margin-left: 1em;
		}

		.amp-wp-enforced-sizes {
			/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
			max-width: 100%;
		}


		body {
			font-family: 'Merriweather', Serif;
			font-size: 16px;
			line-height: 1.8;
			background: #fff;
			color: #3d596d;
			padding-bottom: 100px;
		}

		p,
		ol,
		ul,
		figure {
			margin: 0 0 24px 0;
		}

		a,
		a:visited {
			color: #0087be;
		}

		a:hover,
		a:active,
		a:focus {
			color: #33bbe3;
		}

		/* Captions */
		.wp-caption-text {
			padding: 8px 16px;
			font-style: italic;
		}

		/* Quotes */
		blockquote {
			padding: 16px;
			margin: 8px 0 24px 0;
			border-left: 2px solid #87a6bc;
			color: #4f748e;
			background: #e9eff3;
		}

		blockquote p:last-child {
			margin-bottom: 0;
		}

		amp-iframe,
		amp-youtube,
		amp-instagram,
		amp-vine {
			background: #f3f6f8;
		}


	</style>
</head>
<body>


<div class="content">
	<?php if ( have_posts() ): the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endif; ?>
</div>
</body>
</html>
