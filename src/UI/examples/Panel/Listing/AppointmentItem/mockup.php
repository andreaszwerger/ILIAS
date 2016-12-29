<?php
/**
 * Mockup
 */
function mockup() {
	//Loading factories
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();
	$image = $f->image()->standard(
			"src/UI/examples/Panel/Listing/AppointmentItem/item.png",
			"");
	return $renderer->render($image);
}
