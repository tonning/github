<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-memberships-for-authenticated-user
 *
 * Lists all of the authenticated user's organization memberships.
 */
class OrgsListMembershipsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/memberships/orgs';
    }

    /**
     * @param  null|string  $state Indicates the state of the memberships to return. If not specified, the API returns both active and pending memberships.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected ?string $state = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['state' => $this->state, 'page' => $this->page]);
    }
}
