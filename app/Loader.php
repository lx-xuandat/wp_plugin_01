<?php

namespace Datlx\App;

class Loader
{
	use Cache;

	public function load()
	{
		$fileCache = plugin_dir_path(dirname(__FILE__)) . 'cache/hooks.php';
		$hookTypes = require_once $fileCache;

		if (WP_DEBUG === true) {
			$this->detachHooks($fileCache);
		} else {
			foreach ($hookTypes as $hookType => $hooks) {
				foreach ($hooks as $hook) {
					$hookType(
						$hook['hook_name'],
						[
							Plugin::resolve($hook['callback'][0]),
							$hook['callback'][1],
						],
						$hook['priority'],
						$hook['accepted_args']
					);
				}
			}
		}
	}

	private function detachHooks($fileCache)
	{
		$patterns = [
			'add_action' => '/@add_action\((\w+),\s*(\w+),\s*(\d+),\s*(\d+)\)/',
			'add_filter' => '/@add_filter\((\w+),\s*(\w+),\s*(\d+),\s*(\d+)\)/',
		];

		$matches = array();
		$hooks = array();

		$classes = require plugin_dir_path(dirname(__FILE__)) . 'config/app.php';

		foreach ($classes as $class) {
			$rfc = new \ReflectionClass($class);
			$document = $rfc->getDocComment();
			if ($document !== false) {
				foreach (['add_action', 'add_filter'] as $type) {
					if (preg_match_all($patterns[$type], $document, $matches, PREG_SET_ORDER)) {
						foreach ($matches as $match) {
							$hooks[$type][] = [
								'hook_name' => preg_replace('/\s+/', '', $match[1]),
								'callback' => [$class, preg_replace('/\s+/', '', $match[2])],
								'priority' => (int) $match[3],
								'accepted_args' => (int) $match[4]
							];

							$type(
								preg_replace('/\s+/', '', $match[1]),
								[Plugin::resolve($class), preg_replace('/\s+/', '', $match[2])],
								(int) $match[3],
								(int) $match[4]
							);
						}
					}
				}
			}
		}

		$this->cacheHook($fileCache, $hooks);
	}
}
