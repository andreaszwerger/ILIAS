<?php
function glyph_reset() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	return $renderer->render($f->symbol()->glyph()->reset("#"));
}