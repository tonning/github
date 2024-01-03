<?php

namespace Tonning\Github\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-email-for-authenticated-user
 *
 * This endpoint is accessible with the `user` scope.
 */
class UsersDeleteEmailForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/user/emails';
    }

    public function __construct()
    {
    }
}
