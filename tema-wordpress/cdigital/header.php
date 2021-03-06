<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
        <title>Cultura Digital</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   		<?php do_action( 'bp_head' ) ?>
   		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
        <?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
		<?php endif; ?>
		<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
		<?php endif; ?>
		<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
		<?php endif; ?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <!--[if IE 7]>
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/global/css/ie7.css" />
        <![endif]-->
        <?php
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-tabs', 'jquery');
			wp_enqueue_script('', get_bloginfo('stylesheet_directory').'/global/js/jquery.tooltip.min.js', 'jquery');
			wp_enqueue_script('functions', get_bloginfo('template_directory').'/global/js/functions.js', 'jquery');
			if ( is_singular() and comments_open() and (get_option('thread_comments') == 1) or is_page() and comments_open() and (get_option('thread_comments') == 1) ) wp_enqueue_script( 'comment-reply' );
			wp_head();
		?>
    </head>

    <body <?php body_class() ?>>
        <div id="general">
            <div id="header">
                <div class="middle">
                	<div class="tit">
                    	<?php if(is_single() || is_page()) : ?>
                        <h2 class="title">
                        	<a href="<?php echo site_url() ?>" title="<?php bp_site_name() ?>"><?php bp_site_name() ?></a>
                        </h2>
                        <?php else : ?>
                        <h1 class="title">
                        	<a href="<?php echo site_url() ?>" title="<?php bp_site_name() ?>"><?php bp_site_name() ?></a>
                        </h1>
                        <?php endif; ?>
                        <a href="#content" class="displayNone">Skip to content</a>
					</div>

			        <div class="login">
			            <div class="outer">
                            <form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
                                <label for="search-terms">Pesquisar:</label>
                                <input type="text" id="search-terms" class="inputDefault" name="search-terms" value="" />
                                <?php echo bp_search_form_type_select() ?>
                                <input type="submit" name="search-submit" id="search-submit" class="submitDefault" value="buscar" />
                                <?php wp_nonce_field( 'bp_search_form' ) ?>
                            </form>
					        <div class="clear"></div>
					    </div>
			        </div>
				</div>

			    <div class="menu">
		            <div class="middle">
		                <ul class="nav">
               				<li<?php if ( bp_is_page( 'home' ) && !is_page() ) : ?> class="current_page_item"<?php endif; ?>>
                				<a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?></a>
                            </li>
            				<?php wp_list_pages( 'title_li=&exclude=1896,1919,1921' ); ?>
                            <li><a href="<?php bloginfo('url'); ?>/blog/2009/09/26/baixe-o-livro-culturadigital-br/">Download do livro</a></li>
                            <li><a href="<?php bloginfo('url'); ?>/blog/category/labblog/">Notícias</a></li>
							<?php do_action( 'bp_nav_items' ); ?>
		                </ul>
                        <ul class="bpNav">
                            <li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>>
                                <a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" title="<?php _e( 'Members', 'buddypress' ) ?>"><?php _e( 'Members', 'buddypress' ) ?></a>
                            </li>

							<?php if ( bp_is_active( 'activity' ) ) : ?>
                                <li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                    <a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( 'Activity', 'buddypress' ) ?>">Fluxo de atividades</a>
                                </li>
                            <?php endif; ?>

							<?php if ( bp_is_active( 'groups' ) ) : ?>
                                <li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="selected"<?php endif; ?>>
                                    <a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" title="<?php _e( 'Groups', 'buddypress' ) ?>"><?php _e( 'Groups', 'buddypress' ) ?></a>
                                </li>

                                <?php if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) bp_get_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
                                    <li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                        <a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" title="<?php _e( 'Forums', 'buddypress' ) ?>"><?php _e( 'Forums', 'buddypress' ) ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

							<?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
                                <li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                    <a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Blogs', 'buddypress' ) ?>"><?php _e( 'Blogs', 'buddypress' ) ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
		            </div>
			    </div>
            </div>

