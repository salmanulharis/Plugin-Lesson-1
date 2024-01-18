<?php
/**
 * @package WEPOAddon
*/

class WepoAddonActivate
{
	public static function activate(){
		echo 'test';
		flush_rewrite_rules;
	}
}