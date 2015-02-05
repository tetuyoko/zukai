<?php //主にモバイル用に表情は早くするためのアイコンボタン ?>
<?php if ( is_all_sns_share_btns_visible() ): ?>
<div id="sns-buttons" class="sns-buttons-icon">
  <?php if ( get_share_msg() ): //シェアボタン用のメッセージを取得?>
  <p class="sns-share-msg"><?php echo esc_html( get_share_msg() ) ?></p>
  <?php endif; ?>
  <ul class="snsb clearfix snsbs">
    <?php if ( is_twitter_btn_visible() )://Twitterボタンを表示するか ?>
  	<li class="twitter-btn-icon"><a href="http://twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php the_permalink() ?>" class="twitter-btn-icon-link" rel="nofollow"><span class="icon-twitter"></span><span class="social-count twitter-count"><i class="fa fa-spinner fa-spin"></i></span></a></li>
    <?php endif; ?>
    <?php if ( is_facebook_btn_visible() )://Facebookボタンを表示するか ?>
  	<li class="facebook-btn-icon"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php echo urlencode( get_the_title() ); ?>" class="facebook-btn-icon-link" rel="nofollow"><span class="icon-facebook"></span><span class="social-count facebook-count"><i class="fa fa-spinner fa-spin"></i></span></a></li>
    <?php endif; ?>
    <?php if ( is_google_plus_btn_visible() )://Google＋ボタンを表示するか ?>
  	<li class="google-plus-btn-icon"><a href="https://plus.google.com/share?url=<?php echo rawurlencode(get_permalink($post->ID)) ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="google-plus-btn-icon-link" rel="nofollow"><span class="icon-googleplus"></span><span class="social-count googleplus-count"><i class="fa fa-spinner fa-spin"></i></span></a></li>
    <?php endif; ?>
    <?php if ( is_hatena_btn_visible() )://はてなボタンを表示するか ?>
  	<li class="hatena-btn-icon"><?php
//    $page_title=trim(wp_title( '', false));
//    $page_title_encoded=urlencode(mb_convert_encoding($page_title, "UTF-8"));
?>
    <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_encoded_url(get_permalink()) ?>&title=<?php echo get_encoded_title( trim(wp_title( '', false)) ); ?>" class="hatena-btn-icon-link" rel="nofollow"><span class="icon-hatena"></span><span class="social-count hatebu-count"><i class="fa fa-spinner fa-spin"></i></span></a></li>
    <?php endif; ?>
    <?php if ( is_pocket_btn_visible() )://pocketボタンを表示するか ?>
  	<li class="pocket-btn-icon"><a href="javascript:(function(){var%20e=function(t,n,r,i,s){var%20o=[6190807,8043381,2969406,4070925,1100409,7962539,1015338,1109393,3582809,5313840];var%20i=i||0,u=0,n=n||[],r=r||0,s=s||0;var%20a={'a':97,'b':98,'c':99,'d':100,'e':101,'f':102,'g':103,'h':104,'i':105,'j':106,'k':107,'l':108,'m':109,'n':110,'o':111,'p':112,'q':113,'r':114,'s':115,'t':116,'u':117,'v':118,'w':119,'x':120,'y':121,'z':122,'A':65,'B':66,'C':67,'D':68,'E':69,'F':70,'G':71,'H':72,'I':73,'J':74,'K':75,'L':76,'M':77,'N':78,'O':79,'P':80,'Q':81,'R':82,'S':83,'T':84,'U':85,'V':86,'W':87,'X':88,'Y':89,'Z':90,'0':48,'1':49,'2':50,'3':51,'4':52,'5':53,'6':54,'7':55,'8':56,'9':57,'\/':47,':':58,'?':63,'=':61,'-':45,'_':95,'&':38,'$':36,'!':33,'.':46};if(!s||s==0){t=o[0]+t}for(var%20f=0;f<t.length;f++){var%20l=function(e,t){return%20a[e[t]]?a[e[t]]:e.charCodeAt(t)}(t,f);if(!l*1)l=3;var%20c=l*(o[i]+l*o[u%o.length]);n[r]=(n[r]?n[r]+c:c)+s+u;var%20p=c%(50*1);if(n[p]){var%20d=n[r];n[r]=n[p];n[p]=d}u+=c;r=r==50?0:r+1;i=i==o.length-1?0:i+1}if(s==344){var%20v='';for(var%20f=0;f<n.length;f++){v+=String.fromCharCode(n[f]%(25*1)+97)}o=function(){};return%20v+'9bcf56da30'}else{return%20e(u+'',n,r,i,s+1)}};var%20t=document,n=t.location.href,r=t.title;var%20i=e(n);var%20s=t.createElement('script');s.type='text/javascript';s.src='https://getpocket.com/b/r4.js?h='+i+'&u='+encodeURIComponent(n)+'&t='+encodeURIComponent(r);e=i=function(){};var%20o=t.getElementsByTagName('head')[0]||t.documentElement;o.appendChild(s)})()" class="pocket-btn-icon-link" rel="nofollow"><span class="icon-pocket"></span><span class="social-count pocket-count"><i class="fa fa-spinner fa-spin"></i></span></a></li>
    <?php endif; ?>
    <?php if ( is_line_btn_visible() )://LINEボタンを表示するか ?>
      <?php if (wp_is_mobile()): //モバイルの時のみ表示?>
    	<li class="line-btn-icon"><a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>" class="line-btn-icon-link" rel="nofollow"><span class="icon-line"></span></a></li>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ( is_evernote_btn_visible() )://Evernoteボタンを表示するか ?>
    <li class="evernote-btn-icon">
    <a href="#" onclick="Evernote.doClip({url:'<?php the_permalink();?>',
    providerName:'<?php bloginfo('name'); ?>',
    title:'<?php the_title();?>',
    contentId:'the-content',
    }); return false;" class="evernote-btn-icon-link" rel="nofollow"><span class="icon-evernote"></span></a></li>
    <?php endif; ?>
    <?php if ( is_feedly_btn_visible() )://feedlyボタンを表示するか ?>
    <li class="feedly-btn-icon">
    <a href="http://feedly.com/index.html#subscription%2Ffeed%2F<?php urlencode(bloginfo('rss2_url')); ?>" class="evernote-btn-icon-link" rel="nofollow"><span class="icon-feedly"></span><span class="social-count feedly-count"><i class="fa fa-spinner fa-spin"></i></span></a></li>
    <?php endif; //is_feedly_btn_visible?>
  </ul>
</div>
<?php endif; ?>