<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/list-outside-collaborators
 *
 * List all users who are outside collaborators of an organization.
 */
class OrgsListOutsideCollaborators extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/outside_collaborators";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|string  $filter Filter the list of outside collaborators. `2fa_disabled` means that only outside collaborators without [two-factor authentication](https://github.com/blog/1614-two-factor-authentication) enabled will be returned.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected ?string $filter = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filter' => $this->filter, 'page' => $this->page]);
    }
}
