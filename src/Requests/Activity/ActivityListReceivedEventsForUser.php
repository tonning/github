<?php

namespace Tonning\Github\Requests\Activity;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-received-events-for-user
 *
 * These are events that you've received by watching repositories and following users. If you are
 * authenticated as the given user, you will see private events. Otherwise, you'll only see public
 * events.
 */
class ActivityListReceivedEventsForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}/received_events";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $username,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
