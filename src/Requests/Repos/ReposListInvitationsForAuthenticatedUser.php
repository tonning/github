<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-invitations-for-authenticated-user
 *
 * When authenticating as a user, this endpoint will list all currently open repository invitations for
 * that user.
 */
class ReposListInvitationsForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/repository_invitations';
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
