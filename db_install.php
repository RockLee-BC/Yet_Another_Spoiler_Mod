<?php
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');
db_extend('packages');

// Notify user that they must remove the Expandable/Collapsable mod series before installation:
if (file_exists($sourcedir . '/Subs-BBCode-Changelog.php'))
	fatal_error('<b>Error:</b> Remove the &quot;Expandable &amp; Collapsable Changelog BBCode&quot; mod first!');
if (file_exists($sourcedir . '/Subs-BBCode-OffTopic.php'))
	fatal_error('<b>Error:</b> Remove the &quot;Expandable &amp; Collapsable OffTopic BBCode&quot; mod first!');
if (file_exists($sourcedir . '/Subs-BBCode-Spoiler.php'))
	fatal_error('<b>Error:</b> Remove the &quot;Expandable &amp; Collapsable Spoiler BBCode&quot; mod first!');

// Build the bbcodes table:
$columns = array(
	array(
		'name' => 'id_msg',
		'type' => 'int',
		'size' => 8,
		'unsigned' => true,
	),
	array(
		'name' => 'id_member',
		'type' => 'int',
		'size' => 8,
		'unsigned' => true,
	),
	array(
		'name' => 'id_spoiler',
		'type' => 'int',
		'size' => 8,
		'unsigned' => true,
	),
	array(
		'name' => 'time',
		'type' => 'int',
		'size' => 8,
		'unsigned' => true,
	),
);
$smcFunc['db_create_table']('{db_prefix}log_viewed_tag', $columns, array(), array(), 'update_remove');

// Echo that we are done if necessary:
if (SMF == 'SSI')
	echo 'DB Changes should be made now...';
?>