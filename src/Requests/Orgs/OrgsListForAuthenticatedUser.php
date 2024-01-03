<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-for-authenticated-user
 *
 * List organizations for the authenticated user.
 *
 * **OAuth scope requirements**
 *
 * This only lists
 * organizations that your authorization allows you to operate on in some way (e.g., you can list teams
 * with `read:org` scope, you can publicize your organization membership with `user` scope, etc.).
 * Therefore, this API requires at least `user` or `read:org` scope. OAuth requests with insufficient
 * scope receive a `403 Forbidden` response.
 */
class OrgsListForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/orgs';
    }

    /**
     * @param  null|int  $page Page number of the results to fetch.
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
