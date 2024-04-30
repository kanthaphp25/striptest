<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
            $this->app->singleton('Faker', function($app) {
        $faker = \Faker\Factory::create();
		
        $newClass = new class($faker) extends \Faker\Provider\Base {
        protected static $products = [
		'Car','Toys','Mixes','Lights','Fruits','Vegetables','Groceary'
			];
				public function product_name()
				{
				 return static::randomElement(static::$products);
               // $sentence = $this->generator->sentence($nbWords);
               // return substr($sentence, 0, strlen($sentence) - 1);
				}
			};

        $faker->addProvider($newClass);
        return $faker;
	});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
