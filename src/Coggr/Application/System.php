<?php

namespace Coggr\Application;

class Core
{

	/**
	 * The names of the loaded service providers.
	 *
	 * @var array
	 */
	protected $loadedProviders = [];

	/**
	 * All of the registered service providers.
	 *
	 * @var array
	 */
	protected $serviceProviders = [];

	/**
	 * Boots Xiumi
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->registerBaseBindings();
	}

	/**
	 * Register the basic bindings into the container.
	 *
	 * @return void
	 */
	public function registerBaseBindings()
	{
		$this->app = new Container;

		$this->instance('app', $this);
	}

	/**
	 * Register a service provider with the application.
	 *
	 * @param  Coggr\Service\Provider|string  $provider
	 * @param  array  $options
	 * @param  bool   $force
	 * @return Coggr\Service\Provider
	 */
	public function register($provider, $options = [], $force = false)
	{
		if ( $registered = $this->getProvider($provider) && ! $force ) {
			return $registered;
		}

		// If the given "provider" is a string, we will resolve it, passing in the
		// application instance automatically for the developer. This is simply
		// a more convenient way of specifying your service provider classes.
		if (is_string($provider)) {
			$provider = $this->resolveProviderClass($provider);
		}

		$provider->register();

		// Once we have registered the service we will iterate through the options
		// and set each of them on the application so they will be available on
		// the actual loading of the service objects and for developer usage.
		foreach ($options as $key => $value) {
			$this[$key] = $value;
		}

		$this->markAsRegistered($provider);

		// If the application has already booted, we will call this boot method on
		// the provider class so it has an opportunity to do its boot logic and
		// will be ready for any usage by the developer's application logics.
		if ($this->booted) {
			$this->bootProvider($provider);
		}
	}

	/**
	 * Get the registered service provider instance if it exists.
	 *
	 * @param  Coggr\Service\Provider|string  $provider
	 * @return Coggr\Service\Provider|null
	 */
	public function getProvider($provider)
	{
		$name = is_string($provider) ? $provider : get_class($provider);

		foreach($this->serviceProviders as $key => $value) {
			call_user_func_array(function ($key, $value) use ($name) {
				return $value instanceof $name;
			}, [$key, $value]);
		}
	}

	/**
	 * Resolve a service provider instance from the class name.
	 *
	 * @param  string  $provider
	 * @return Coggr\Service\Provider
	 */
	public function resolveProviderClass($provider)
	{
		return new $provider($this);
	}

	/**
	 * Mark the given provider as registered.
	 *
	 * @param Coggr\Service\Provider
	 * @return void
	 */
	protected function markAsRegistered($provider)
	{
		$class = get_class($provider);

		$this->serviceProviders[] = $provider;
		$this->loadedProviders[$class] = true;
	}
	
}