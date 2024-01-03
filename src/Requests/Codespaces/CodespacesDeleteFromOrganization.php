<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/delete-from-organization
 *
 * Deletes a user's codespace.
 *
 * To use this endpoint you must authenticate using one of the following
 * methods:
 *
 * - An access token with the `admin:org` scope
 * - An access token with write permissions for
 * `Codespaces` on the specific repository and write permissions for `Organization codespaces`
 */
class CodespacesDeleteFromOrganization extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/members/{$this->username}/codespaces/{$this->codespaceName}";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $username The handle for the GitHub user account.
	 * @param string $codespaceName The name of the codespace.
	 */
	public function __construct(
		protected string $org,
		protected string $username,
		protected string $codespaceName,
	) {
	}
}
