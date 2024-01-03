<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * codespaces/export-for-authenticated-user
 *
 * Triggers an export of the specified codespace and returns a URL and ID where the status of the
 * export can be monitored.
 *
 * If changes cannot be pushed to the codespace's repository, they will be
 * pushed to a new or previously-existing fork instead.
 *
 * You must authenticate using a personal access
 * token with the `codespace` scope to use this endpoint.
 *
 * GitHub Apps must have write access to the
 * `codespaces_lifecycle_admin` repository permission to use this endpoint.
 */
class CodespacesExportForAuthenticatedUser extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/{$this->codespaceName}/exports";
	}


	/**
	 * @param string $codespaceName The name of the codespace.
	 */
	public function __construct(
		protected string $codespaceName,
	) {
	}
}
