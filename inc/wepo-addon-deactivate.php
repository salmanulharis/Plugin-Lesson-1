<?php
/**
 * @package WEPOAddon
*/

class WepoAddonDeactivate
{
	public static function deactivate(){
		flush_rewrite_rules;
	}
}