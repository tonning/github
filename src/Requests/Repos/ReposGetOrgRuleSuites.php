<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-org-rule-suites
 *
 * Lists suites of rule evaluations at the organization level.
 * For more information, see "[Managing
 * rulesets for repositories in your
 * organization](https://docs.github.com/organizations/managing-organization-settings/managing-rulesets-for-repositories-in-your-organization#viewing-insights-for-rulesets)."
 */
class ReposGetOrgRuleSuites extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/rulesets/rule-suites";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|int  $repositoryName The name of the repository to filter on. When specified, only rule evaluations from this repository will be returned.
     * @param  null|string  $timePeriod The time period to filter by.
     *
     * For example, `day` will filter for rule suites that occurred in the past 24 hours, and `week` will filter for insights that occurred in the past 7 days (168 hours).
     * @param  null|string  $actorName The handle for the GitHub user account to filter on. When specified, only rule evaluations triggered by this actor will be returned.
     * @param  null|string  $ruleSuiteResult The rule results to filter on. When specified, only suites with this result will be returned.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected ?int $repositoryName = null,
        protected ?string $timePeriod = null,
        protected ?string $actorName = null,
        protected ?string $ruleSuiteResult = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'repository_name' => $this->repositoryName,
            'time_period' => $this->timePeriod,
            'actor_name' => $this->actorName,
            'rule_suite_result' => $this->ruleSuiteResult,
            'page' => $this->page,
        ]);
    }
}
