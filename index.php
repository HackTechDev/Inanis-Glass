<?php get_header(); ?>

<div id="page">
  <div id="colwrap">
    <?php include 'banner.php'; ?>    
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php if ($TimeStyle=="2"){$PostTime=get_the_time('G:i');$Post_Modified=get_the_modified_date('H:i');}else{$PostTime=get_the_time('g:i A');$Post_Modified=get_the_modified_date('h:i A');} ?> 
      <div class="win">
        <div class="win_tl"></div><div class="win_t"></div><div class="win_tr"></div><div class="win_bl"></div><div class="win_b"></div><div class="win_br"></div><div class="win_r"></div><div class="win_l"></div>
        <div class="win_title"><span class="win_tbl">&nbsp;</span><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3><span class="win_tbr">&nbsp;</span></div>
        <div class="win_ted">
          <div class="win_edt"><?php edit_post_link(__('Editer','inanis'),'[ ',' ] '); ?></div>
          <div class="win_pd">
            <span class="win_tbl">&nbsp;</span><span class="win_tb"><?php the_time('d M Y') ?> &agrave; <?php echo $PostTime; ?></span><span class="win_tbr">&nbsp;</span>
          </div>
        </div>                                                                                     
        <div class="win_bg"></div>
        <div class="win_tlgr"></div><div class="win_trgr"></div>
        <div class="win_out">
          <div class="win_in">
            <div class="win_post">
              <?php 
                  $content = get_the_content(__('More','inanis').' &raquo;');
                  $content = str_replace('<embed', '<embed wmode="transparent"', $content);
                  $content = str_replace('</object>', '<param name="wmode" value="transparent" /></object>', $content);
                  $content = apply_filters('the_content', $content);
                  echo $content;
                ?> 
            </div>
            <div class="win_info">
              <div class="win_infot"></div>
              <div class="win_infod">
                <strong><?php _e('Post&eacute; par :','inanis');?></strong> <?php the_author() ?><br />
                <strong><?php _e('Derni&egrave;re Edition :','inanis');?></strong> <?php the_modified_date('d M Y'); ?> &agrave; <?php echo $Post_Modified; ?><br /><br />
                <a rel="nofollow" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php _e('I thought you might like this','inanis'); ?>: <?php the_permalink() ?>"><?php _e('Courriel','inanis');?></a> &bull; 
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Lien Permanent vers','inanis');?> <?php the_title(); ?>"><?php _e('Permalien','inanis') ?></a> &bull; 
                <?php comments_popup_link(__('Commentaires','inanis').' (0)', __('Commentaires','inanis').' (1)', __('Commentaires','inanis').' (%)'); ?>
              </div> 
              <img class="win_infoi" src="<?php bloginfo('template_directory'); ?>/images/tags_50.png" alt="Tags" />
              <div class="win_infoc">
                 <?php the_tags('<strong>'.__('Tags','inanis').': </strong>', ', ', '<br />'); ?>
                 <strong><?php _e('Categories','inanis');?>:</strong> <?php the_category(', ') ?>
              </div>
            </div>
          </div> 
        </div>
      </div>

      <hr class="rule" />
      <?php endwhile; ?>

      <div class="frt navwrap">
        <?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>
        <div class="navi">
          <div class="flt"><?php next_posts_link('<img style="vertical-align:middle;" src="'.get_bloginfo('template_directory').'/images/arbk.png" alt=" " /> '.__('Pr&eacute;c&eacute;dente','inanis')) ?></div>
          <div class="frt"><?php previous_posts_link(__('Suivant','inanis').' <img style="vertical-align:middle;" src="'.get_bloginfo('template_directory').'/images/arfw.png">') ?></div>
        </div>
        <?php } ?>
      </div><br /><br /><br />

      <?php else : ?> 
      <div class="win"> 
        <div class="win_tl"></div><div class="win_t"></div><div class="win_tr"></div><div class="win_bl"></div><div class="win_b"></div><div class="win_br"></div><div class="win_r"></div><div class="win_l"></div>
        <div class="win_title"></div>
        <div class="win_ted">
          <div class="win_edt"></div>
          <div class="win_pd"></div>
        </div>                                                                                     
        <div class="win_bgb"></div>
        <div class="win_outb">
          <div class="banner">
            <h1><?php _e('Not Found','inanis');?></h1> 
            <p><?php _e('You seemed to have found a mislinked file, page, or search query with no results. If you feel you have reached this page in error, double check your search query and search again.','inanis');?></p>
            <h2><?php _e('Search','inanis');?></h2> 
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>  
          </div> 
        </div>
      </div>
      <?php endif; ?>
    <div style="clear:right;"></div>
  </div>
</div>
<?php get_sidebar(); ?> 
<?php get_footer(); ?>
