<?php namespace Illuminate\View;

abstract class Engine {

	/**
	 * The array of named path hints.
	 *
	 * @var array
	 */
	protected $hints = array();

	/**
	 * Get the segments of a template with a named path.
	 *
	 * @param  string  $name
	 * @return array
	 */
	protected function getNamedPathSegments($name)
	{
		$segments = explode('::', $name);

		if (count($segments) != 2)
		{
			throw new \InvalidArgumentException("View [$name] has an invalid name.");
		}

		if ( ! isset($this->hints[$segments[0]]))
		{
			throw new \InvalidArgumentException("No hint path defined for [{$segments[0]}].");
		}

		return $segments;
	}

	/**
	 * Add a new named path to the loader.
	 *
	 * @param  string  $name
	 * @param  string  $path
	 * @return void
	 */
	public function addNamedPath($name, $path)
	{
		$this->hints[$name] = $path;
	}

}