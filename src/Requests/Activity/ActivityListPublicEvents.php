<?php

namespace Tonning\Github\Requests\Activity;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-public-events
 *
 * We delay the public events feed by five minutes, which means the most recent event returned by the
 * public events API actually occurred at least five minutes ago.
 */
class ActivityListPublicEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/events";
	}


	/**
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
