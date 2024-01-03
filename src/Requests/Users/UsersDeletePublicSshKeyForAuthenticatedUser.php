<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-public-ssh-key-for-authenticated-user
 *
 * Removes a public SSH key from the authenticated user's GitHub account. Requires that you are
 * authenticated via Basic Auth or via OAuth with at least `admin:public_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersDeletePublicSshKeyForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/keys/{$this->keyId}";
	}


	/**
	 * @param int $keyId The unique identifier of the key.
	 */
	public function __construct(
		protected int $keyId,
	) {
	}
}
