<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-public-ssh-key-for-authenticated-user
 *
 * View extended details for a single public SSH key. Requires that you are authenticated via Basic
 * Auth or via OAuth with at least `read:public_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersGetPublicSshKeyForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


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
