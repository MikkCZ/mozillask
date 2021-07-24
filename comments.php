<?php // Do not delete these lines
  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die ('Please do not load this page directly. Thanks!');
  }
?>
<?php if ( !empty($post->post_password) && ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) ) : // if there's a password and it doesn't match the cookie ?>
  <p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
<?php
  return;
endif;

/* This variable is for alternating comment background */
$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>

  <h3 id="comments"><?php comments_number('Žiadne komentáre', '1 komentár', 'Komentáre (%)' );?> k&nbsp;príspevku &#8220;<?php the_title(); ?>&#8221;</h3>
  <ol class="commentlist">
    <?php foreach ($comments as $comment) : ?>
      <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID(); ?>">
        <cite><?php comment_author_link(); ?></cite>
        napísal: <?php if ($comment->comment_approved == '0') : ?><em>Váš komentár čaká na moderáciu.</em><?php endif; ?>
        <br />
        <small class="commentmetadata"><a href="#comment-<?php comment_ID(); ?>" title=""><?php comment_date('j.n.Y'); ?> o&nbsp;<?php comment_time(); ?></a> <?php edit_comment_link('upraviť',' | ',''); ?></small>
        <?php comment_text(); ?>
      </li>
      <?php
        /* Changes every other comment to a different class */
        if ('alt' == $oddcomment) {
          $oddcomment = '';
        } else {
          $oddcomment = 'alt';
        }
      ?>
    <?php endforeach; /* end for each comment */ ?>
  </ol>

<?php endif; // If there are any comments ?>


<?php if ('open' == $post-> comment_status) : ?>

  <h3 id="respond">Pridať komentár</h3>

  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>Musíte sa <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">prihlásiť</a>, aby ste mohli pridať komentár.</p>
  <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

      <?php if ( $user_ID ) : ?>
        <p>Prihlásený ako <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account'); ?>">Odhlásiť &raquo;</a></p>
      <?php else : ?>
        <p>
          <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
          <label for="author"><small>Meno <?php if ($req) echo('(povinné)'); ?></small></label>
        </p>
        <p>
          <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
          <label for="email"><small>E-mail (nezverejní sa) <?php if ($req) echo('(povinné)'); ?></small></label>
        </p>
        <p>
          <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
          <label for="url"><small>Webová stránka</small></label>
        </p>
      <?php endif; ?>

      <p><textarea name="comment" id="comment" cols="100%" rows="7" tabindex="4"></textarea></p>
      <p><small><strong>XHTML:</strong> Môžete použiť nasledujúce tagy: <?php echo allowed_tags(); ?></small></p>
      <p>
        <input name="submit" type="submit" id="submit_c" tabindex="5" value="Odoslať komentár" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </p>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
  <?php endif; // If registration required and not logged in ?>

<?php else: ?>

  <p class="nocomments">Komentáre sú uzavreté.</p>

<?php endif;  // If comments are open ?>
