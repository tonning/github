<?php

namespace Tonning\Github\Requests\Teams;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * teams/list-for-authenticated-user
 *
 * List all of the teams across all of the organizations to which the authenticated user belongs. This
 * method requires `user`, `repo`, or `read:org`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/) when
 * authenticating via [OAuth](https://docs.github.com/apps/building-oauth-apps/). When using a
 * fine-grained personal access token, the resource owner of the token [must be a single
 * organization](https://docs.github.com/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token#fine-grained-personal-access-tokens),
 * and have at least read-only member organization permissions. The response payload only contains the
 * teams from a single organization when using a fine-grained personal access token.
 */
class TeamsListForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/teams';
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
