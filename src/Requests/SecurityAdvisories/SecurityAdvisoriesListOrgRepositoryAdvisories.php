<?php

namespace Tonning\Github\Requests\SecurityAdvisories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/list-org-repository-advisories
 *
 * Lists repository security advisories for an organization.
 *
 * To use this endpoint, you must be an
 * owner or security manager for the organization, and you must use an access token with the `repo`
 * scope or `repository_advisories:write` permission.
 */
class SecurityAdvisoriesListOrgRepositoryAdvisories extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/security-advisories";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|string  $direction The direction to sort the results by.
     * @param  null|string  $sort The property to sort the results by.
     * @param  null|string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  null|string  $state Filter by the state of the repository advisories. Only advisories of this state will be returned.
     */
    public function __construct(
        protected string $org,
        protected ?string $direction = null,
        protected ?string $sort = null,
        protected ?string $before = null,
        protected ?string $state = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['direction' => $this->direction, 'sort' => $this->sort, 'before' => $this->before, 'state' => $this->state]);
    }
}
