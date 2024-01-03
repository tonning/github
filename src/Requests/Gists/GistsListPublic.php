<?php

namespace Tonning\Github\Requests\Gists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/list-public
 *
 * List public gists sorted by most recently updated to least recently updated.
 *
 * Note: With
 * [pagination](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api), you can fetch up
 * to 3000 gists. For example, you can fetch 100 pages with 30 gists per page or 30 pages with 100
 * gists per page.
 */
class GistsListPublic extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/gists/public";
	}


	/**
	 * @param null|string $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected ?string $since = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['since' => $this->since, 'page' => $this->page]);
	}
}
