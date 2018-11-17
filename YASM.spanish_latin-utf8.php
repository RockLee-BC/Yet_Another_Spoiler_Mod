<?php
/**********************************************************************************
* YASM.spanish_latin-utf8.php
***********************************************************************************
* This mod is licensed under the 2-clause BSD License, which can be found here:
*	http://opensource.org/licenses/BSD-2-Clause
***********************************************************************************
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
***********************************************************************************
* Spanish translation (https://www.bombercode.net) Copyright 2014-2018            *
**********************************************************************************/
// General use strings:
$txt['spoiler'] = 'Spoiler';
$txt['changelog'] = 'Registro de cambios';
$txt['offtopic'] = 'Off-Topic';
$txt['YASM_show'] = 'Mostrar';
$txt['YASM_hide'] = 'Ocultar';
$txt['YASM_viewed_by'] = 'Visto por';
$txt['YASM_last_viewed'] = 'Últimos %d miembros vistos';
// Style names using the following format:
//   CSS Class Name (in CSS file) => CSS Style Name (visible to user)
$txt['YASM_styles'] = array(
	'original' => 'Original',
	'wellwisher' => 'WellWisher',
);
// Admin strings:
$txt['YASM_title'] = 'Otro mod mas de Spoiler';
$txt['YASM_default'] = '<div class="smalltext"><strong>NOTA:</strong> No afecta a las etiquetas que especifican este texto!</div>';
$txt['YASM_strings'] = array(
	'style' => '{tag_name} estilo de uso:',
	'show' => 'Reemplazar el texto del botón &quot;{show}&quot; con:' . $txt['YASM_default'],
	'hide' => 'Reemplazar el texto del botón &quot;{hide}&quot; con:' . $txt['YASM_default'],
	'text' => 'Reemplazar &quot;{tag_name}&quot; header con:' . $txt['YASM_default'],
	'expanded' => '¿Predeterminado a estado expandido globalmente?<div class="smalltext"><strong>NOTA:</strong>  No afecta a las etiquetas que especifican estado expandido!</div>',
	'no_guests' => '¿Desactivar {tag_name} para invitados globalmente?<div class="smalltext"><strong>NOTA:</strong>  No afecta a las etiquetas que especifican el estado del invitado!</div>',
	'no_border' => 'Desactivar línea debajo {tag_name} del encabezado?',
	'show_log' => 'Mostrar qué miembros vieron el {tag_name}?',
	'limit_log' => '¿Número de miembros para mostrar que vieron el {tag_name}?<div class="smalltext"><strong>NOTA:</strong>  Establecer en <strong>0</strong> para mostrar a todos!</div>',
	'no_guest_html' => '[ Debes <a href="{scripturl}?action=login">logearte</a> o	<a href="{scripturl}?action=register">registrarte</a> para ver esto {tag_name}! ]',
);
?>
