<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/delete-gpg-key-for-authenticated-user
 *
 * Removes a GPG key from the authenticated user's GitHub account. Requires that you are authenticated
 * via Basic Auth or via OAuth with at least `admin:gpg_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersDeleteGpgKeyForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/gpg_keys/{$this->gpgKeyId}";
	}


	/**
	 * @param int $gpgKeyId The unique identifier of the GPG key.
	 */
	public function __construct(
		protected int $gpgKeyId,
	) {
	}
}
