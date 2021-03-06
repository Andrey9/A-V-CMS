<?php
/**
 * Created by Newway, info@newway.com.ua
 * User: ddiimmkkaass, ddiimmkkaass@gmail.com
 * Date: 29.08.15
 * Time: 15:53
 */

namespace App\Http\Filters;

use Illuminate\Contracts\Auth\Authenticator;

/**
 * Class BasicAuthFilter
 * @package App\Http\Filters
 */
class BasicAuthFilter
{

    /**
     * The authenticator implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Authenticator $auth
     *
     */
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Run the request filter.
     *
     * @return mixed
     */
    public function filter()
    {
        return $this->auth->basic();
    }
}
