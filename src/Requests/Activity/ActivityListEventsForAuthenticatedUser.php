<?php

namespace Tonning\Github\Requests\Activity;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-events-for-authenticated-user
 *
 * If you are authenticated as the given user, you will see your private events. Otherwise, you'll only
 * see public events.
 */
class ActivityListEventsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/events";
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  null|int  $page Page number of the results to fetch.
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
