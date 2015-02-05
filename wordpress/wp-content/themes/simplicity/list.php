<!-- パンくずリスト -->
<?php
  if (is_category()) {
    get_template_part('breadcrumbs');
  }
?>

<!-- アーカイブのタイトル -->
<?php if (!is_home() && !is_search()) { ?>
  <h1 id="archive-title"><q>
    <?php if( is_category() ) { ?>
    <?php single_cat_title(); ?>
    <?php } elseif( is_tag() ) { ?>
    <?php single_tag_title(); ?>
    <?php } elseif( is_tax() ) { ?>
    <?php single_term_title(); ?>
    <?php } elseif (is_day()) { ?>
    <?php echo get_the_time( get_theme_text_ymd_format() );//年月日のフォーマットを取得 ?>
    <?php } elseif (is_month()) { ?>
    <?php echo get_the_time( get_theme_text_ym_format() );//年と月のフォーマットを取得 ?>
    <?php } elseif (is_year()) { ?>
    <?php echo get_the_time( get_theme_text_y_format() );//年のフォーマットを取得 ?>
    <?php } elseif (is_author()) { ?>
    <?php echo esc_html(get_queried_object()->display_name); ?>
    <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    Archives
    <?php } else { ?>
    Archives
    <?php } ?>
  </q><?php echo get_theme_text_list();//「一覧」部分の取得 ?>
  </h1>
<?php } ?>


<?php if (!is_home() || is_ads_top_page_visible())//メインページ以外は広告を出す
  get_template_part('ad-top');//記事トップ広告 ?>

<!-- カテゴリの説明文 -->
<?php if (is_category() && !is_paged() && category_description()) : ?>
<div class="category-description"><?php echo category_description(); ?></div>
<?php endif; ?>

<div id="list">
<!-- 記事一覧 -->
<?php
if (have_posts()) : // WordPress ループ
  $count = 0;
  while (have_posts()) : the_post(); // 繰り返し処理開始
    $count += 1;
    if ( is_list_style_bodies() ) {//一覧表示スタイルが本文表示
      get_template_part('entry-body');//一覧表示スタイルが本文表示の場合
    } else {//サムネイルカードか、大きなサムネイルカードの場合
      get_template_part('entry-card');//一覧表示スタイルがカードor大きなサムネイルカード表示の場合
    }

    //トップページ中間に広告をできるかどうか（表示するかどうか）
    if ( is_ads_list_in_middle_on_top_page_enable($count) ) {
      get_template_part('ad');
    }

  endwhile; // 繰り返し処理終了 ?>
  <div class="clear"></div>
<?php else : // ここから記事が見つからなかった場合の処理  ?>
    <div class="post">
      <h2>NOT FOUND</h2>
      <p>お探しの記事は見つかりませんでした。</p>
    </div>
<?php
endif;
?>
</div><!-- /#list -->

<?php if (!is_home() || is_ads_top_page_visible()) ://メインページ以外は広告を出す
  get_template_part('ad-article-footer' );
endif; ?>

<!--ページャー-->
<div class="pager">
  <?php global $wp_rewrite;
  $paginate_base = get_pagenum_link(1);
  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
    $paginate_format = '';
    $paginate_base = add_query_arg('paged','%#%');
  }
  else{
    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
    user_trailingslashit('page/%#%/','paged');;
    $paginate_base .= '%_%';
  }

  if (wp_is_mobile()) {
    $mid_size = 1;
  } else {
    $mid_size = 3;
  }

  echo paginate_links(array(
    'base' => $paginate_base,
    'format' => $paginate_format,
    'total' => $wp_query->max_num_pages,
    'mid_size' => $mid_size,
    'current' => ($paged ? $paged : 1),
    'prev_text' => '<i class="fa fa-caret-left fa-fx"></i>&#160;',
    'next_text' => '&#160;<i class="fa fa-caret-right fa-fx"></i>',
  )); ?>
</div><!-- /.pager -->