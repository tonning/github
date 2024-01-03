<?php

namespace Tonning\Github\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/get-gpg-key-for-authenticated-user
 *
 * View extended details for a single GPG key. Requires that you are authenticated via Basic Auth or
 * via OAuth with at least `read:gpg_key`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 */
class UsersGetGpgKeyForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


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
