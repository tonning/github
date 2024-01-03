<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-branch-rules
 *
 * Returns all active rules that apply to the specified branch. The branch does not need to exist;
 * rules that would apply
 * to a branch with that name will be returned. All active rules that apply will
 * be returned, regardless of the level
 * at which they are configured (e.g. repository or organization).
 * Rules in rulesets with "evaluate" or "disabled"
 * enforcement statuses are not returned.
 */
class ReposGetBranchRules extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/rules/branches/{$this->branch}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $branch,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
