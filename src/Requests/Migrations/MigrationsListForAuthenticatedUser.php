<?php

namespace Tonning\Github\Requests\Migrations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/list-for-authenticated-user
 *
 * Lists all migrations a user has started.
 */
class MigrationsListForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/migrations';
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
