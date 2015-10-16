<?php namespace Regulus\Identify\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authorize {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$authorized = $this->auth->hasRouteAccess($request->route());

		if (!$authorized)
			abort(config('auth.unauthorized_error_code'));

		return $next($request);
	}

}