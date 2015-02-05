<?php
//カスタマイザーでデータ保存前の場合はDBからデータ取得出来ないのでデフォルトをセットしておく
//参考：http://celtislab.net/archives/20140612/wordpress-customizer/
$link_color = get_theme_mod( 'link_color', LINK_COLOR);
$link_hover_color = get_theme_mod( 'link_hover_color', LINK_HOVER_COLOR);
$header_outer_background_color = get_theme_mod( 'header_outer_background_color', HEADER_OUTER_BACKGROUND_COLOR);
$header_inner_background_color = get_theme_mod( 'header_inner_background_color', HEADER_INNER_BACKGROUND_COLOR);
$site_title_color = get_theme_mod( 'site_title_color', SITE_TITLE_COLOR);
$site_description_color = get_theme_mod( 'site_description_color', SITE_DESCRIPTION_COLOR);
$mobile_background_color = get_theme_mod( 'mobile_background_color', MOBILE_BACKGROUND_COLOR);
$mobile_site_title_color = get_theme_mod( 'mobile_site_title_color', SITE_TITLE_COLOR);
$mobile_site_description_color = get_theme_mod( 'mobile_site_description_color', SITE_DESCRIPTION_COLOR);
$navi_color = get_theme_mod( 'navi_color', NAVI_COLOR);
$navi_link_color = get_theme_mod( 'navi_link_color', NAVI_LINK_COLOR);
$navi_link_hover_color = get_theme_mod( 'navi_link_hover_color', NAVI_LINK_HOVER_COLOR);
$guide_button_color = get_theme_mod( 'guide_button_color', GUIDE_BUTTON_COLOR);
$footer_color = get_theme_mod( 'footer_color', FOOTER_COLOR);
?>
<style type="text/css">
<?php //リンク色
if ( $link_color != LINK_COLOR): ?>
a {
  color:<?php echo $link_color; ?>;
}
<?php endif; ?>
<?php //リンクホバー色
if ( $link_hover_color != LINK_HOVER_COLOR): ?>
a:hover,
#new-entries a:hover,
#popular-entries a:hover,
.wpp-list a:hover,
.entry-read a:hover,
.entry .post-meta a:hover,
.related-entry-read a:hover,
.entry a:hover,
.related-entry-title a:hover,
.navigation a:hover,
#footer-widget a:hover,
.article-list .entry-title a:hover {
  color:<?php echo $link_hover_color; ?>;
}
<?php endif; ?>
<?php //ヘッダー外側背景色
if ( $header_outer_background_color != HEADER_OUTER_BACKGROUND_COLOR && !wp_is_mobile() ): ?>
#header {
  background-color:<?php echo $header_outer_background_color; ?>;
}
<?php endif; ?>
<?php //ヘッダー内側背景色
if ( $header_inner_background_color != HEADER_INNER_BACKGROUND_COLOR && !wp_is_mobile() ): ?>
#header-in {
  background-color:<?php echo $header_inner_background_color; ?>;
}
<?php endif; ?>
<?php //サイトタイトル色
if ( $site_title_color != SITE_TITLE_COLOR && !wp_is_mobile() ): ?>
#site-title a {
  color:<?php echo $site_title_color; ?>;
}
<?php endif; ?>
<?php //サイト概要色
if ( $site_description_color != SITE_DESCRIPTION_COLOR && !wp_is_mobile() ): ?>
#site-description {
  color:<?php echo $site_description_color; ?>;
}
<?php endif; ?>
<?php //モバイルヘッダー色
if ( $mobile_background_color != MOBILE_BACKGROUND_COLOR && wp_is_mobile() ): ?>
#header #h-top {
  background-color:<?php echo $mobile_background_color; ?>;
}
<?php endif; ?>
<?php //ナビゲーション色
if ( $navi_color != NAVI_COLOR):
/*echo $navi_color."\n";
echo NAVI_COLOR."\n";*/ ?>
#navi ul,
#navi ul.sub-menu,
#navi ul.children {
  background-color: <?php echo $navi_color; ?>;
  border-color: <?php echo $navi_color; ?>;
}
<?php endif; ?>
<?php //ナビゲーションを横幅いっぱいにするか
if ( is_navi_wide() ):
if ( $navi_color != NAVI_COLOR ): //デフォルトのナビゲーションカラーじゃないとき
/*echo $navi_color."\n";
echo NAVI_COLOR."\n";*/
?>
#navi {
  background-color: <?php echo $navi_color; ?>;
}
<?php else: ?>
#navi ul{
  border-width: 0;
}

#navi{
  background-color: <?php echo NAVI_COLOR; ?>;
  border:1px solid #ddd;
  border-width: 1px 0;
}
<?php endif;//$navi_color?>
@media screen and (max-width:1150px){
  #navi{
    background-color: transparent;
  }
}
<?php endif;//is_navi_wide ?>
<?php //ナビゲーションリンク色
if ( $navi_link_color != NAVI_LINK_COLOR ): ?>
#navi ul li a {
  color:<?php echo $navi_link_color; ?>;
}
<?php endif; ?>
<?php //ナビゲーションリンクホバー色
if ( $navi_link_hover_color != NAVI_LINK_HOVER_COLOR ): ?>
#navi ul li a:hover {
  background-color:<?php echo $navi_link_hover_color; ?>;
}
<?php endif; ?>
<?php //サイドバー左
if ( is_sidebar_left() ): ?>
#main{
  float:right;
}

#sidebar{
  float:left;
}

#sharebar{
  <?php if ( is_ads_performance_visible() ): //パフォーマンス（コンテンツトップ）広告がシェアバーとかぶらないようにする?>
  margin-left:710px;
  <?php else: ?>
  margin-left:700px;
  <?php endif; ?>
}

@media screen and (max-width:1150px){
  #sidebar{
    float:none;
  }
}
<?php else: //サイドバーが左じゃないとき?>
<?php //シェアバーが広告にかぶらないようにする
if ( is_ads_performance_visible() ): ?>
#sharebar {
  margin-left:-120px;
}
<?php endif;//is_ads_performance_visible ?>
<?php endif;//is_sidebar_left ?>
<?php //モバイルサイトタイトル色
if ( $mobile_site_title_color != SITE_TITLE_COLOR && wp_is_mobile() ): ?>
#site-title a {
  color:<?php echo $mobile_site_title_color; ?>;
}
<?php endif; ?>
<?php //モバイルサイト概要色
if ( $mobile_site_description_color != SITE_DESCRIPTION_COLOR && wp_is_mobile() ): ?>
#site-description {
  color:<?php echo $mobile_site_description_color; ?>;
}
<?php endif; ?>
<?php //ガイドボタン色
if ( $guide_button_color != GUIDE_BUTTON_COLOR): ?>
#mobile-menu a,
#page-top a {
  background-color:<?php echo $guide_button_color; ?>;
}

#mobile-menu a:hover,
#page-top a:hover {
  background-color:<?php echo $guide_button_color; ?>;
  opacity:0.7;
}
<?php endif; ?>
<?php //フッター色
if ( $footer_color != FOOTER_COLOR): ?>
#footer {
  background-color:<?php echo $footer_color; ?>;
}
<?php endif; ?>
<?php //ヘッダーの高さ
if ( get_header_height() != 100 && (!wp_is_mobile() || is_responsive_enable()) ): ?>
#h-top {
  min-height:<?php echo get_header_height(); ?>px;
}
<?php endif; ?>
<?php //広告を中央ぞろえ
if ( is_ads_center() ): ?>
.ad-space {
  text-align:center;
}
<?php endif; ?>
<?php //フォローボタンに色をつける
if ( is_colored_follow_btns() ): ?>
ul.snsp li.twitter-page a{
  color:#55ACEE;
}

ul.snsp li.facebook-page a{
  color:#3C5A99;
}

ul.snsp li.google-plus-page a{
  color:#DD4B39;
}

ul.snsp li.instagram-page a{
  color:#AB7F66;
}

ul.snsp li.feedly-page a{
  color:#87BD33;
}

ul.snsp li.rss-page a{
  color:#FE9900;
}

ul.snsp li a:hover{
  opacity:0.7 !important;
}
<?php endif; ?>
<?php //フッターを透過にする
if ( is_footer_transparent() ): ?>
#footer {
  background-color: transparent;
  color: #000;
}

#footer-widget {
  color: #000;
}

#footer a {
  color: <?php echo $link_color; ?>;
}

#footer h4{
  color:#333;
}

#copyright a{
  color:#111;
}
<?php endif; ?>
<?php //検索ボックスのスタイル
if ( get_search_style() == 'white_circle' ): ?>
#s {
  border-radius:25px;
}
<?php elseif ( get_search_style() == 'gray_rect' ): ?>
#s {
  background-color:#f3f3f3;
}
<?php elseif ( get_search_style() == 'gray_circle' ): ?>
#s {
  border-radius:25px;
  background-color:#f3f3f3;
}
<?php endif; ?>
<?php //引用部分の幅を広げる
if ( is_blockquote_wide() ): ?>
blockquote{
  margin-left:-29px;
  margin-right:-29px;
}
<?php if ( wp_is_mobile() ): ?>
blockquote{
  margin-left:0;
  margin-right:0;
}
<?php endif; //wp_is_mobile?>
<?php endif; //is_blockquote_wide?>
<?php //サムネイル表示
if ( !is_thumbnail_visible() ): ?>
/************************************
** サムネイルの非表示
************************************/
.entry-image,
.new-entry-thumb,
.popular-entry-thumb,
.related-entry-thumb{
  display:none;
}

#popular-entries .wpp-thumbnail{
  display:none !important;
}

.related-entry-thumbnail .related-entry-thumb{
  display:block;
}

.entry-content,
.related-entry-content{
  margin-left: 0;
}
<?php endif; ?>
<?php //本文文字サイズ
if ( get_article_font_size() != ARTICLE_FONT_SIZE): ?>
.article {
  font-size:<?php echo get_article_font_size(); ?>px;
}
<?php endif; ?>
<?php //サイドバーの幅を336pxにするかどうか
if ( is_sidebar_width_336() ): ?>

/*サイドバーの幅をレクタングル（大）の幅にする*/
#sidebar{
  width: 336px;
}
#header-in, #body-in, #footer-in{
  width: 1106px;
}

#navi-in{
  width: 1104px;/*ボーダーの分2pxを差し引く*/
}

/* 画面幅が1151px以下の時 */
@media screen and (max-width:1150px){
  #header, #header-in, #navi, #navi-in, #body-in, #footer-in{
    width:740px;
  }

  #header, #navi{
    margin: 0 auto;
  }

  #sidebar{
    width: auto;
    padding: 0 auto;
  }

}

/* 画面幅が1151px以上の時 */
@media screen and (min-width:1151px){
  #header, #navi, #navi ul{display:block;}
}
<?php if ( wp_is_mobile() ): ?>
#header, #h-top{
  min-height: 100px;
  width: 100%;
}

#navi{
  border: 0;
  margin: 0;
  width: 100%;
}
<?php endif; //wp_is_mobile?>
<?php endif; //is_sidebar_width_336?>
<?php if ( is_list_style_large_thumb_cards() ): //大きなサムネイル表示の場合?>
#main .entry{
  width:320px;
  height:420px;
  overflow:hidden;
  float:left;
  clear:none;
  margin:10px 10px 0 10px;
}

.entry-thumb {
  float: none;
  margin-right: 0;
  text-align:center;
}

.entry-thumb img{
  margin-bottom:0;
}

.entry-content {
  margin-left: 0;
}

.entry h2{
  margin-top:0;
  font-size:18px;
  overflow:hidden;
}

.entry-snippet{
  height:48px;
  overflow:hidden;
}


@media screen and (max-width:440px){
  #main .entry{
    height:auto;
  }
}
<?php endif; //is_list_style_large_thumb?>
<?php //ページトップのフォローボタンが表示されていないとき
if ( !is_top_follows_visible() ): ?>
#header .alignleft {
  margin-right: 30px;
  max-width: none;
}
<?php endif; ?>
<?php //サムネイルを丸める
if ( is_thumbnail_radius_10px() ): ?>
/*サムネイルをサークル状に*/
.entry-thumb img,
.related-entry-thumb img,
#new-entries ul li img,
#popular-entries ul li img,
#prev-next img{
  border-radius:10px;
}
<?php endif; ?>
<?php //サムネイルを円形にする
if ( is_thumbnail_circle() ): ?>
/*サムネイルをサークル状に*/
.entry-thumb img,
.related-entry-thumb img,
#new-entries ul li img,
#popular-entries ul li img,
#prev-next img{
  border-radius:50%;
}
<?php endif; ?>
<?php //タイル状リスト
if ( is_list_style_tile_thumb_cards() ): ?>
/*タイル状リスト*/
#main .entry{
  width:214px;
  margin:10px 5px 0 5px;
  border:1px solid #ddd;
  border-radius:5px;
  float:left;
  clear:none;
}

#list .entry .entry-thumb {
  margin-top:0;
  margin-right: 0;
  margin-left:0;
  text-align:center;
  margin-bottom: 0;
}

.entry-thumb img{
  width:100% !important;
  height:auto !important;
  margin-bottom:0;
}

.entry-content {
  margin-left: 0;
  clear:both;
}

.entry h2 a{
  margin-top:0;
  font-size:16px;
  line-height:110%;
}

.entry .post-meta{
  margin:0;
  font-size:14px;
}

.entry-snippet{
  font-size:14px;
  padding:0 5px;
  word-wrap:break-word;
}

.entry-read a{
  font-size:12px;
  padding:0 5px;
}

.entry .post-meta .category{
  display:none;
}

.entry h2{
  padding:0 5px;
  word-wrap:break-word;
}

.entry-read a.entry-read-link{
  padding:5px 0;
  margin-left:5px;
  margin-right:5px;
  margin-bottom:5px;
  width:auto;
}

<?php if ( is_list_style_tile_thumb_3columns_style() ): ?>
@media screen and (max-width:471px){
  #main .entry{
    width:100%;
    margin:5px 0;
  }

  .entry-thumb img{
    width:100% !important;
    height:auto !important;
  }

  .entry h2 a{
    font-size:16px;
  }

  .post-meta{
    font-size:14px;
  }
}
<?php endif; //is_list_style_tile_thumb_3columns_style?>
<?php if ( is_list_style_tile_thumb_2columns_style() ): ?>
#main .entry{
  width:328px;
}

.entry-thumb img{
  width:328px !important;
}

.entry h2 a{
  font-size:18px;
}

.post-meta{
  font-size:16px;
}

@media screen and (max-width:360px){
  #main .entry{
    width:100%;
    margin:5px 0;
  }

  .entry-thumb img{
    width:100% !important;
  }

  .entry h2 a{
    font-size:16px;
  }

  .post-meta{
    font-size:14px;
  }
}
<?php endif; //is_list_style_tile_thumb_2columns?>
<?php endif; ?>
<?php //レクタングルを縦に
if ( is_ads_vatical_rectangle() ): ?>
/*レクタングルを縦に*/
.ad-left{
  float:none;
  margin-right:0;
  width:auto;
}
.ad-right {
  float:none;
  margin-top:5px;
  margin-left:0;
  width:auto;
}
<?php endif; ?>
<?php //PCトップ広告をカスタムサイズ広告
if ( is_ads_custum_ad_space() && !wp_is_mobile() ): ?>
/*カスタムサイズ広告用レイアウト*/
.ad-top-pc {
  margin-left:0;
  margin-right:0;
  width:auto;
}
<?php endif; ?>
<?php //ブログカードをカラム幅いっぱいにする
if ( is_blog_card_width_auto() ): ?>
/*ブログカードをカラム幅いっぱいにする*/
.blog-card {
  width:auto;
  margin:20px;
}
<?php endif; ?>
<?php //ヘッダー外側の背景画像URLが設定されているとき
if ( get_header_outer_background_image() ): ?>
/*ヘッダー外側のスタイルの設定*/
#header {
  background-image: url("<?php echo get_header_outer_background_image(); ?>");
  background-position: 0 0;
  background-size: 100% auto;
}
<?php if ( !wp_is_mobile() ): ?>
@media screen and (max-width: 1150px) {
  #header, #header-in, #navi-in, #navi, #navi-in, #body-in, #footer-in {
      width: 740px;
      margin:auto;
  }
}

@media screen and (min-width: 1151px) {
  #navi ul{
    display:block;
  }
}
<?php endif; //!wp_is_mobile?>
<?php endif; //get_header_outer_background_image?>
<?php //関連記事のサムネイルが4列表示のとき
if ( is_related_entry_type_thumbnail4() ): ?>
/*関連記事のサムネイルが4列表示*/
.related-entry-thumbnail {
  height: 230px;
  width: 170px;
}

.related-entry-thumbnail .related-entry-title a{
  font-size: 14px;
}

.related-entry-thumbnail img {
  height: auto !important;
  width: 160px !important;
}
<?php endif; ?>
<?php //ブログカードのサムネイルを右側にする
if ( is_blog_card_thumbnail_right() ): ?>
/*ブログカードのサムネイルを右側に*/
.blog-card-thumbnail {
  float: right;
}

.blog-card-content {
  margin-left: 0;
  margin-right: 110px;
}
<?php endif; ?>
</style>