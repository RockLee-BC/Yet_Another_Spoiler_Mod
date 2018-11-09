<?php
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');
db_extend('packages');

// Build the bbcodes table:
$columns = array(
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