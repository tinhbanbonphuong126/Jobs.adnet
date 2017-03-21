<?php
function format_date($str, $format = 'Y/m/d'){
	return date($format, strtotime($str));
}

