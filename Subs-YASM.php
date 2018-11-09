<?php
/**********************************************************************************
* Subs-YASM.php
***********************************************************************************
* This mod is licensed under the 2-clause BSD License, which can be found here:
*	http://opensource.org/licenses/BSD-2-Clause
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
**********************************************************************************/
if (!defined('SMF'))
	die('Hacking attempt...');

/**********************************************************************************
/* Hook that handles necessary CSS loading:
**********************************************************************************/
function YASM_Load()
{
	global $context, $settings;

	// Get our language strings!
	loadLanguage('YASM');

	// Include our CSS and JS in the header:
	$context['html_headers'] .= '
	<script type="text/javascript" src="' . $settings['default_theme_url'] . '/scripts/YASM.js?fin20"></script>
	<link rel="stylesheet" type="text/css" href="' . $settings['default_theme_url'] . '/css/YASM.css" />';

	// Include Font-Awesome in the header, only if not already present:
	if (strpos($context['html_headers'], 'font-awesome') === false)
		$context['html_headers'] .= '
	<!--FontAwesome-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">';
}

/**********************************************************************************
/* Functions that handle BBCode declarations and buttons:
**********************************************************************************/
function YASM_tags()
{
	return array('spoiler', 'changelog', 'offtopic');
}

function YASM_BBCode(&$bbc)
{
	global $txt, $modSettings, $user_info;

	// Gather up all the block-level bbcode tags for later:
	$disallowed = array();
	foreach ($bbc as $code)
		if (!empty($code['block_level']))
			$disallowed[] = $code['tag'];
	$disallowed = array_unique($disallowed);

	// Setup everything else we need for these bbcodes:
	$parameters = array(
		'text' => array('optional' => true),
		'quote' => array('optional' => true, 'quoted' => true),
		'show' => array('optional' => true),
		'hide' => array('optional' => true),
		'guests' => array('optional' => true, 'match' => '(y|yes|true|n|no|false)'),
		'expand' => array('optional' => true, 'match' => '(y|yes|true|n|no|false)'),
		'log' => array('optional' => true, 'match' => '(y|yes|true|n|no|false)'),
		'log_id' => array('optional' => true, 'match' => '(\d+)'),
	);
	$content_param = '{' . implode('}|{', array_keys($parameters)) . '}';
	$content_empty = str_repeat('|', count($parameters) - 1);

	// Define all of the tags here:
	foreach (YASM_tags() as $tag)
	{
		$bbc[] = array(
			'tag' => $tag,
			'type' => 'unparsed_content',
			'parameters' => $parameters,
			'content' => $content_param,
			'validate' => 'YASM_Validate',
			'disallow_children' => $disallowed,
			'block-level' => true,
		);
		$tmp = $bbc[] = array(
			'tag' => $tag,
			'type' => 'unparsed_content',
			'content' => $content_empty,
			'validate' => 'YASM_Validate',
			'disallow_children' => $disallowed,
			'block-level' => true,
		);
		$bbc[] = array(
			'tag' => $tag,
			'type' => 'unparsed_equals_content',
			'content' => $content_empty,
			'validate' => 'YASM_Validate_Equals',
			'disallow_children' => $disallowed,
			'block-level' => true,
		);
	}
}

function YASM_Buttons(&$buttons)
{
	global $txt;

	foreach (YASM_tags() as $tag)
	{
		$buttons[count($buttons) - 1][] = array(
			'image' => $tag,
			'code' => $tag,
			'description' => $txt[$tag],
			'before' => '[' . $tag . ']',
			'after' => '[/' . $tag . ']',
		);
	}
}

/**********************************************************************************
/* BBCode Validation functions:
**********************************************************************************/
function YASM_Validate_Equals(&$tag, &$data, &$disabled)
{
	$tag['content'] = $data[1] . $tag['content'];
	YASM_Validate($tag, $data[0], $disabled);
}

function YASM_Validate(&$tag, &$data, &$disabled)
{
	global $txt, $user_info, $modSettings, $smcFunc;

	// Are the contents empty?  Then don't show anything to the user:
	if (empty($data))
		return ($tag['content'] = '');

	// Parse the parameters given to us by the poster:
	$name = &$tag['tag'];
	list($text, $quote, $show, $hide, $guests, $expand,, $log) = explode('|', $tag['content']);

	// If guests aren't allowed to view, then tell the user to login or register:
	if ((!empty($modSettings['YASM_' . $name . '_no_guests']) || $guests == 'n' || $guests == 'no' || $guests == 'false') && !empty($user_info['is_guest']))
		$message = $txt['YASM_' . $name . '_no_guest_html'];
	// If the membergroup isn't allowed to view, then tell the user can't view:
	//elseif (!allowedTo('view_' . $name . '_tag'))
	//	$message = $txt['YASM_' . $name . '_no_guest_html'];
	else
	{
		// Parse the parameters given to us:
		$text = empty($text) ? (empty($modSettings['YASM_' . $name . '_text']) ? $txt[$name] : stripslashes($modSettings['YASM_' . $name . '_text'])) : $text;
		$show = empty($show) ? (empty($modSettings['YASM_' . $name . '_show']) ? $txt['YASM_show'] : stripslashes($modSettings['YASM_' . $name . '_show'])) : $show;
		$hide = empty($hide) ? (empty($modSettings['YASM_' . $name . '_hide']) ? $txt['YASM_hide'] : stripslashes($modSettings['YASM_' . $name . '_hide'])) : $hide;
		$expand = ($expand == 'y' || $expand == 'yes' || $expand == 'true' || !empty($modSettings['YASM_' . $name . '_expanded']));

		// Are we allowed to log users who viewed the contents?
		$limit = 0;
		if (!empty($log) && ($members = cache_get_data('YASM_viewed_log' . $log, 86400)) == NULL)
		{
			$members = YASM_Get_Members($log, 0, $limit);
			cache_put_data('YASM_viewed_log' . $log, $members, 86400);
		}
		$count = isset($members) ? count($members) : 0;
		$viewed = sprintf($txt[$limit <= $count ? 'YASM_viewed_by' : 'YASM_last_viewed'], min(max(1, $limit), $count));

		// We need to parse the contents so it is readable for the user:
		$data = parse_bbc($data);
	}

	// Build the string we are going to show the user.  The Easy-To-Read edition! :p
	$style = empty($modSettings['YASM_' . $name . '_style']) ? 'YASM_original' : $modSettings['YASM_' . $name . '_style'];
	$tag['content'] =
		'<div class="' . $style . '">' .
			'<div class="YASM_inner' . (empty($modSettings['YASM_' . $name . '_no_border']) ? ' YASM_border' : '') . '">' .
				'<span class="YASM_text">' . (!empty($message) ? $message : $text . '</span> ' .
				(!empty($quote) ? '<span class="YASM_quote">'. $quote . '</span> ' : '') .
				'<span class="YASM_links" onClick="YASM_toggle(this, ' . $log . '); return false;" />' .
					'<a href="#" onClick="return false;"' . ($expand ? ' style="display:none"' : '') . '>' . $show . '</a>' .
					'<a href="#" onClick="return false;"' . (!$expand ? ' style="display:none"' : '') . '>' . $hide . '</a>') .
				'</span>' .
			'</div>' .
			'<div class="YASM_content quotecontent">' .
				'<div'. ($expand && empty($message) ? '' : ' style="display: none') . ';">' .
					'$1' . (!empty($members) ?
					'<hr class="clear" />' .
					'<span class="YASM_log">' . $viewed . ': <span class="YASM_members">' . implode(', ', $members) . '</span></span>' : '') .
				'</div>' .
			'</div>' .
		'</div>';
}

/**********************************************************************************
/* YASM BBCode admin settings function:
**********************************************************************************/
function YASM_Admin(&$areas)
{
	$areas['config']['areas']['modsettings']['subsections']['YASM'] = array('YASM');
}

function YASM_Modify(&$actions)
{
	$actions['YASM'] = 'YASM_Settings';
}

function YASM_Settings($return_config = false)
{
	global $txt, $scripturl, $context, $settings, $sc, $modSettings;

	// Now, the settings....
	foreach (YASM_tags() as $id => $tag)
	{
		$config_vars[] = array('title', $tag);
		$config_vars[] = array('select', 'YASM_' . $tag . '_style', $txt['YASM_styles']);
		$config_vars[] = array('text', 'YASM_' . $tag .'_text');
		$config_vars[] = array('text', 'YASM_' . $tag .'_show');
		$config_vars[] = array('text', 'YASM_' . $tag .'_hide');
		$config_vars[] = array('check', 'YASM_' . $tag . '_expanded');
		$config_vars[] = array('check', 'YASM_' . $tag . '_no_guests');
		$config_vars[] = array('check', 'YASM_' . $tag . '_no_border');
	}

	if ($return_config)
		return $config_vars;

	$context['post_url'] = $scripturl . '?action=admin;area=modsettings;save;sa=YASM';
	$context['settings_title'] = $txt['YASM_title'];

	// Saving?
	if (isset($_GET['save']))
	{
		checkSession();
		foreach (YASM_tags() as $id => $tag)
		{
			$_POST['YASM_' . $tag . '_text'] = isset($_POST['YASM_' . $tag . '_text']) ? addslashes($_POST['YASM_' . $tag . '_text']) : '';
			$_POST['YASM_' . $tag . '_show'] = isset($_POST['YASM_' . $tag . '_show']) ? addslashes($_POST['YASM_' . $tag . '_show']) : '';
			$_POST['YASM_' . $tag . '_hide'] = isset($_POST['YASM_' . $tag . '_hide']) ? addslashes($_POST['YASM_' . $tag . '_hide']) : '';
		}
		saveDBSettings($config_vars);
		redirectexit('action=admin;area=modsettings;sa=YASM');
	}

	// Prepare the strings to be seen by the user for modification:
	foreach (YASM_tags() as $id => $tag)
	{
		if (!empty($modSettings['YASM_' . $tag . '_text']))
			$modSettings['YASM_' . $tag . '_text'] = stripslashes($modSettings['YASM_' . $tag . '_text']);
		if (!empty($modSettings['YASM_' . $tag . '_show']))
			$modSettings['YASM_' . $tag . '_show'] = stripslashes($modSettings['YASM_' . $tag . '_show']);
		if (!empty($modSettings['YASM_' . $tag . '_hide']))
			$modSettings['YASM_' . $tag . '_hide'] = stripslashes($modSettings['YASM_' . $tag . '_hide']);
	}
	prepareDBSettingContext($config_vars);
}

/**********************************************************************************
/* YASM "viewed spoiler" logging functions:
**********************************************************************************/
function YASM_Actions(&$actions)
{
	$actions['YASM_log'] = array('Subs-YASM.php', 'YASM_Insert_Member');
}

function YASM_Get_Members($log_id, $start = 0, $limit = 0)
{
	global $smcFunc, $scripturl;

	$members = array();
	$request = $smcFunc['db_query']('', '
		SELECT
			mem.id_member, mem.real_name, mg.online_color
		FROM {db_prefix}log_viewed_tag AS tag
			LEFT JOIN {db_prefix}members AS mem ON (mem.id_member = tag.id_member)
			LEFT JOIN {db_prefix}membergroups AS mg ON (mg.id_group = CASE WHEN mem.id_group = {int:reg_member_group} THEN mem.id_post_group ELSE mem.id_group END)
		WHERE tag.id_spoiler = {int:id_spoiler}
		ORDER BY tag.time DESC' . (max(0, $limit) > 0 ? '
		LIMIT {int:start}, {int:limit}' : ''),
		array(
			'id_spoiler' => $log_id,
			'reg_member_group' => 0,
			'start' => $start,
			'limit' => $limit,
		)
	);
	while ($row = $smcFunc['db_fetch_assoc']($request))
	{
		if (empty($row['id_member']))
			continue;
		if (!empty($row['online_color']))
			$members[$row['id_member']] = '<a href="' . $scripturl . '?action=profile;u=' . $row['id_member'] . '" style="color: ' . $row['online_color'] . ';">' . $row['real_name'] . '</a>';
		else
			$members[$row['id_member']] = '<a href="' . $scripturl . '?action=profile;u=' . $row['id_member'] . '">' . $row['real_name'] . '</a>';
	}
	$smcFunc['db_free_result']($request);
	return $members;
}

function YASM_Insert_Member($log_id = -1, $id_member = -1)
{
	global $smcFunc, $user_info;

	if (($check_id = $id_member) == -1)
	{
		// DIE if user is a guest or no log ID provided:
		$log_id = !empty($_GET['id']) ? $_GET['id'] : -1;
		if (!empty($user_info['is_guest']) || $log_id < 1)
			die;

		// DIE if the member is already on the list:
		$members = YASM_Get_Members($log_id);
		if (in_array($id_member = $user_info['id'], array_keys($members)))
			die;
	}

	// Insert user ID and spoiler ID into the table:
	$smcFunc['db_insert']('',
		'{db_prefix}log_viewed_tag',
		array('id_member' => 'int', 'id_spoiler' => 'int', 'time' => 'int'),
		array($id_member, $log_id, time()),
		array()
	);
	cache_put_data('YASM_viewed_log' . $log_id, NULL, 86400);

	// DIE if we were called as an action:
	if ($check_id == -1)
		die;
}

function YASM_Insert_Spoiler($log_id = -1)
{
	$request = $smcFunc['db_query']('', '
		SELECT MAX(id_spoiler)
		FROM {db_prefix}log_viewed_tag AS tag',
		array()
	);
	list($next) = $smcFunc['db_fetch_row']($request);
	$smcFunc['db_free_result']($request);
	YASM_Insert_Member($next += 1, 0);
	return $next;
}

/**********************************************************************************
/* Function which deletes viewed log for specified user:
**********************************************************************************/
function YASM_Delete_Member($id_member)
{
	global $smcFunc, $user_info;
	if (!empty($id_member))
	{
		$smcFunc['db_query']('', '
			DELETE FROM {db_prefix}log_viewed_tag
			WHERE tag.id_member = {int:id_member}',
			array(
				'id_member' => (int) $id_member
			)
		);
	}
}

?>