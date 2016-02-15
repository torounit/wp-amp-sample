<?php
/*
Plugin Name: Amp-sample
Version: 0.1-alpha
Description: PLUGIN DESCRIPTION HERE
Author: YOUR NAME HERE
Author URI: YOUR SITE HERE
Plugin URI: PLUGIN SITE HERE
Text Domain: amp-sample
Domain Path: /languages
*/



function amp_sample() {

	//エンドポイントを追加。http://example.com/hoge/amp でアクセスできる && get_query_var で値をとれるようになる。
	add_rewrite_endpoint( 'amp', EP_PERMALINK | EP_PAGES );

	add_action( 'template_redirect', 'amp_sample_init' );

}
add_action( 'init', 'amp_sample' );


/**
 * get で amp が投げられたとき && 個別ページ、投稿でのみ機動
 */
function amp_sample_init() {
	if( false !== get_query_var( 'amp', false ) && is_singular() ) {

		add_filter( 'template_include', 'amp_sample_template_include' );
		add_filter( 'the_content', 'amp_sample_content_filter');
	}
}


/**
 *
 * テンプレートをプラグインの中の奴に置き換える。
 * @param $template
 *
 * @return string
 */
function amp_sample_template_include( $template ) {

	return dirname( __FILE__ ) . '/template/amp.php';

}

/**
 *
 * AMP あわせて the_content の内容を置換
 * @param $html
 *
 * @return mixed
 */
function amp_sample_content_filter( $html ) {

	return str_replace( array(
		'img'   ,
		'video' ,
		'audio' ,
		'iframe',
	),
		array(
		'amp-img',
		'amp-video',
		'amp-audio',
		'amp-iframe'
	), $html);

}