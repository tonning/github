<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-selected-repos-for-org-secret
 *
 * Lists all repositories that have been selected when the `visibility` for repository access to a
 * secret is set to `selected`. You must authenticate using an access token with the `admin:org` scope
 * to use this endpoint.
 */
class CodespacesListSelectedReposForOrgSecret extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/codespaces/secrets/{$this->secretName}/repositories";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $secretName The name of the secret.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected string $secretName,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
