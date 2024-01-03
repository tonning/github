<?php

namespace Tonning\Github\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * users/list-social-accounts-for-authenticated-user
 *
 * Lists all of your social accounts.
 */
class UsersListSocialAccountsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/social_accounts';
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
