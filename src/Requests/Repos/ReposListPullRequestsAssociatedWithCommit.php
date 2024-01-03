<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-pull-requests-associated-with-commit
 *
 * Lists the merged pull request that introduced the commit to the repository. If the commit is not
 * present in the default branch, will only return open pull requests associated with the commit.
 *
 * To
 * list the open or merged pull requests associated with a branch, you can set the `commit_sha`
 * parameter to the branch name.
 */
class ReposListPullRequestsAssociatedWithCommit extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->commitSha}/pulls";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $commitSha The SHA of the commit.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $commitSha,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
