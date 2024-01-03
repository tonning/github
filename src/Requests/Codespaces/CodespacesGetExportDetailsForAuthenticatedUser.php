<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/get-export-details-for-authenticated-user
 *
 * Gets information about an export of a codespace.
 *
 * You must authenticate using a personal access
 * token with the `codespace` scope to use this endpoint.
 *
 * GitHub Apps must have read access to the
 * `codespaces_lifecycle_admin` repository permission to use this endpoint.
 */
class CodespacesGetExportDetailsForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces/{$this->codespaceName}/exports/{$this->exportId}";
	}


	/**
	 * @param string $codespaceName The name of the codespace.
	 * @param string $exportId The ID of the export operation, or `latest`. Currently only `latest` is currently supported.
	 */
	public function __construct(
		protected string $codespaceName,
		protected string $exportId,
	) {
	}
}
