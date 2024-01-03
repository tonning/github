<?php

namespace Tonning\Github\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-authenticated
 *
 * If the authenticated user is authenticated with an OAuth token with the `user` scope, then the
 * response lists public and private profile information.
 *
 * If the authenticated user is authenticated
 * through OAuth without the `user` scope, then the response lists only public profile information.
 */
class UsersGetAuthenticated extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user';
    }

    public function __construct()
    {
    }
}
