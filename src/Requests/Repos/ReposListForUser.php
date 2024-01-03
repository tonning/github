<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-for-user
 *
 * Lists public repositories for the specified user.
 */
class ReposListForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}/repos";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param null|string $type Limit results to repositories of the specified type.
	 * @param null|string $sort The property to sort the results by.
	 * @param null|string $direction The order to sort by. Default: `asc` when using `full_name`, otherwise `desc`.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $username,
		protected ?string $type = null,
		protected ?string $sort = null,
		protected ?string $direction = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['type' => $this->type, 'sort' => $this->sort, 'direction' => $this->direction, 'page' => $this->page]);
	}
}
