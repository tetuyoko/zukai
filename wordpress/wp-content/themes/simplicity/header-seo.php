<?php //ヘッダー部分の内部SEO最適化策
//ヘッダー部分を子テーマでカスタマイズしていても
//SEOのアップデートは親テーマで上書きできるようにするためのテンプレート ?>
<?php if( (is_archive() && !is_category()) || //アーカイブページはインデックスに含めない
  is_tag() || //タグページをインデックスしたい場合はこの行を削除
  is_paged()  || //ページの2ページ目以降はインデックスに含めない（似たような内容の薄いコンテンツの除外）
  is_search() ): //検索結果ページはインデックスに含めない
?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>
<?php if ( is_singular() && is_meta_description_insert() ): //投稿＆抜粋をMETAタグに挿入するとき
  $desc = trim(strip_tags( get_the_excerpt() ));
  if ( !$desc ) {//投稿で抜粋が設定されていない場合は、115文字の冒頭の抽出分
    global $post;
    $desc = get_the_custom_excerpt( $post->post_content, 115 );
  }
?>

<meta name="description" content="<?php echo $desc; ?>" />
<?php endif; ?>