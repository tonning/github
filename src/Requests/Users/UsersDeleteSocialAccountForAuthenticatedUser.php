<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-social-account-for-authenticated-user
 *
 * Deletes one or more social accounts from the authenticated user's profile. This endpoint is
 * accessible with the `user` scope.
 */
class UsersDeleteSocialAccountForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/social_accounts";
	}


	public function __construct()
	{
	}
}
