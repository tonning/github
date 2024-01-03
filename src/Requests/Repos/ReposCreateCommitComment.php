<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-commit-comment
 *
 * Create a comment for a commit using its `:commit_sha`.
 *
 * This endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/overview/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 */
class ReposCreateCommitComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->commitSha}/comments";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $commitSha The SHA of the commit.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $commitSha,
    ) {
    }
}
