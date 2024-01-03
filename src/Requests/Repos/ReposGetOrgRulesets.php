<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-org-rulesets
 *
 * Get all the repository rulesets for an organization.
 */
class ReposGetOrgRulesets extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/rulesets";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
