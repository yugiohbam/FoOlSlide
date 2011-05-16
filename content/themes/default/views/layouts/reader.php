<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $template['title']; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php echo $template['metadata']; ?>
		<?php echo link_tag('content/themes/default/style.css') ?>


		<script type="text/javascript">
			(function() {
				if (window.__twitterIntentHandler) return;
				var intentRegex = /twitter\.com(\:\d{2,4})?\/intent\/(\w+)/,
				windowOptions = 'scrollbars=yes,resizable=yes,toolbar=no,location=yes',
				width = 550,
				height = 420,
				winHeight = screen.height,
				winWidth = screen.width;

				function handleIntent(e) {
					e = e || window.event;
					var target = e.target || e.srcElement,
					m, left, top;

					while (target && target.nodeName.toLowerCase() !== 'a') {
						target = target.parentNode;
					}

					if (target && target.nodeName.toLowerCase() === 'a' && target.href) {
						m = target.href.match(intentRegex);
						if (m) {
							left = Math.round((winWidth / 2) - (width / 2));
							top = 0;

							if (winHeight > height) {
								top = Math.round((winHeight / 2) - (height / 2));
							}

							window.open(target.href, 'intent', windowOptions + ',width=' + width +
								',height=' + height + ',left=' + left + ',top=' + top);
							e.returnValue = false;
							e.preventDefault && e.preventDefault();
						}
					}
				}

				if (document.addEventListener) {
					document.addEventListener('click', handleIntent, false);
				} else if (document.attachEvent) {
					document.attachEvent('onclick', handleIntent);
				}
				window.__twitterIntentHandler = true;
			}());
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">

				<div id="navig">
					<ul>
						<li>
							<a href="<?php echo site_url('/reader/') ?>"><?php echo _('Home'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('/reader/list') ?>"><?php echo _('Series list'); ?></a>
						</li>
						<li style="width:280px;">
							<?php
							echo form_open("/reader/search/");
							echo form_input(array('name' => 'search', 'placeholder' => _('To search, type and hit enter'), 'id' => 'searchbox'));
							echo form_close();
							?>
							<a href="<?php echo site_url('/reader/search/') ?>"><?php echo _('Search'); ?></a>
						</li>
						<div class="clearer"></div>
					</ul>
				</div>

				<a href="<?php echo site_url('/reader/') ?>"><div id="title"><?php echo get_setting('fs_gen_site_title') ?></div></a> 
				<?php echo'<div class="home_url"><a href="' . get_setting('fs_gen_back_url') . '">Go back to site &crarr;</a></div>'; ?>
				<div class="clearer"></div>	
			</div>




			<div id="content">
				<?php
				if (!isset($is_reader) || !$is_reader)
					echo '<div class="panel">' . get_sidebar();
				
				if (get_setting('fs_ads_top_banner') && get_setting('fs_ads_top_banner_active')) echo '<div class="ads static banner" id="ads_static_top_banner">'.get_setting('fs_ads_top_banner').'</div>';
				echo $template['body'];
				
				if (get_setting('fs_ads_bottom_banner') && get_setting('fs_ads_bottom_banner_active')) echo '<div class="ads static banner" id="ads_static_top_banner">'.get_setting('fs_ads_top_banner').'</div>';

				if (!isset($is_reader) || !$is_reader)
					echo '</div>';
				?>

			</div>

		</div>
		<div id="footer">
			<div class="text">
<?php echo get_setting('fs_gen_footer_text'); ?>
			</div>
		</div>

		<a href="http://twitter.com/intent/user?screen_name=woxxy">test </a>
	</body>
</html>