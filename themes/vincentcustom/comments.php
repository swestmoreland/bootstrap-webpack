<?php
if ( is_single() || is_page() ) :
  echo '<div class="clearfix"></div>';
  if ( have_comments() && comments_open() ) : ?>
    <h4 id="comments"><?php comments_number( __( 'Leave a Comment', 'bootstrap-four' ), __( 'One Comment', 'bootstrap-four' ), '%' . __( ' Comments', 'bootstrap-four' ) );?></h4>
    <ul class="commentlist">
      <?php wp_list_comments(); ?>
      <?php paginate_comments_links(); ?>
      <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    </ul>
<?php
    comment_form();
  else :
    if ( comments_open() ) :
      comment_form();
    endif;
  endif;
endif;
?>
