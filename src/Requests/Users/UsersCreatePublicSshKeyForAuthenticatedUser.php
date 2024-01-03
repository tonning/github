<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/create-public-ssh-key-for-authenticated-user
 *
 * Adds a public SSH key to the authenticated user's GitHub account. Requires that you are
 * authenticated via Basic Auth, or OAuth with at least `write:public_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersCreatePublicSshKeyForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/keys";
	}


	public function __construct()
	{
	}
}
