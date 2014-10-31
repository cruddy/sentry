<?php

namespace Kalnoy\Cruddy\Sentry;

use Illuminate\Support\ServiceProvider;

class SentryServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->resolving('cruddy.permissions', function ($manager)
		{
			$manager->extend('sentry', function ($app)
			{
				return new SentryPermissions($app['sentry']);
			});
		});
	}

}
