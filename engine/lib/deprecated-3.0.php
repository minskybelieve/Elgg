<?php

/**
 * Removes a config setting.
 *
 * @note Internal: These settings are stored in the dbprefix_config table and read
 * during system boot into $CONFIG.
 *
 * @param string $name The name of the field.
 *
 * @return bool Success or failure
 *
 * @see get_config()
 * @see set_config()
 *
 * @deprecated Use elgg_remove_config()
 */
function unset_config($name) {
	elgg_deprecated_notice(__FUNCTION__ . ' is deprecated. Use elgg_remove_config().', '3.0');
	return elgg_remove_config($name);
}

/**
 * Add or update a config setting.
 *
 * Plugin authors should use elgg_set_config().
 *
 * If the config name already exists, it will be updated to the new value.
 *
 * @internal These settings are stored in the dbprefix_config table and read
 * during system boot into $CONFIG.
 *
 * @internal The value is serialized so we maintain type information.
 *
 * @param string $name      The name of the configuration value
 * @param mixed  $value     Its value
 *
 * @return bool
 * @see unset_config()
 * @see get_config()
 * @access private
 *
 * @deprecated Use elgg_save_config()
 */
function set_config($name, $value) {
	elgg_deprecated_notice(__FUNCTION__ . ' is deprecated. Use elgg_save_config().', '3.0');
	return elgg_save_config($name, $value);
}

/**
 * Gets a configuration value
 *
 * Plugin authors should use elgg_get_config().
 *
 * @internal These settings are stored in the dbprefix_config table and read
 * during system boot into $CONFIG.
 *
 * @param string $name      The name of the config value
 *
 * @return mixed|null
 * @see set_config()
 * @see unset_config()
 * @access private
 *
 * @deprecated Use elgg_get_config()
 */
function get_config($name) {
	elgg_deprecated_notice(__FUNCTION__ . ' is deprecated. Use elgg_get_config().', '3.0');
	return elgg_get_config($name);
}

/**
 * Add an admin area section or child section.
 * This is a wrapper for elgg_register_menu_item().
 *
 * Used in conjuction with http://elgg.org/admin/section_id/child_section style
 * page handler. See the documentation at the top of this file for more details
 * on that.
 *
 * The text of the menu item is obtained from elgg_echo(admin:$parent_id:$menu_id)
 *
 * This function handles registering the parent if it has not been registered.
 *
 * @param string $section   The menu section to add to
 * @param string $menu_id   The unique ID of section
 * @param string $parent_id If a child section, the parent section id
 * @param int    $priority  The menu item priority
 *
 * @return bool
 * @since 1.8.0
 *
 * @deprecated Use elgg_remove_config()
 */
function elgg_register_admin_menu_item($section, $menu_id, $parent_id = null, $priority = 100) {
	elgg_deprecated_notice(__FUNCTION__ . ' is deprecated. Use elgg_register_menu_item().', '3.0');
	// make sure parent is registered
	if ($parent_id && !elgg_is_menu_item_registered('page', $parent_id)) {
		elgg_register_admin_menu_item($section, $parent_id);
	}

	// in the admin section parents never have links
	if ($parent_id) {
		$href = "admin/$parent_id/$menu_id";
	} else {
		$href = "admin/$menu_id";
	}

	$name = $menu_id;
	if ($parent_id) {
		$name = "$parent_id:$name";
	}

	return elgg_register_menu_item('page', [
		'name' => $name,
		'href' => $href,
		'text' => elgg_echo("admin:$name"),
		'context' => 'admin',
		'parent_name' => $parent_id,
		'priority' => $priority,
		'section' => $section
	]);
}

/**
 * Mark entities with a particular type and subtype as having access permissions
 * that can be changed independently from their parent entity
 *
 * @param string $type    The type - object, user, etc
 * @param string $subtype The subtype; all subtypes by default
 *
 * @return void
 *
 * @deprecated
 */
function register_metadata_as_independent($type, $subtype = '*') {
	elgg_deprecated_notice(__FUNCTION__ . ' is deprecated. Metadata no longer is access bound.', '3.0');
}

/**
 * Determines whether entities of a given type and subtype should not change
 * their metadata in line with their parent entity
 *
 * @param string $type    The type - object, user, etc
 * @param string $subtype The entity subtype
 *
 * @return bool
 *
 * @deprecated
 */
function is_metadata_independent($type, $subtype) {
	elgg_deprecated_notice(__FUNCTION__ . ' is deprecated. Metadata no longer is access bound.', '3.0');
	
	return false;
}
