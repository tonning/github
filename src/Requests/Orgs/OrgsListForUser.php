<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-for-user
 *
 * List [public organization
 * memberships](https://docs.github.com/articles/publicizing-or-concealing-organization-membership) for
 * the specified user.
 *
 * This method only lists _public_ memberships, regardless of authentication. If
 * you need to fetch all of the organization memberships (public and private) for the authenticated
 * user, use the [List organizations for the authenticated
 * user](https://docs.github.com/rest/orgs/orgs#list-organizations-for-the-authenticated-user) API
 * instead.
 */
class OrgsListForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/orgs";
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
