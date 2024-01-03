<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/start-for-authenticated-user
 *
 * Starts a user's codespace.
 *
 * You must authenticate using an access token with the `codespace` scope
 * to use this endpoint.
 *
 * GitHub Apps must have write access to the `codespaces_lifecycle_admin`
 * repository permission to use this endpoint.
 */
class CodespacesStartForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/{$this->codespaceName}/start";
	}


	/**
	 * @param string $codespaceName The name of the codespace.
	 */
	public function __construct(
		protected string $codespaceName,
	) {
	}
}
