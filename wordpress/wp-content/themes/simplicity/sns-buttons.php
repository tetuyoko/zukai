<?php if ( is_bottom_sns_btns_visible() ): //本文下シェアボタンが表示のとき ?>
  <?php if (wp_is_mobile()) {//モバイルの時は単なるアイコン
    get_template_part('sns-buttons-icon');
  } else {//PCの時はバルーン付きボタン
    if ( is_simplicity_share_button() ) {//独自シェアボタンオンのとき
      get_template_part('sns-buttons-balloon');
    } else {//ソーシャルサービスのデフォルトのシェアボタン
      get_template_part('sns-buttons-default');
    }
  } ?>
<?php endif; ?>