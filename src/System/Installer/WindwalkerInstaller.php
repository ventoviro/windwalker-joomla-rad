<?php
/**
 * Part of joomla330 project. 
 *
 * @copyright  Copyright (C) 2016 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

namespace Windwalker\System\Installer;

/**
 * Class WindwalkerInstaller
 *
 * @since 1.0
 */
class WindwalkerInstaller
{
	/**
	 * The bin file content.
	 *
	 * @var  string
	 */
	static protected $binFile = <<<BIN
#!/usr/bin/env php
<?php

define('JPATH_BASE', realpath(dirname(__DIR__)));

include_once dirname(__DIR__) . '/libraries/windwalker/bin/windwalker.php';

BIN;

	/**
	 * createBinFile
	 *
	 * @param string $root
	 *
	 * @return  void
	 */
	public static function createBinFile($root)
	{
		file_put_contents($root . '/bin/windwalker', static::$binFile);
	}

	/**
	 * copyConfigFile
	 *
	 * @param string $root
	 *
	 * @return  void
	 */
	public static function copyConfigFile($root)
	{
		$configPath = $root . '/libraries/windwalker/config.dist.json';

		if (! is_file($configPath))
		{
			copy($configPath, $root . '/libraries/windwalker/config.json');
		}
	}

	/**
	 * createBundleDir
	 *
	 * @param string $root
	 *
	 * @return  bool
	 */
	public static function createBundleDir($root)
	{
		$bundlesDir = $root . '/libraries/windwalker-bundles';

		if (! is_dir($bundlesDir))
		{
			mkdir($bundlesDir);

			file_put_contents($bundlesDir . '/index.html', '<!DOCTYPE html><title></title>');

			return true;
		}

		return false;
	}

	/**
	 * install
	 *
	 * @param string $root
	 *
	 * @return  void
	 */
	public static function install($root)
	{
		static::createBinFile($root);

		static::copyConfigFile($root);

		static::createBundleDir($root);
	}
}
