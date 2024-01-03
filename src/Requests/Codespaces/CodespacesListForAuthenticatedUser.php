<?php

namespace Tonning\Github\Requests\Codespaces;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * codespaces/list-for-authenticated-user
 *
 * Lists the authenticated user's codespaces.
 *
 * You must authenticate using an access token with the
 * `codespace` scope to use this endpoint.
 *
 * GitHub Apps must have read access to the `codespaces`
 * repository permission to use this endpoint.
 */
class CodespacesListForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/codespaces";
	}


	/**
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|int $repositoryId ID of the Repository to filter on
	 */
	public function __construct(
		protected ?int $page = null,
		protected ?int $repositoryId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'repository_id' => $this->repositoryId]);
	}
}
