<?php
///////////////////////////////////////////
//ヘッダーのCSSに関連する記述をまとめて書く
///////////////////////////////////////////
?>
<?php if ( is_singular() ): ?>
<link href='http://fonts.googleapis.com/css?family=Boogaloo' rel='stylesheet' type='text/css'>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/webfonts/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/webfonts/icomoon/style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fluidity.min.css">
<?php
if ( get_skin_file() ): //設定されたスキンがある場合?>
  <link rel="stylesheet" href="<?php echo get_skin_file(); ?>">
<?php endif; //設定されたスキン
?>
<?php if ( is_comment_type_thread() )://2chコメントタイプ ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/thread.css">
  <?php if ( wp_is_mobile() && !is_responsive_enable() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/thread-mobile.css">
  <?php endif; //wp_is_mobile && !is_responsive_enable()?>
  <?php if ( is_responsive_enable() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/thread-responsive.css">
  <?php endif; //is_responsive_enable?>
<?php elseif ( is_comment_type_thread_simple() )://シンプルなスレッドコメントタイプ ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/thread-simple.css">
<?php endif; //コメントタイプ終了?>