<?php
/*
Plugin Name: Embedded Video with Link
Plugin URI: http://www.jovelstefan.de/embedded-video/
Description: Easy embedding of videos from various portals or local video files with corresponding link. <a href="options-general.php?page=embeddedvideo_options_page">Configure...</a>
Version: 3.2.2
License: GPL
Author: Stefan He&szlig;
Author URI: http://www.jovelstefan.de

Contact mail: jovelstefan@gmx.de
*/
DEFINE ("EV_VERSION", "322");

// prevent file from being accessed directly

if ('embedded-video.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not access this file directly. Thanks!');

// initiate options and variables
add_option('embeddedvideo_prefix', "Direkt");
add_option('embeddedvideo_space', "false");
add_option('embeddedvideo_width', 425);
add_option('embeddedvideo_show_quicktag', TRUE);
add_option('embeddedvideo_small', FALSE);
add_option('embeddedvideo_pluginlink', TRUE);
add_option('embeddedvideo_version', EV_VERSION);
add_option('embeddedvideo_updnotific', FALSE);
add_option('embeddedvideo_shownolink', FALSE);
update_option('embeddedvideo_version', EV_VERSION);

if ('true' == get_option('embeddedvideo_space')) {
	$ev_space = '&nbsp;';
} else {
	$ev_space = '';
}

define("LINKTEXT", get_option('embeddedvideo_prefix').$ev_space);
define("GENERAL_WIDTH", get_option('embeddedvideo_width'));

/***********************/

// format definitions
define("YOUTUBE_RATIO", 14/17);
define("YOUTUBE_HEIGHT", floor(GENERAL_WIDTH*YOUTUBE_RATIO));
define("GOOGLE_RATIO", 14/17);
define("GOOGLE_HEIGHT", floor(GENERAL_WIDTH*GOOGLE_RATIO));
define("MYVIDEO_RATIO", 367/425);
define("MYVIDEO_HEIGHT", floor(GENERAL_WIDTH*MYVIDEO_RATIO));
define("CLIPFISH_RATIO", 95/116);
define("CLIPFISH_HEIGHT", floor(GENERAL_WIDTH*CLIPFISH_RATIO));
define("SEVENLOAD_RATIO", 313/380);
define("SEVENLOAD_HEIGHT", floor(GENERAL_WIDTH*SEVENLOAD_RATIO));
define("REVVER_RATIO", 49/60);
define("REVVER_HEIGHT", floor(GENERAL_WIDTH*REVVER_RATIO));
define("METACAFE_RATIO", 69/80);
define("METACAFE_HEIGHT", floor(GENERAL_WIDTH*METACAFE_RATIO));
define("YAHOO_RATIO", 14/17);
define("YAHOO_HEIGHT", floor(GENERAL_WIDTH*YAHOO_RATIO));
define("IFILM_RATIO", 365/448);
define("IFILM_HEIGHT", floor(GENERAL_WIDTH*IFILM_RATIO));
define("MYSPACE_RATIO", 173/215);
define("MYSPACE_HEIGHT", floor(GENERAL_WIDTH*MYSPACE_RATIO));
define("BRIGHTCOVE_RATIO", 206/243);
define("BRIGHTCOVE_HEIGHT", floor(GENERAL_WIDTH*BRIGHTCOVE_RATIO));
define("QUICKTIME_RATIO", 3/4);
define("QUICKTIME_HEIGHT", floor(GENERAL_WIDTH*QUICKTIME_RATIO));
define("VIDEO_RATIO", 3/4);
define("VIDEO_HEIGHT", floor(GENERAL_WIDTH*VIDEO_RATIO));
define("ANIBOOM_RATIO", 93/112);
define("ANIBOOM_HEIGHT", floor(GENERAL_WIDTH*ANIBOOM_RATIO));
define("FLASHPLAYER_RATIO", 93/112);
define("FLASHPLAYER_HEIGHT", floor(GENERAL_WIDTH*FLASHPLAYER_RATIO));
define("VIMEO_RATIO", 3/4);
define("VIMEO_HEIGHT", floor(GENERAL_WIDTH*VIMEO_RATIO));
define("GUBA_RATIO", 72/75);
define("GUBA_HEIGHT", floor(GENERAL_WIDTH*GUBA_RATIO));
define("DAILYMOTION_RATIO", 334/425);
define("DAILYMOTION_HEIGHT", floor(GENERAL_WIDTH*DAILYMOTION_RATIO));
define("GARAGE_RATIO", 289/430);
define("GARAGE_HEIGHT", floor(GENERAL_WIDTH*GARAGE_RATIO));
define("GAMEVIDEO_RATIO", 3/4);
define("GAMEVIDEO_HEIGHT", floor(GENERAL_WIDTH*GAMEVIDEO_RATIO));

// object targets and links
define("YOUTUBE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.youtube.com/v/###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".YOUTUBE_HEIGHT."\"><param name=\"movie\" value=\"http://www.youtube.com/v/###VID###\" /><param name=\"autostart\" value=\"true\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("YOUTUBE_LINK", "<a title=\"YouTube\" href=\"http://www.youtube.com/watch?v=###VID###\">YouTube ###TXT######THING###</a>");
define("GOOGLE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://video.google.com/googleplayer.swf?docId=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".GOOGLE_HEIGHT."\"><param name=\"movie\" value=\"http://video.google.com/googleplayer.swf?docId=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("GOOGLE_LINK", "<a title=\"Google Video\" href=\"http://video.google.com/videoplay?docid=###VID###\">Google ###TXT######THING###</a>");
define("MYVIDEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.myvideo.de/movie/###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".MYVIDEO_HEIGHT."\"><param name=\"movie\" value=\"http://www.myvideo.de/movie/###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("MYVIDEO_LINK", "<a title=\"MyVideo\" href=\"http://www.myvideo.de/watch/###VID###\">MyVideo ###TXT######THING###</a>");
define("CLIPFISH_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.clipfish.de/videoplayer.swf?as=0&amp;videoid=###VID###&amp;r=1\" width=\"".GENERAL_WIDTH."\" height=\"".CLIPFISH_HEIGHT."\"><param name=\"movie\" value=\"http://www.clipfish.de/videoplayer.swf?as=0&amp;videoid=###VID###&amp;r=1\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("CLIPFISH_LINK", "<a title=\"Clipfish\" href=\"http://www.clipfish.de/player.php?videoid=###VID###\">Clipfish ###TXT######THING###</a>");
define("SEVENLOAD_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://page.sevenload.com/swf/player.swf?id=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".SEVENLOAD_HEIGHT."\"><param name=\"movie\" value=\"http://page.sevenload.com/swf/player.swf?id=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("SEVENLOAD_LINK", "<a title=\"Sevenload\" href=\"http://sevenload.de/videos/###VID###\">Sevenload ###TXT######THING###</a>");
define("REVVER_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://flash.revver.com/player/1.0/player.swf?mediaId=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".REVVER_HEIGHT."\"><param name=\"movie\" value=\"http://flash.revver.com/player/1.0/player.swf?mediaId=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("REVVER_LINK", "<a title=\"Revver\" href=\"http://one.revver.com/watch/###VID###\">Revver ###TXT######THING###</a>");
define("METACAFE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.metacafe.com/fplayer/###VID###.swf\" width=\"".GENERAL_WIDTH."\" height=\"".METACAFE_HEIGHT."\"><param name=\"movie\" value=\"http://www.metacafe.com/fplayer/###VID###.swf\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("METACAFE_LINK", "<a title=\"Metacaf&eacute;\" href=\"http://www.metacafe.com/watch/###VID###\">Metacaf&eacute; ###TXT######THING###</a>");
define("YAHOO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://us.i1.yimg.com/cosmos.bcst.yahoo.com/player/media/swf/FLVVideoSolo.swf?id=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".YAHOO_HEIGHT."\"><param name=\"movie\" value=\"http://us.i1.yimg.com/cosmos.bcst.yahoo.com/player/media/swf/FLVVideoSolo.swf?id=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("YAHOO_LINK", "<a title=\"Yahoo! Video\" href=\"http://video.yahoo.com/video/play?vid=###YAHOO###.###VID###\">Yahoo! ###TXT######THING###</a>");
define("IFILM_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.ifilm.com/efp?flvbaseclip=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".IFILM_HEIGHT."\"><param name=\"movie\" value=\"http://www.ifilm.com/efp?flvbaseclip=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("IFILM_LINK", "<a title=\"ifilm\" href=\"http://www.ifilm.com/video/###VID###\">ifilm ###TXT######THING###</a>");
define("MYSPACE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://lads.myspace.com/videos/vplayer.swf?m=###VID###&amp;type=video\" width=\"".GENERAL_WIDTH."\" height=\"".MYSPACE_HEIGHT."\"><param name=\"movie\" value=\"http://lads.myspace.com/videos/vplayer.swf?m=###VID###&amp;type=video\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("MYSPACE_LINK", "<a title=\"MySpace Video\" href=\"http://vids.myspace.com/index.cfm?fuseaction=vids.individual&amp;videoid=###VID###\">MySpace ###TXT######THING###</a>");
define("BRIGHTCOVE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://admin.brightcove.com/destination/player/player.swf?initVideoId=###VID###&amp;servicesURL=http://services.brightcove.com/services&amp;viewerSecureGatewayURL=https://services.brightcove.com/services/amfgateway&amp;cdnURL=http://admin.brightcove.com&amp;autoStart=false\" width=\"".GENERAL_WIDTH."\" height=\"".BRIGHTCOVE_HEIGHT."\"><param name=\"movie\" value=\"http://admin.brightcove.com/destination/player/player.swf?initVideoId=###VID###&amp;servicesURL=http://services.brightcove.com/services&amp;viewerSecureGatewayURL=https://services.brightcove.com/services/amfgateway&amp;cdnURL=http://admin.brightcove.com&amp;autoStart=false\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("BRIGHTCOVE_LINK", "<a title=\"brightcove\" href=\"http://www.brightcove.com/title.jsp?title=###VID###\">brightcove ###TXT######THING###</a>");
define("ANIBOOM_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://api.aniboom.com/embedded.swf?videoar=###VID###&amp;allowScriptAccess=sameDomain&amp;quality=high\" width=\"".GENERAL_WIDTH."\" height=\"".ANIBOOM_HEIGHT."\"><param name=\"movie\" value=\"http://api.aniboom.com/embedded.swf?videoar=###VID###&amp;allowScriptAccess=sameDomain&amp;quality=high\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("ANIBOOM_LINK", "<a title=\"aniBOOM\" href=\"http://www.aniboom.com/Player.aspx?v=###VID###\">aniBOOM ###TXT######THING###</a>");
define("VIMEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.vimeo.com/moogaloop.swf?clip_id=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".VIMEO_HEIGHT."\"><param name=\"movie\" value=\"http://www.vimeo.com/moogaloop.swf?clip_id=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("VIMEO_LINK", "<a title=\"vimeo\" href=\"http://www.vimeo.com/clip:###VID###\">vimeo ###TXT######THING###</a>");
define("GUBA_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.guba.com/f/root.swf?video_url=http://free.guba.com/uploaditem/###VID###/flash.flv&amp;isEmbeddedPlayer=true\" width=\"".GENERAL_WIDTH."\" height=\"".GUBA_HEIGHT."\"><param name=\"movie\" value=\"http://www.guba.com/f/root.swf?video_url=http://free.guba.com/uploaditem/###VID###/flash.flv&amp;isEmbeddedPlayer=true\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("GUBA_LINK", "<a title=\"GUBA\" href=\"http://www.guba.com/watch/###VID###\">GUBA ###TXT######THING###</a>");
define("DAILYMOTION_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.dailymotion.com/swf/###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".DAILYMOTION_HEIGHT."\"><param name=\"movie\" value=\"http://www.dailymotion.com/swf/###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("GARAGE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.garagetv.be/v/###VID###/v.aspx\" width=\"".GENERAL_WIDTH."\" height=\"".GARAGE_HEIGHT."\"><param name=\"movie\" value=\"http://www.garagetv.be/v/###VID###/v.aspx\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("GAMEVIDEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://gamevideos.com:80/swf/gamevideos11.swf?embedded=1&amp;autoplay=0&amp;src=http://gamevideos.com:80/video/videoListXML%3Fid%3D###VID###%26adPlay%3Dfalse\" width=\"".GENERAL_WIDTH."\" height=\"".GAMEVIDEO_HEIGHT."\"><param name=\"movie\" value=\"http://gamevideos.com:80/swf/gamevideos11.swf?embedded=1&fullscreen=1&amp;autoplay=0&amp;src=http://gamevideos.com:80/video/videoListXML%3Fid%3D###VID###%26adPlay%3Dfalse\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("GAMEVIDEO_LINK", "<a title=\"GameVideos\" href=\"http://gamevideos.com/video/id/###VID###\">GameVideos ###TXT######THING###</a>");

define("QUICKTIME_TARGET", "<object classid=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" codebase=\"http://www.apple.com/qtactivex/qtplugin.cab\" width=\"".GENERAL_WIDTH."\" height=\"".QUICKTIME_HEIGHT."\"><param name=\"src\" value=\"".get_option('siteurl')."###VID###\" /><param name=\"autoplay\" value=\"false\" /><param name=\"pluginspage\" value=\"http://www.apple.com/quicktime/download/\" /><param name=\"controller\" value=\"true\" /><!--[if !IE]> <--><object data=\"".get_option('siteurl')."###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".QUICKTIME_HEIGHT."\" type=\"video/quicktime\"><param name=\"pluginurl\" value=\"http://www.apple.com/quicktime/download/\" /><param name=\"controller\" value=\"true\" /><param name=\"autoplay\" value=\"false\" /></object><!--> <![endif]--></object><br />");
define("VIDEO_TARGET", "<object classid=\"clsid:22D6f312-B0F6-11D0-94AB-0080C74C7E95\" codebase=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112\" width=\"".GENERAL_WIDTH."\" height=\"".VIDEO_HEIGHT."\" type=\"application/x-oleobject\"><param name=\"filename\" value=\"".get_option('siteurl')."###VID###\" /><param name=\"autostart\" value=\"false\" /><param name=\"showcontrols\" value=\"true\" /><!--[if !IE]> <--><object data=\"".get_option('siteurl')."###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".VIDEO_HEIGHT."\" type=\"application/x-mplayer2\"><param name=\"pluginurl\" value=\"http://www.microsoft.com/Windows/MediaPlayer/\" /><param name=\"ShowControls\" value=\"true\" /><param name=\"ShowStatusBar\" value=\"true\" /><param name=\"ShowDisplay\" value=\"true\" /><param name=\"Autostart\" value=\"0\" /></object><!--> <![endif]--></object><br />");
define("FLASHPLAYER_TARGET", "<object data=\"".get_option('siteurl')."/wp-content/plugins/embedded-video/flash_flv_player/flvplayer.swf\" type=\"application/x-shockwave-flash\" height=\"".FLASHPLAYER_HEIGHT."\" width=\"".GENERAL_WIDTH."\"><param value=\"#FFFFFF\" name=\"bgcolor\"><param value=\"file=".get_option('siteurl')."###VID###&amp;showdigits=true&amp;autostart=false&amp;overstretch=true&amp;showfsbutton=false\" name=\"flashvars\"><param name=\"wmode\" value=\"transparent\" /></object><br />");
define("VIDEO_LINK", "<a title=\"Video File\" href=\"".get_option('siteurl')."###VID###\">Download Video</a>");

// regular expressions
define("REGEXP_1", "/\[(google|youtube|myvideo|clipfish|sevenload|revver|metacafe|yahoo|ifilm|myspace|brightcove|aniboom|vimeo|guba|dailymotion|garagetv|gamevideo|local) ([[:graph:]]+) (nolink)\]/");
define("REGEXP_2", "/\[(google|youtube|myvideo|clipfish|sevenload|revver|metacafe|yahoo|ifilm|myspace|brightcove|aniboom|vimeo|guba|dailymotion|garagetv|gamevideo|local) ([[:graph:]]+) ([[:print:]]+)\]/");
define("REGEXP_3", "/\[(google|youtube|myvideo|clipfish|sevenload|revver|metacafe|yahoo|ifilm|myspace|brightcove|aniboom|vimeo|guba|dailymotion|garagetv|gamevideo|local) ([[:graph:]]+)\]/");

// logic
function embeddedvideo_plugin_callback($match) {
	$output = '';
	// insert plugin link
	if ((!is_feed())&&('true' == get_option('embeddedvideo_pluginlink'))) $output .= '<small>embedded by <a href="http://www.jovelstefan.de/embedded-video/" title="Plugin Page"><em>WP Embedded Video</em></a></small><br />';

	// insert video if not a feed
	if ( !is_feed() ) {
		switch ($match[1]) {
			case "youtube": $output .= YOUTUBE_TARGET; break;
			case "google": $output .= GOOGLE_TARGET; break;
			case "myvideo": $output .= MYVIDEO_TARGET; break;
			case "clipfish": $output .= CLIPFISH_TARGET; break;
			case "sevenload": $output .= SEVENLOAD_TARGET; break;
			case "revver": $output .= REVVER_TARGET; break;
			case "metacafe": $output .= METACAFE_TARGET; break;
			case "yahoo": $output .= YAHOO_TARGET; break;
			case "ifilm": $output .= IFILM_TARGET; break;
			case "myspace": $output .= MYSPACE_TARGET; break;
			case "brightcove": $output .= BRIGHTCOVE_TARGET; break;
			case "aniboom": $output .= ANIBOOM_TARGET; break;
			case "vimeo": $output .= VIMEO_TARGET; break;
			case "guba": $output .= GUBA_TARGET; break;
			case "gamevideo": $output .= GAMEVIDEO_TARGET; break;
			case "dailymotion": $output .= DAILYMOTION_TARGET; $match[3] = "nolink"; break;
			case "garagetv": $output .= GARAGE_TARGET; $match[3] = "nolink"; break;
			case "local":
				if (preg_match("%([[:print:]]+).(mov|qt)$%", $match[2])) { $output .= QUICKTIME_TARGET; break; }
				elseif (preg_match("%([[:print:]]+).(wmv|mpg|mpeg|mpe|asf|asx|wax|wmv|wmx|avi)$%", $match[2])) { $output .= VIDEO_TARGET; break; }
				elseif (preg_match("%([[:print:]]+).(swf|flv)$%", $match[2])) { $output .= FLASHPLAYER_TARGET; break; }
			default: break;
		}
	} else {
		// if a feed, overwrite nolink option
		$match[3] = "Link";
	}
	// if shownolink option false or if feed, show link
	if ('false' == get_option('embeddedvideo_shownolink')||is_feed()) {

	if ($match[3] != "nolink") {
		if ( is_feed() ) $output .= '<p>';
		$ev_small = get_option('embeddedvideo_small');
		if ('true' == $ev_small) $output .= "<small>";
		switch ($match[1]) {
			case "youtube": $output .= YOUTUBE_LINK; break;
			case "google": $output .= GOOGLE_LINK; break;
			case "myvideo": $output .= MYVIDEO_LINK; break;
			case "clipfish": $output .= CLIPFISH_LINK; break;
			case "sevenload": $output .= SEVENLOAD_LINK; break;
			case "revver": $output .= REVVER_LINK; break;
			case "metacafe": $output .= METACAFE_LINK; break;
			case "yahoo": $output .= YAHOO_LINK; break;
			case "ifilm": $output .= IFILM_LINK; break;
			case "myspace": $output .= MYSPACE_LINK; break;
			case "brightcove": $output .= BRIGHTCOVE_LINK; break;
			case "aniboom": $output .= ANIBOOM_LINK; break;
			case "vimeo": $output .= VIMEO_LINK; break;
			case "guba": $output .= GUBA_LINK; break;
			case "gamevideo": $output .= GAMEVIDEO_LINK; break;
			case "dailymotion": $output.= 'Go to the blog entry to see the video!'; break;
			case "garagetv": $output.= 'Go to the blog entry to see the video!'; break;
			case "local": $output .= VIDEO_LINK; break;
			default: break;
		}
		if ('true' == $ev_small) $output .= "</small>";
		if ( is_feed() ) $output .= '</p>';
	}
	}

	// postprocessing
	// first replace linktext
	$output = str_replace("###TXT###", LINKTEXT, $output);
	// special handling of Yahoo! Video IDs
	if ($match[1] == "yahoo") {
		$temp = explode(".", $match[2]);
		$match[2] = $temp[1];
		$output = str_replace("###YAHOO###", $temp[0], $output);
	}
	// replace video IDs and text
	$output = str_replace("###VID###", $match[2], $output);
	$output = str_replace("###THING###", $match[3], $output);
	// add HTML comment
	$output .= "\n<!-- generated by WordPress plugin Embedded Video with Link -->\n";
	return ($output);
}

// actual plugin function
function embeddedvideo_plugin($content) {
	$output = preg_replace_callback(REGEXP_1, 'embeddedvideo_plugin_callback', $content);
    $output = preg_replace_callback(REGEXP_2, 'embeddedvideo_plugin_callback', $output);
    $output = preg_replace_callback(REGEXP_3, 'embeddedvideo_plugin_callback', $output);
	return ($output);
}

// required filters
add_filter('the_content', 'embeddedvideo_plugin');
add_filter('comment_text', 'embeddedvideo_plugin');

//build admin interface
function embeddedvideo_option_page() {

global $wpdb, $table_prefix;

	if ( isset($_POST['embeddedvideo_prefix']) ) {

		$errs = array();

		$temp = stripslashes($_POST['embeddedvideo_prefix']);
		$ev_prefix = wp_kses($temp, array());

		update_option('embeddedvideo_prefix', $ev_prefix);

		if (!empty($_POST['embeddedvideo_space'])) {
			update_option('embeddedvideo_space', "true");
		} else {
			update_option('embeddedvideo_space', "false");
		}

		if (!empty($_POST['embeddedvideo_small'])) {
			update_option('embeddedvideo_small', "true");
		} else {
			update_option('embeddedvideo_small', "false");
		}

		if (!empty($_POST['embeddedvideo_pluginlink'])) {
			update_option('embeddedvideo_pluginlink', "true");
		} else {
			update_option('embeddedvideo_pluginlink', "false");
		}

		if (!empty($_POST['embeddedvideo_shownolink'])) {
			update_option('embeddedvideo_shownolink', "true");
		} else {
			update_option('embeddedvideo_shownolink', "false");
		}

		$ev_width = $_POST['embeddedvideo_width'];
		if ($ev_width == "") $errs[] = "Object width must be set!";
		elseif (($ev_width>800)||($ev_width<250)||(!preg_match("/^[0-9]{3}$/", $ev_width))) $errs[] = "Object width must be a number between 250 and 800!";
		else update_option('embeddedvideo_width', $ev_width);

		if ( empty($errs) ) {
			echo '<div id="message" class="updated fade"><p>Options updated!</p></div>';
		} else {
			echo '<div id="message" class="error fade"><ul>';
			foreach ( $errs as $name => $msg ) {
				echo '<li>'.wptexturize($msg).'</li>';
			}
			echo '</ul></div>';
		}
	}

	if ('true' == get_option('embeddedvideo_space')) {
		$ev_space = 'checked="true"';
	} else {
		$ev_space = '';
	}

	if ('true' == get_option('embeddedvideo_small')) {
		$ev_small = 'checked="true"';
	} else {
		$ev_small = '';
	}

	if ('true' == get_option('embeddedvideo_pluginlink')) {
		$ev_pluginlink = 'checked="true"';
	} else {
		$ev_pluginlink = '';
	}

	if ('true' == get_option('embeddedvideo_shownolink')) {
		$ev_shownolink = 'checked="true"';
	} else {
		$ev_shownolink = '';
	}

	?>

	<div style="width:75%;" class="wrap" id="embeddedvideo_options_panel">
	<h2>Embedded Video</h2>

	<p><strong>Edit the prefix of the linktext and the width of the embedded flash object!</strong><br />For detailed information see the <a href="http://www.jovelstefan.de/embedded-video/" title="Plugin Page">plugin page</a>.</p>

	<p><i>Examples for the prefix settings:</i><br />
	If you type in <strong>[youtube abcd12345 fantastic video]</strong> and you choose the prefix <strong>"- Link to"</strong> with a following space, the linktext will be <strong>"YouTube - Link to fantastic video"</strong>.<br /><br />
	If you type in <strong>[sevenload abcd12345 dings]</strong> and you choose the prefix <strong>"Direkt"</strong> without a following space, the linktext will be <strong>"Sevenload Direktdings"</strong>.</p>
	<div class="wrap">
		<form method="post">
			<div>
			    <label for="embeddedvideo_shownolink" style="cursor: pointer;"><input type="checkbox" name="embeddedvideo_shownolink" id="embeddedvideo_shownolink" value="<?php echo get_option('embeddedvideo_shownolink') ?>" <?php echo $ev_shownolink; ?> /> Never show the video link (exception: feeds)</label><br />
				Prefix: <input type="text" value="<?php echo get_option('embeddedvideo_prefix') ?>" name="embeddedvideo_prefix" id="embeddedvideo_prefix" /><br />
				<label for="embeddedvideo_space" style="cursor: pointer;"><input type="checkbox" name="embeddedvideo_space" id="embeddedvideo_space" value="<?php echo get_option('embeddedvideo_space') ?>" <?php echo $ev_space; ?> /> Following space character</label><br />
				<label for="embeddedvideo_small" style="cursor: pointer;"><input type="checkbox" name="embeddedvideo_small" id="embeddedvideo_small" value="<?php echo get_option('embeddedvideo_small') ?>" <?php echo $ev_small; ?> /> Use smaller font size for link</label><br />
				Video object width (250-800):<input type="text" value="<?php echo get_option('embeddedvideo_width') ?>" name="embeddedvideo_width" id="embeddedvideo_width" size="5" maxlength="3" /><br />
				<label for="embeddedvideo_pluginlink" style="cursor: pointer;"><input type="checkbox" name="embeddedvideo_pluginlink" id="embeddedvideo_pluginlink" value="<?php echo get_option('embeddedvideo_pluginlink') ?>" <?php echo $ev_pluginlink; ?> /> Show link to plugin page</label><br /><br />
				<input type="submit" id="embeddedvideo_update_options" value="Save settings &raquo;" />
			</div>
		</form>
	</div>
	<p>The following video portals are currently supported:<br/>
	YouTube, Google Video, dailymotion, MyVideo, Clipfish, Sevenload, Revver, Metacaf&eacute;, Yahoo! Video, ifilm, MySpace Video, Brightcove, aniBOOM, vimeo, GUBA, Garage TV, GameVideos</p>

	<h3>Preview</h3>
	<div class="wrap"><p>Your current settings produce the following output:</p>
	<p><?php if ('true' == get_option('embeddedvideo_pluginlink')) echo '<small>embedded by <a href="http://www.jovelstefan.de/embedded-video/" title="Plugin Page"><em>WP Embedded Video</em></a></small><br />'; ?>
	<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/nglMDkUbRSk" width="<?php echo get_option('embeddedvideo_width'); ?>" height="<?php echo floor(get_option('embeddedvideo_width')*14/17); ?>"><param name="movie" value="http://www.youtube.com/v/nglMDkUbRSk" /></object><br />
	<?php $ev_issmall = get_option('embeddedvideo_small'); if ('true' == $ev_issmall) echo "<small>"; ?>
	<a title="YouTube" href="http://www.youtube.com/watch?v=nglMDkUbRSk">YouTube <?php echo get_option('embeddedvideo_prefix'); if ('true' == get_option('embeddedvideo_space')) echo "&nbsp;"; ?>blablabla</a><?php if ('true' == $ev_issmall) echo "</small>"; ?>
	</p></div>

	<p>Check the <a href="http://www.jovelstefan.de/embedded-video/" title="Embedded Video Plugin Page">plugin page</a> for updates regularly!<br />
		Video icon by <a href="http://famfamfam.com" title="famfamfam">famfamfam</a>!
	</p>

	<?php
}

function embeddedvideo_add_options_panel() {
	add_options_page('Embedded Video', 'Embedded Video', 1, 'embeddedvideo_options_page', 'embeddedvideo_option_page');
}
add_action('admin_menu', 'embeddedvideo_add_options_panel');

/***************************************
 Editor QuickButton
 Inserts a Quickbutton into Editor
 using buttonsnap (http://redalt.com)
***************************************/

require_once("buttonsnap.php");
add_action('init', 'embeddedvideo_buttons');
add_action('edit_form_advanced', 'embeddedvideo_quicktag_js');
add_action('edit_page_form', 'embeddedvideo_quicktag_js');

function embeddedvideo_button($buttons) {
	array_push($buttons, "embeddedvideo");
	return $buttons;
}

function embeddedvideo_button_plugin($plugins) {
	array_push($plugins, "-embeddedvideo");
	return $plugins;
}

function embeddedvideo_button_script() {
	$pluginURL = get_option('siteurl')."/wp-content/plugins/embedded-video/";
	echo 'tinyMCE.loadPlugin("embeddedvideo", "'.$pluginURL.'");'."\n";
	return;
}

function embeddedvideo_buttons() {
	global $wp_db_version;
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
	if ( 3664 <= $wp_db_version && 'true' == get_user_option('rich_editing') ) {
		add_filter('mce_plugins', 'embeddedvideo_button_plugin', 0);
		add_filter('mce_buttons', 'embeddedvideo_button', 0);
		add_action('tinymce_before_init', 'embeddedvideo_button_script');
	} else {
	    $post = (int) $_GET['post'];
		$base = buttonsnap_dirname(__FILE__);
		buttonsnap_jsbutton($base . '/embeddedvideo-button.png', 'Embed Video', "embeddedvideo_insert($post);");
	}
}

function embeddedvideo_quicktag_js() {
	$base = buttonsnap_dirname(__FILE__);
	echo "<script type='text/javascript' src='$base/embedded-video.js'></script>\n";
}

?>