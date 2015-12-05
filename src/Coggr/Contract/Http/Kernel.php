<?php

namespace Coggr\Contract\Http;

interface Kernel
{

	/**
	 * Bootstrap the application for HTTP requests.
	 *
	 * @return void
	 */
	public function bootstrap();

	/**
	 * Handle an incoming HTTP request.
	 *
	 * @param  \Cogger\Contract\Http\Request  $request
	 * @return \Cogger\Contract\Http\Response
	 */
	public function handle($request);

	/**
	 * Perform any final actions for the request lifecycle.
	 *
	 * @param  \Cogger\Contract\Http\Request  $request
	 * @param  \Cogger\Contract\Http\Response  $response
	 * @return void
	 */
	public function terminate($request, $response);

	/**
	 * Get the Coggr application instance.
	 *
	 * @return \Cogger\Contract\Application\Core
	 */
	public function getApplication();

}