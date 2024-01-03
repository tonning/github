<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * users/create-gpg-key-for-authenticated-user
 *
 * Adds a GPG key to the authenticated user's GitHub account. Requires that you are authenticated via
 * Basic Auth, or OAuth with at least `write:gpg_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersCreateGpgKeyForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/gpg_keys";
	}


	public function __construct()
	{
	}
}
