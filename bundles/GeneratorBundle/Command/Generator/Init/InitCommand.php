<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2016 LYRASOFT, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace GeneratorBundle\Command\Generator\Init;

use GeneratorBundle\Controller\GeneratorController;
use Windwalker\Console\Command\Command;

defined('WINDWALKER') or die;

/**
 * Class Init
 *
 * @since  2.0
 */
class InitCommand extends Command
{
	/**
	 * An enabled flag.
	 *
	 * @var bool
	 */
	public static $isEnabled = true;

	/**
	 * Console(Argument) name.
	 *
	 * @var  string
	 */
	protected $name = 'init';

	/**
	 * The command description.
	 *
	 * @var  string
	 */
	protected $description = 'Init a new extension.';

	/**
	 * The usage to tell user how to use this command.
	 *
	 * @var string
	 */
	protected $usage = 'init <cmd><command></cmd> <option>[option]</option>';

	/**
	 * Configure command information.
	 *
	 * @return void
	 */
	public function initialise()
	{
		// $this->addArgument();

		parent::initialise();
	}

	/**
	 * Execute this command.
	 *
	 * @return int|void
	 */
	protected function doExecute()
	{
		$generator = new GeneratorController($this);

		$generator->setTask('init')->execute();
	}
}
