<?php

namespace Tonning\Github\Requests\Activity;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-repos-starred-by-authenticated-user
 *
 * Lists repositories the authenticated user has starred.
 *
 * You can also find out _when_ stars were
 * created by passing the following custom [media
 * type](https://docs.github.com/rest/overview/media-types/) via the `Accept` header:
 * `application/vnd.github.star+json`.
 */
class ActivityListReposStarredByAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/starred";
	}


	/**
	 * @param null|string $sort The property to sort the results by. `created` means when the repository was starred. `updated` means when the repository was last pushed to.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected ?string $sort = null,
		protected ?string $direction = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['sort' => $this->sort, 'direction' => $this->direction, 'page' => $this->page]);
	}
}
