<?php
include 'lib/customizer.php';//テーマカスタマイザー関係の関数
include 'lib/widget.php';//ウイジェット関係の関数
include 'lib/ad.php';    //広告関係の関数
include 'lib/sns.php';  //SNS関係の関数
include 'lib/utility.php';  //自作のユーティリティー関数
require_once(ABSPATH . 'wp-admin/includes/file.php');//WP_Filesystemの使用

// アイキャッチ画像を有効化
add_theme_support('post-thumbnails');
//サムネイルサイズ
//add_image_size('thumb75',75,75,true);
add_image_size('thumb100',100,100,true);
add_image_size('thumb150',150,150,true);
add_image_size('thumb320',320,180,true);
////サムネイルリストカードのとき or タイル状リストのとき
//if ( is_list_style_thumb_cards() || is_list_style_tile_thumb_cards() ) {
//  add_image_size('thumb320',320,180,true);
//}
//画像の縦横比を保存したタイル状リストのとき
if ( is_list_style_tile_thumb_cards_raw() ) {
  add_image_size('thumb320_raw',320,0,false);
}

//コンテンツの幅の指定
if ( ! isset( $content_width ) ) $content_width = 680;

////カテゴリー説明文からPタグを除去
//remove_filter('term_description', 'wpautop');
//カテゴリー説明文でHTMLタグを使う
remove_filter( 'pre_term_description', 'wp_filter_kses' );

//ビジュアルエディターとテーマ表示のスタイルを合わせる
add_editor_style();

// RSS2 の feed リンクを出力
add_theme_support( 'automatic-feed-links' );

// カスタムメニューを有効化
add_theme_support( 'menus' );

// カスタムメニューの「場所」を設定
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );

// サイドバーウィジットを有効化
register_sidebars(1,
  array(
  'name' => 'サイドバーウイジェット',
  'id' => 'sidebar-1',
  'description' => 'サイドバーのウィジットエリアです。',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>',
));

register_sidebars(1,
  array(
  'name'=>'スクロール追従領域',
  'id' => 'sidebar-scroll',
  'description' => 'サイドバーで下にスクロールすると追いかけてくるエリアです。※モバイルでは表示されません。（ここにGoogle AdSenseを張るのはポリシー違反です。）',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h4>',
  'after_title' => '</h4>',
));

register_sidebars(1,
  array(
  'name'=>'広告 336x280',
  'id' => 'adsense-336',
  'description' => '336×280pxの広告を入力してください。',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<div class="widget-ad" style="display:none">',
  'after_title' => '</div>',
));

register_sidebars(1,
  array(
  'name'=>'広告 300x250',
  'id' => 'adsense-300',
  'description' => '300×250pxの広告を入力してください。',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<div class="widget-ad" style="display:none">',
  'after_title' => '</div>',
));

if ( is_ads_performance_visible() ):
  if ( !is_ads_custum_ad_space() ) {//ビッグバナーのとき
    $adw_name = '広告 728×90';
    $adw_desc = '広告が2つしか表示されていないPC表示ページのトップにビッグバナーを表示します。728×90のビッグバナー推奨です。完全レスポンシブのときは設定しても表示されません。（デフォルト状態をなるべくシンプルにするためカスタマイザーから設定しないと、このウイジェット設定は表示されません。）';
  } else {//カスタム広告の時
    $adw_name = '広告 custum 680×150など';
    $adw_desc = '広告が2つしか表示されていないPC表示ページのトップにカスタムサイズ広告を表示します。680×150など推奨です。完全レスポンシブのときは設定しても表示されません。（デフォルト状態をなるべくシンプルにするためカスタマイザーから設定しないと、このウイジェット設定は表示されません。）';
  }
  register_sidebars(1,
    array(
    'name'=>$adw_name,
    'id' => 'adsense-728',
    'description' => $adw_desc,
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<div class="widget-ad" style="display:none">',
    'after_title' => '</div>',
  ));

  register_sidebars(1,
    array(
    'name'=>'広告 320x100',
    'id' => 'adsense-320',
    'description' => '広告が2つしか表示されていないモバイルページのトップにラージモバイルバナーを表示します。320×100のラージモバイルバナー推奨です。完全レスポンシブのときは設定しても表示されません。（デフォルト状態をなるべくシンプルにするためカスタマイザーから設定しないと、このウイジェット設定は表示されません。）',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<div class="widget-ad" style="display:none">',
    'after_title' => '</div>',
  ));
endif;

//if ( is_responsive_enable() ):
//  register_sidebars(1,
//    array(
//    'name'=>'広告 レスポンシブ',
//    'id' => 'adsense-responsive',
//    'description' => 'レスポンシブ広告設置用のウイジェットです。',
//    'before_widget' => '',
//    'after_widget' => '',
//    'before_title' => '<div class="widget-ad" style="display:none">',
//    'after_title' => '</div>',
//  ));
//endif;

register_sidebars(1,
  array(
  'name'=>'投稿本文下',
  'id' => 'widget-under-article',
  'description' => '投稿本文下に表示されるウイジェット。設定しないと表示されません。',
  'before_widget' => '<div class="widget-under-article">',
  'after_widget' => '</div>',
  'before_title' => '<div class="widget-under-article-title" style="display:none">',
  'after_title' => '</div>',
));

register_sidebars(1,
  array(
  'name'=>'投稿SNSボタン下',
  'id' => 'widget-under-sns-buttons',
  'description' => '投稿のメインカラムの一番下となるSNSボタンの下に表示されるウイジェット。設定しないと表示されません。',
  'before_widget' => '<div class="widget-under-sns-buttons">',
  'after_widget' => '</div>',
  'before_title' => '<div class="widget-under-sns-buttons-title" style="display:none">',
  'after_title' => '</div>',
));

register_sidebars(1,
  array(
  'name'=>'フッター左',
  'id' => 'footer-left',
  'description' => 'フッター左側のウィジットエリアです。',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h4>',
  'after_title' => '</h4>',
));

register_sidebars(1,
  array(
  'id' => 'footer-center',
  'name'=>'フッター中',
  'description' => 'フッター中間のウィジットエリアです。',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h4>',
  'after_title' => '</h4>',
));

register_sidebars(1,
  array(
  'name'=>'フッター右',
  'id' => 'footer-right',
  'description' => 'フッター右側フッター中のウィジットエリアです。',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '<h4>',
  'after_title' => '</h4>',
));

//カスタムヘッダー
$custom_header_defaults = array(
 'random-default' => false,
 'width' => (is_sidebar_width_336() ? 1106 : 1070),//サイドバーの幅によって変更
 'height' => intval(get_header_height()),
 'flex-height' => false,
 'flex-width' => false,
 'default-text-color' => '',
 'header-text' => false,
 'uploads' => true,
);
add_theme_support( 'custom-header', $custom_header_defaults );

//カスタム背景
$custom_background_defaults = array(
        'default-color' => 'ffffff',
);
add_theme_support( 'custom-background', $custom_background_defaults );

//カスタマイズした値をCSSに反映させる
function celtisone_customize_css(){
  get_template_part('css-custom');
}
add_action( 'wp_head', 'celtisone_customize_css');

/*
  get_the_modified_time()の結果がget_the_time()より古い場合はget_the_time()を返す。
  同じ場合はnullをかえす。
  それ以外はget_the_modified_time()をかえす。
*/
function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}

// 抜粋の長さを変更する
function custom_excerpt_length() {
  return intval(get_excerpt_length());
}
add_filter('excerpt_length', 'custom_excerpt_length');

// 文末文字を変更する
function custom_excerpt_more($more) {
  return get_excerpt_more();
}
add_filter('excerpt_more', 'custom_excerpt_more');

//本文抜粋を取得する関数
//使用方法：http://nelog.jp/get_the_custom_excerpt
function get_the_custom_excerpt($content, $length, $is_card = false) {
  global $post;
  if ( is_wordpress_excerpt() && $post->post_excerpt ) {//Wordpress固有の抜粋文を使用するとき
    return  $post->post_excerpt;
  } else {//Simplicity固有の抜粋文を使用するとき
    $length = ($length ? $length : 70);//デフォルトの長さを指定する
    $content =  preg_replace('/<!--more-->.+/is',"",$content); //moreタグ以降削除
    $content =  strip_shortcodes($content);//ショートコード削除
    $content =  strip_tags($content);//タグの除去
    $content =  str_replace("&nbsp;","",$content);//特殊文字の削除（今回はスペースのみ）
    $content =  preg_replace('/\s/iu',"",$content); //余分な空白を削除
    $over    =  intval(mb_strlen($content)) > intval($length);
    $content =  mb_substr($content,0,$length);//文字列を指定した長さで切り取る
    if ( get_excerpt_more() && $over ) {
      $content = $content.get_excerpt_more();
    }
    return $content;
  }
}

//外部ファイルのURLに付加されるver=を取り除く
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

//セルフピンバック禁止
function sp_no_self_ping( &$links ) {
    $home = home_url();
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'sp_no_self_ping' );

//ファビコンタグを表示
function the_favicon_tag(){
  if (is_favicon_enable()) {
    echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_the_favicon_url().'" />'."\n";
  }
}

//アップルタッチアイコンを表示
function the_apple_touch_icon_tag(){
  if ( is_apple_touch_icon_enable() && wp_is_mobile() ) {
    if ( get_apple_touch_icon_url() ) {
      echo '<link rel="apple-touch-icon-precomposed" href="'.get_apple_touch_icon_url().'" />'."\n";
    } else {
      echo '<link rel="apple-touch-icon-precomposed" href="'.get_stylesheet_directory_uri().'/images/apple-touch-icon.png" />'."\n";
    }
  }
}

//ファビコン表示(フロント)
function blog_favicon() {
  the_favicon_tag();
}
add_action('wp_head', 'blog_favicon');

//ファビコン表示(管理画面)
function admin_favicon() {
  the_favicon_tag();
}
add_action('admin_head', 'admin_favicon');

//iframeのレスポンシブ対応
function wrap_iframe_in_div($the_content) {
  if ( is_singular() ) {
    //YouTube動画にラッパーを装着
    $the_content = preg_replace('/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is', '<div class="video-container"><div class="video">${0}</div></div>', $the_content);
    //Instagram動画にラッパーを装着
    $the_content = preg_replace('/<iframe[^>]+?instagram\.com[^<]+?<\/iframe>/is', '<div class="instagram-container"><div class="instagram">${0}</div></div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');

//サイト概要の取得
function get_the_description(){
  $o = get_sns_options();
  if ($o['ogp_description'] == 'meta') {
    global $post;//All in One SEO PackプラグインのDescriptionを取得
    $s = get_post_meta($post->ID, _aioseop_description, true);
  } else {
    $s = strip_shortcodes(get_the_excerpt());
    $s = mb_substr(str_replace(array("\r\n", "\r", "\n"), '', strip_tags($s)), 0, 100);
  }
  return $s;
}

//WordPress の投稿スラッグを自動的に生成する
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) &&
       ( $post_type == 'post' || $post_type == 'page') ) {//投稿もしくは固定ページのときのみ実行する
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
if ( !is_japanese_slug_enable()) {
  add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );
}



//feedlyの購読者数取得
function get_feedly_count(){
  $feed_url = rawurlencode( get_bloginfo( 'rss2_url' ) );
  $res = '0';
  $subscribers = wp_remote_get( "http://cloud.feedly.com/v3/feeds/feed%2F$feed_url" );
  if (!is_wp_error( $subscribers ) && $subscribers["response"]["code"] === 200) {
    $subscribers = json_decode( $subscribers['body'] );
    if ( $subscribers ) {
      $subscribers = $subscribers->subscribers;
      set_transient( 'feedly_subscribers', $subscribers, 60 * 60 * 12 );
      $res = ($subscribers ? $subscribers : '0');
    }
  }
  return $res;
}

//投稿ページ以外ではhentryクラスを削除する関数
function remove_hentry( $classes ) {
  if ( !is_single() ) {
    $classes = array_diff($classes, array('hentry'));
  }
  //これらのクラスが含まれたページではhentryを削除する
  $ng_classes = array('type-forum', 'type-topic');//ここに追加していく
  $is_include = false;
  foreach ($ng_classes as $ng_class) {
    //NGのクラス名が含まれていないか調べる
    if ( in_array($ng_class, $classes) ) {
      $is_include = true;
    }
  }
  //含まれていたらhentryを削除する
  if ($is_include) {
    $classes = array_diff($classes, array('hentry'));
  }
  return $classes;
}
add_filter('post_class', 'remove_hentry');

//はてな oEmbed対応
wp_oembed_add_provider('http://*', 'http://hatenablog.com/oembed');

//子テーマ内に指定のファイルがあるかどうか調べる
//ファイルがあった場合は子テーマ内ファイルのローカルパスを（true）
//ファイルが存在しなかった場合はfalseを返す
function file_exists_in_child_theme($filename){
  $dir = str_replace('\\','/', dirname(__FILE__));//置換しているのはWindows環境対策
  $theme_dir_uri = get_template_directory_uri();//親テーマのディレクトリURIを取得
  $child_theme_dir_uri = get_stylesheet_directory_uri();//子テーマのディレクトリURIの取得
  if ($theme_dir_uri == $child_theme_dir_uri) return;//同一の場合は子テーマが存在しないのでfalseを返す
  preg_match('/[^\/]+$/i', $theme_dir_uri, $m);//親テーマのディレクトリ名のみ取得
  $theme_dir_name = $m[0];
  preg_match('/[^\/]+$/i', $child_theme_dir_uri, $m);//子テーマのディレクトリ名のみ取得
  $child_theme_dir_name = $m[0];
  $path = preg_replace('/'.$theme_dir_name.'$/i', $child_theme_dir_name, $dir, 1);//文末のディレクトリ名だけ置換
  $path = $path.'/'.$filename;//ローカルパスの作成
  if ( file_exists($path) ) {
    return $path;//ファイルが存在していたらファイルのローカルパスを返す
  }
}

//スキンファイルリストの並べ替え用の関数
function skin_files_comp($a, $b) {
  //優先度（priority）で比較する
  if ($a['priority'] == $b['priority']) {
      return 0;
  }
  return ($a['priority'] < $b['priority']) ? -1 : 1;
}

//フォルダ以下のファイルをすべて取得
function get_file_list($dir) {
  $list = array();
  $files = scandir($dir);
  foreach($files as $file){
    if($file == '.' || $file == '..'){
      continue;
    } else if (is_file($dir . $file)){
      $list[] = $dir . $file;
    } else if( is_dir($dir . $file) ) {
        //$list[] = $dir;
      $list = array_merge($list, get_file_list($dir . $file . DIRECTORY_SEPARATOR));
    }
  }
  return $list;
}

//スキンとなるファイルの取得
function get_skin_files(){
  define( 'FS_METHOD', 'direct' );

  $parent = true;
  // 子テーマで 親skins の取得有無の設定
  if(function_exists('include_parent_skins')){
    $parent = include_parent_skins();
  }

  $files  = array();
  $child_files  = array();
  $parent_files  = array();

  //子skinsフォルダ内を検索
  $dir = get_stylesheet_directory().'/skins/';
  if(is_child_theme() && file_exists($dir)){
    $child_files = get_file_list($dir);
  }

  //親skinsフォルダ内を検索
  if ( $parent || !is_child_theme() ){//排除フラグが立っていないときと親テーマのときは取得
    $dir = get_template_directory().'/skins/';
    $parent_files = get_file_list($dir);
  }

  //親テーマと子テーマのファイル配列をマージ
  $files = array_merge( $child_files, $parent_files );

  //置換DIR
  $this_dir = str_replace('\\', '/', dirname(__FILE__));
  $this_ary = explode('/', $this_dir);
  array_pop($this_ary);
  $search = implode ('/',$this_ary);

  //置換URI
  $uri_dir = get_template_directory_uri();
  $uri_ary = explode('/', $uri_dir);
  array_pop($uri_ary);
  $replace = implode ('/',$uri_ary);

  $results = array();
  foreach($files as $pathname){
    $pathname = str_replace('\\', '/', $pathname);

    if (preg_match('/([a-zA-Z0-9\-_]+).style\.css$/i', $pathname, $matches)){//フォルダ名の正規表現が[a-zA-Z\-_]+のとき
      $dir_name = strip_tags($matches[1]);
      if ( WP_Filesystem() ) {//WP_Filesystemの初期化
        global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
        $css = $wp_filesystem->get_contents($pathname);//$wp_filesystemオブジェクトのメソッドとして呼び出す
        if (preg_match('/Name: *(.+)/i', $css, $matches)) {//CSSファイルの中にName:の記述があるとき
          if (preg_match('/Priority: *(.+)/i', $css, $m)) {//優先度（順番）が設定されている場合は順番取得
            $priority = intval($m[1]);
          } else {
            $priority = 9999;
          }
          //返り値の設定
          $results[] = array(
            'name' => trim(strip_tags($matches[1])),
            'dir' => $dir_name,
            'priority' => $priority,
            'path' => str_replace($search, $replace , $pathname),
          );
        }
      }
    }
  }
  uasort($results, 'skin_files_comp');//スキンを優先度順に並び替え

  return $results;
}

//WP_Queryの引数を取得
function get_related_wp_query_args(){
  global $post;
  if ( is_related_entry_association_category() ) {
    //カテゴリ情報から関連記事をランダムに呼び出す
    $categories = get_the_category($post->ID);
    $category_IDs = array();
    foreach($categories as $category):
      array_push( $category_IDs, $category -> cat_ID);
    endforeach ;
    if ( empty($category_IDs) ) return;
    return $args = array(
      'post__not_in' => array($post -> ID),
      'posts_per_page'=> intval(get_related_entry_count()),
      'category__in' => $category_IDs,
      'orderby' => 'rand',
    );
  } else {
    //タグ情報から関連記事をランダムに呼び出す
    $tags = wp_get_post_tags($post->ID);
    $tag_IDs = array();
    foreach($tags as $tag):
      array_push( $tag_IDs, $tag -> term_id);
    endforeach ;
    if ( empty($tag_IDs) ) return;
    return $args = array(
      'post__not_in' => array($post -> ID),
      'posts_per_page'=> intval(get_related_entry_count()),
      'tag__in' => $tag_IDs,
      'orderby' => 'rand',
    );
  }
}

//本文中のURLをブログカードタグに変更する
function url_to_blog_card($the_content) {
  if ( is_singular() ) {//投稿ページもしくは固定ページのとき
    //1行にURLのみが期待されている行（URL）を全て$mに取得
    $res = preg_match_all('/^(<p>)?(<a.+?>)?https?:\/\/'.preg_quote(get_this_site_domain()).'\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<\/p>)?(<br ? \/>)?$/im', $the_content,$m);
    //マッチしたURL一つ一つをループしてカードを作成
    foreach ($m[0] as $match) {
      $url = strip_tags($match);//URL
      $id = url_to_postid( $url );//IDを取得（URLから投稿ID変換）
      if ( !$id ) continue;//IDを取得できない場合はループを飛ばす
      //global $post;
//      $posts = get_posts('id='.$id);
//      $post = $posts[0];
      //$post = get_post($id);//IDから投稿情報の取得

      global $post;
      $post_id = get_post($id);
      setup_postdata($post_id);
      $exce = $post_id->post_excerpt;

      $title = $post_id->post_title;//タイトルの取得
      $date = mysql2date('Y-m-d H:i', $post_id->post_date);//投稿日の取得
      if ( is_wordpress_excerpt() ) {//Wordpress固有の抜粋のとき
        $excerpt = $exce;
      } else {
        $excerpt = get_the_custom_excerpt($post_id->post_content, 80);//抜粋の取得
      }
      $target = is_blog_card_target_blank() ? ' target="_blank"' : '';//新しいタブで開く場合
      $hatebu = is_blog_card_hatena_visible() ? '<span class="blog-card-hatebu"><a href="http://b.hatena.ne.jp/entry/'.$url.'"'.$target.'><img src="http://b.hatena.ne.jp/entry/image/'.$url.'" alt="" /></a></span>' : '';//はてブを表示する場合
      $site_logo = is_blog_card_site_logo_visible() ? '<div class="blog-card-site"><span class="blog-card-favicon"><img src="'.get_the_favicon_url().'" class="blog-card-favicon-img" /></span><a href="'.get_bloginfo('url').'"'.$target.'>'.get_bloginfo('name').'</a></div>' : '';//サイトロゴを表示する場合
      $thumbnail = get_the_post_thumbnail($id, 'thumb100', array('style' => 'width:100px;height:100px;', 'class' => 'blog-card-thumb-image'));//サムネイルの取得（要100×100のサムネイル設定）
      if ( !$thumbnail ) {//サムネイルが存在しない場合
        $thumbnail = '<img src="'.get_template_directory_uri().'/images/no-image.png" style="width:100px;height:100px;" />';
      }
      //取得した情報からブログカードのHTMLタグを作成
      $tag = '<div class="blog-card"><div class="blog-card-thumbnail"><a href="'.$url.'" class="blog-card-thumbnail-link"'.$target.'>'.$thumbnail.'</a></div><div class="blog-card-content"><div class="blog-card-title"><a href="'.$url.'" class="blog-card-title-link"'.$target.'>'.$title.'</a></div><div class="blog-card-excerpt">'.$excerpt.'</div></div><div class="blog-card-footer">'.$site_logo.'<span class="blog-card-date">'.$date.'</span>'.$hatebu.'</div></div>';
      //本文中のURLをブログカードタグで置換
      $the_content = preg_replace('{'.preg_quote($match).'}', $tag , $the_content, 1);
    }
  }
  return $the_content;//置換後のコンテンツを返す
}
if ( is_blog_card_enable() ) {
  add_filter('the_content','url_to_blog_card');//本文表示をフック
}

////Twitterのユーザー名を自動的にリンク
//function twitter_id_replace($content) {
//$twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);
//return $twtreplace;
//}
//add_filter('the_content', 'twitter_id_replace');

//アップロード可能なファイルの設定
function my_upload_mimes($mimes = array()) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'my_upload_mimes');


//無記名のコメント投稿者名を変更する
function rename_anonymous_name() {
  global $comment;
  if( empty( $comment->comment_author ) ) {
    if( !empty( $comment->user_id ) ) {
      $user = get_userdata( $comment->user_id );
      $author = $user->user_login;
    } else {
      $author = get_theme_text_comment_anonymous_name();//匿名ユーザー名の取得
    }
  } else {
    $author = $comment->comment_author;
  }
  return $author;
}
add_filter( 'get_comment_author', 'rename_anonymous_name' );

//コメントリスト表示用カスタマイズコード
function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-listCon">
        <div class="comment-info">
            <?php echo get_avatar( $comment, 48 );//アバター画像 ?>
            <?php printf(__('<span class="admin">名前:<cite class="fn comment-author">%s</a></cite> </span> '), get_comment_author_link()); //投稿者の設定 ?>
            <span class="comment-datetime">投稿日：<?php printf(__('%1$s at %2$s'), get_comment_date('Y/m/d(D)'),  get_comment_time('H:i:s')); //投稿日の設定 ?></span>
            <span class="comment-id">
            ID：<?php //IDっぽい文字列の表示（あくまでIDっぽいものです。）
                $ip01 = get_comment_author_IP(); //書き込んだユーザーのIPアドレスを取得
                $ip02 = get_comment_date(jn); //今日の日付
                $ip03 = ip2long($ip01); //IPアドレスの数値化
                $ip04 = ($ip02) * ($ip03); //ip02とip03を掛け合わせる
                echo mb_substr(sha1($ip04), 2, 9); //sha1でハッシュ化、頭から9文字まで出力
                //echo mb_substr(base64_encode($ip04), 2, 9); //base64でエンコード、頭から9文字まで出力
            ?>
            </span>
            <span class="comment-edit"><?php edit_comment_link(__('Edit'),'  ',''); //編集リンク ?></span>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em>
        <?php endif; ?>
        <div class="comment-text"></div>
        <?php comment_text(); //コメント本文 ?>

        <?php //返信機能は不要なので削除 ?>
    </div>
</div>
<?php
}

//投稿ページと固定ページを一覧リストに表示する
function post_page_all( $query ) {
  if ( is_admin() || ! $query->is_main_query() )
    return;

  if ( $query->is_home() ) {
    $query->set( 'post_type', array( 'post', 'page' ) );
    return;
  }
}
if ( is_page_include_in_list() ) {//固定ページをリスト表示する設定のとき
  add_action( 'pre_get_posts', 'post_page_all' );
}

//アップデートチェックの初期化
require 'theme-update-checker.php'; //ライブラリのパス
$example_update_checker = new ThemeUpdateChecker(
'simplicity', //テーマフォルダ名
'http://wp-simplicity.com/wp-content/themes/simplicity/update-info.json' //JSONファイルのURL
);

// //WidthやHeight属性を削除
// function remove_width_attribute( $html ) {
//    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
//    return $html;
// }
// add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
// add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

// functions.php(子テーマのでも可)に追加
function my_comment_form_defaults($defaults){
//  'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    $defaults['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="expanding" name="comment" cols="45" rows="8" aria-required="true" placeholder=""></textarea></p>';
    return $defaults;
}
add_filter( "comment_form_defaults", "my_comment_form_defaults");

//画像タグにLazyLoad用の属性などを追加
function add_image_tag_placeholders( $content ) {
    //プレビューやフィードモバイルなどで遅延させない
    if( is_feed() || is_preview() || wp_is_mobile() )
        return $content;

    //既に適用させているところは処理しない
    if ( false !== strpos( $content, 'data-original' ) )
        return $content;

    //画像正規表現で置換
    $content = preg_replace(
        '#<img([^>]+?)src=[\'"]?([^\'"\s>]+)[\'"]?([^>]*)>#',//IMGタグの正規表現
        sprintf( '<img${1}src="%s" data-original="${2}"${3} data-lazy="true"><noscript><img${1}src="${2}"${3}></noscript>', get_template_directory_uri().'/images/1x1.trans.gif' ),//置換するIMGタグ（JavaScriptがオフのとき用のnoscriptタグも追加）
        $content );//投稿本文（置換する文章）

    return $content;
}
if ( is_lazy_load_enable() ) {//Lazy Loadが有効の場合のみ
  add_filter( 'the_content', 'add_image_tag_placeholders', 99 );
  //add_filter( 'post_thumbnail_html', 'add_image_tag_placeholders', 99 );
  add_filter( 'get_avatar', 'add_image_tag_placeholders', 11 );
}

//画像リンクのAタグをLightboxに対応するように付け替え
function add_lightbox_property( $content ) {
  //プレビューやフィードで表示しない
  if( is_feed() || is_preview() || wp_is_mobile() )
    return $content;

  //既に適用させているところは処理しない
   if ( false !== strpos( $content, 'data-lightbox="image-set"' ) )
    return $content;

  //Aタグを正規表現で置換
  $content = preg_replace(
    '/<a([^>]+?(\.jpg|\.png|\.gif)[\'\"][^>]*?)>\s*(<img[^>]+?>)\s*<\/a>/i',//Aタグの正規表現
    '<a${1} data-lightbox="image-set">${3}</a>',//置換する
    $content );//投稿本文（置換する文章）

  return $content;
}
if ( is_lightbox_enable() ) {
  add_filter( 'the_content', 'add_lightbox_property', 11 );
}
