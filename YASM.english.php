<?php
/**********************************************************************************
* YASM.english.php
***********************************************************************************
* This mod is licensed under the 2-clause BSD License, which can be found here:
*	http://opensource.org/licenses/BSD-2-Clause
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
**********************************************************************************/

// General use strings:
$txt['spoiler'] = 'Spoiler';
$txt['changelog'] = 'Changelog';
$txt['offtopic'] = 'Off-Topic';
$txt['YASM_show'] = 'Show';
$txt['YASM_hide'] = 'Hide';
$txt['YASM_viewed_by'] = 'Viewed by';
$txt['YASM_last_viewed'] = 'Latest %d members viewed';

// Admin strings:
$txt['YASM_title'] = 'Yet Another Spoiler Mod';

// Strings required for each bbcode supported by this mod:
foreach (YASM_tags() as $tag)
{
	$txt['YASM_' . $tag . '_style'] = $txt[$tag] . ' style to use:';
	$txt['YASM_' . $tag . '_show'] = 'Replace button text &quot;' . $txt['YASM_show'] . '&quot; with:<div class="smalltext"><strong>NOTE:</strong>  Leave empty to default to language strings!</div>';
	$txt['YASM_' . $tag . '_hide'] = 'Replace button text &quot;' . $txt['YASM_hide'] . '&quot; with:<div class="smalltext"><strong>NOTE:</strong>  Leave empty to default to language strings!</div>';
	$txt['YASM_' . $tag . '_text'] = 'Replace &quot;' . $txt[$tag] . '&quot; with in header:<div class="smalltext"><strong>NOTE:</strong>  Leave empty to default to language strings!</div>';
	$txt['YASM_' . $tag . '_expanded'] = 'Default to expanded status?';
	$txt['YASM_' . $tag . '_no_guests'] = 'Disable '. $txt[$tag] . ' for guests globally?';
	$txt['YASM_' . $tag . '_no_border'] = 'Disable line beneath ' . $txt[$tag] . ' text?';
	$txt['YASM_' . $tag . '_no_guest_html'] = '[ You must <a href="' . $scripturl . '?action=login">login</a> or <a href="' . $scripturl . '?action=register">register</a> to view this ' . $txt[$tag] . '! ]';
}

// Style names using the following format:
//   CSS Class Name (in CSS file) => CSS Style Name (visible to user)
$txt['YASM_styles'] = array(
	'YASM_original' => 'Original',
	'YASM_wellwisher' => 'WellWisher',
);

?>