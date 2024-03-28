<?php

namespace Datlx\App;

trait Cache
{
	public function cacheHook($file_cache, $hooks = [])
	{
		file_put_contents($file_cache, '<?php return ' . var_export($hooks, true) . '; // cache-time: ' . date('Y-m-d H:i:s'), LOCK_EX);
	}

	/**
	 * @return bool
	 */
	protected function outOfDate($cache_file, $minute = 10)
	{
		return !(file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * $minute)));
	}
}
