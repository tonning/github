<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-for-authenticated-user
 *
 * Gets information about a user's codespace.
 *
 * You must authenticate using an access token with the
 * `codespace` scope to use this endpoint.
 *
 * GitHub Apps must have read access to the `codespaces`
 * repository permission to use this endpoint.
 */
class CodespacesGetForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/{$this->codespaceName}";
	}


	/**
	 * @param string $codespaceName The name of the codespace.
	 */
	public function __construct(
		protected string $codespaceName,
	) {
	}
}
