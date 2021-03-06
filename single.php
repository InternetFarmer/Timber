<?php
/**
 * Theme Name: Timber
 * Theme URI: http://wuplus.net/timber
 * Author: WuPlus
 * Author URI: http://wuplus.net
 * Description: This theme is based on Bootstrap project.
 * Version: 1.0
 */

get_header(); ?>

    <div class="row">
        <div class="col-md-8">
            <div id="primary" class="site-content">
                <div id="content" role="main">
                    <?php if ( have_posts() ) : ?>
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <br>
                            <ol class="breadcrumb">
                                <li><a href="<?php home_url()?>">主页</a></li>
                                <li><?php timber_get_category(get_the_ID()) ?></li>
                                <li class="active"><?php the_title()?></li>
                            </ol>
                            <section class="post" id="post-<?php the_ID(); ?>">
                                <div class="panel panel-info">
                                    <div class="panel-heading" id="single_header">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h3><?php the_title(); ?></h3>
                                                <ul class="list-inline" style=" margin-bottom: 0px; ">
                                                    <li class="active">~<?php the_author() ?>&nbsp;&nbsp;/</li>
                                                    <li class="active"><?php the_time('F j, Y') ?> &nbsp;&nbsp;/</li>
                                                    <li class="active"><?php timber_get_category(get_the_ID()) ?>&nbsp;&nbsp;/</li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-2 hidden-xs" id="post_avatar">
                                                <?php echo get_avatar(get_the_ID(),42); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body" id="post-<?php the_ID()?>">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="panel-footer">
                                        <div  class=”copyright”>
                                            <p>
                                                声明：文章均为原创，转载请以链接形式标明本文标题和地址
                                                <br/>本文标题：<?php the_title(); ?>
                                                <br/>本文地址：<a href=”<?php the_permalink(); ?>” title=”<?php the_title(); ?>”><?php the_permalink(); ?>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pager">
                                <?php
                                $prev_post = get_adjacent_post( false, '', true );
                                $next_post = get_adjacent_post( false, '', false, 'category_name' );
                                ?>
                                <?php if ( !empty( $prev_post ) ): ?>
                                    <li><a href="<?php echo $prev_post->guid; ?>">&laquo; <?php echo $prev_post->post_title; ?></a></li>
                                <?php endif; ?>
                                    <?php if ( !empty( $next_post ) ): ?>
                                        <li><a href="<?php echo $next_post->guid; ?>"><?php echo $next_post->post_title; ?> &raquo;</a></li>
                                    <?php endif; ?>
                                </ul>
                            </section>
                        <?php endwhile; ?>
                    <?php endif;?>
                    <div class="panel panel-default">
                        <?php comments_template(); ?>
                    </div>
                </div><!-- #content -->
            </div><!-- #primary -->
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer(); ?>