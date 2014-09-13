<?php namespace Chee\Module\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Foundation\Application;
use Chee\Module\ModuleModel;

class AbstractCommand extends Command {
	/**
	 * IoC
	 *
	 * @var Illuminate\Foundation\Application
	 */
	protected $app;

	protected $modulesPath;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Application $app)
	{
		parent::__construct();

		$this->app = $app;
		$this->modulesPath = $this->app['config']->get('module::modules_path');
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		//
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

	protected function getModulesDirectories()
	{
		$modulesDirectories = $this->app['files']->directories(base_path($this->modulesPath));
		$arr = array();
		foreach ($modulesDirectories as $moduleDirectory)
		{
			array_push($arr, basename($moduleDirectory));
		}
		
		return $arr;
	}

}
