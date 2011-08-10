<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $template['title']; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<?php echo link_tag('content/themes/' . (get_setting('fs_theme_dir') ? get_setting('fs_theme_dir') : 'default') . '/style.css') ?> 
		<link rel="alternate" type="application/rss+xml" title="<?php echo get_setting('fs_gen_site_title') . ' RSS' ?>" href="<?php echo site_url('reader/feeds/rss') ?>" /> 
		<link rel='index' title='<?php echo get_setting('fs_gen_site_title') ?>' href='<?php echo site_url() ?>' />
		<meta name="generator" content="FoOlSlide <?php echo get_setting('fs_priv_version') ?>" />
		<script src="<?php echo site_url() . 'assets/js/jquery.js' ?>"></script>
		<script src="<?php echo site_url() . 'assets/js/jquery.plugins.js' ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function(){
<?php if ($this->agent->is_browser('MSIE'))
{ ?>

			// Let's make placeholders work on IE and old browsers too
			jQuery('[placeholder]').focus(function() {
				var input = jQuery(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
					input.removeClass('placeholder');
				}
			}).blur(function() {
				var input = jQuery(this);
				if (input.val() == '' || input.val() == input.attr('placeholder')) {
					input.addClass('placeholder');
					input.val(input.attr('placeholder'));
				}
			}).blur().parents('form').submit(function() {
				jQuery(this).find('[placeholder]').each(function() {
					var input =jQuery(this);
					if (input.val() == input.attr('placeholder')) {
						input.val('');
					}
				})
			}); <?php } ?>
	});
			
		</script>
		<?php echo get_setting('fs_theme_header_code'); ?>

	</head>
	<body class="<?php if (isset($_COOKIE["night_mode"]) && $_COOKIE["night_mode"] == 1)
			echo 'night '; ?>">
		<div id="wrapper">
			<?php echo get_setting('fs_theme_preheader_text'); ?>
			<div id="header">
				<?php echo get_setting('fs_theme_header_text'); ?>
				<div role="navigation" id="navig">
					<ul>
						<li>
							<a href="<?php echo site_url('/reader/') ?>"><?php echo _('Latest releases'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('/reader/list') ?>"><?php echo _('Series list'); ?></a>
						</li>
						<li style="">
							<?php
							echo form_open("/reader/search/");
							echo form_input(array('name' => 'search', 'placeholder' => _('To search series, type and hit enter'), 'id' => 'searchbox', 'class' => 'fright'));
							echo form_close();
							?>
						</li>
						<li>
							<a style="padding:0;" href="<?php echo site_url('reader/feeds/rss') ?>"><img height="28" width="28" style="position:relative; top:1px;" src="<?php echo site_url() . 'content/themes/default/images/feed-icon-28x28.png' ?>" /></a>
						</li>

						<div class="clearer"></div>
					</ul>
				</div>

				<a href="<?php echo site_url('/reader/') ?>"><div id="title"><?php echo get_setting('fs_gen_site_title') ?></div></a> 
				<?php if (get_setting('fs_gen_back_url'))
					echo'<div class="home_url"><a href="' . get_setting('fs_gen_back_url') . '">' . _("Go back to site") . ' &crarr;</a></div>'; ?>
				<div class="clearer"></div>	
			</div>




			<article id="content">
				<?php
				if (!isset($is_reader) || !$is_reader)
					echo '<div class="panel">';

				if (get_setting('fs_ads_top_banner') && get_setting('fs_ads_top_banner_active') && !get_setting('fs_ads_top_banner_reload'))
					echo '<div class="ads banner" id="ads_top_banner">' . get_setting('fs_ads_top_banner') . '</div>';

				if (get_setting('fs_ads_top_banner') && get_setting('fs_ads_top_banner_active') && get_setting('fs_ads_top_banner_reload'))
					echo '<div class="ads iframe banner" id="ads_top_banner"><iframe marginheight="0" marginwidth="0" frameborder="0" src="' . site_url() . 'content/ads/ads_top.html' . '"></iframe></div>';


				if (!isset($is_reader) || !$is_reader)
					echo get_sidebar();


				// here we output the body of the page
				echo $template['body'];
				

				if (get_setting('fs_ads_bottom_banner') && get_setting('fs_ads_bottom_banner_active') && !get_setting('fs_ads_bottom_banner_reload'))
					echo '<div class="ads banner" id="ads_bottom_banner">' . get_setting('fs_ads_bottom_banner') . '</div>';

				if (get_setting('fs_ads_bottom_banner') && get_setting('fs_ads_bottom_banner_active') && get_setting('fs_ads_bottom_banner_reload'))
					echo '<div class="ads iframe banner" id="ads_top_banner"><iframe marginheight="0" marginwidth="0" frameborder="0" src="' . site_url() . 'content/ads/ads_bottom.html' . '"></iframe></div>';
				
				if (!isset($is_reader) || !$is_reader)
					echo '</div>';
				?>

			</article>

		</div>
		<div id="footer">
			<div class="text">
				<div>
					<?php echo get_setting('fs_gen_footer_text'); ?>
				</div>
				<div class="cp_link">
					<a href="http://trac.foolrulez.com/foolslide" target="_blank"><img src="<?php echo site_url() . 'content/themes/default/images/logo_footer.png' ?>" /></a>
				</div>
			</div>
		</div>
		
		<div id="messages">
		</div>
	</body>
	<?php echo get_setting('fs_theme_footer_code'); ?>
</html>