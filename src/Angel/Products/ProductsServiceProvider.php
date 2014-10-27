<?php namespace Angel\Products;

use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('angel/products');

		include __DIR__ . '/Cart.php';
		include __DIR__ . '../../../routes.php';

		$bindings = array(
			'Cart'              => '\Angel\Products\Cart',

			// Models
			'Product'           => '\Angel\Products\Product',
			'ProductCategory'   => '\Angel\Products\ProductCategory',
			'ProductImage'      => '\Angel\Products\ProductImage',
			'ProductOption'     => '\Angel\Products\ProductOption',
			'ProductOptionItem' => '\Angel\Products\ProductOptionItem',
			'Order'             => '\Angel\Products\Order',
			'Discount'          => '\Angel\Products\Discount',

			// Controllers
			'AdminProductCategoryController' => '\Angel\Products\AdminProductCategoryController',
			'AdminProductController'         => '\Angel\Products\AdminProductController',
			'AdminOrderController'           => '\Angel\Products\AdminOrderController',
			'ProductController'              => '\Angel\Products\ProductController',
			'AdminDiscountController'        => '\Angel\Products\AdminDiscountController',
			'DiscountController'              => '\Angel\Products\DiscountController'
		);

		foreach ($bindings as $name=>$class) {
			$this->app->singleton($name, function() use ($class) {
				return new $class;
			});
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
