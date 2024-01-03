<?php

namespace Tonning\Github\Requests\Gists;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/list-starred
 *
 * List the authenticated user's starred gists:
 */
class GistsListStarred extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/gists/starred";
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
