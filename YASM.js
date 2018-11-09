/******************************************************************
/* Javascript for Yet Another Spoiler Mod
/*****************************************************************/
function YASM_toggle(element, log)
{
	// Hide or show the spoiler area & links of this bbcode:
	var div2 = element.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0];
	var hidden = (div2.style.display != '');
	div2.style.display = (hidden ? '' : 'none');
	var links = element.parentNode.getElementsByTagName('a');
	links[0].style.display = (!hidden ? '' : 'none');
	links[1].style.display = (hidden ? '' : 'none');

	// We need to log this user as having seen it, if the poster has requested it:
	YASM_log(log);
}

function YASM_log(log)
{
	if (log > 0)
	{
		var ajax =  new XMLHttpRequest();
		ajax.open('GET', smf_scripturl + '?action=YASM_log;id=' + log, true);
		ajax.onreadystatechange = function()
		{
			if (ajax.readyState == 4 && ajax.status == 200)
			{
			}
		}
		ajax.send();
	}
}