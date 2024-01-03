<?php

namespace Tonning\Github\Requests\Pulls;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * pulls/update
 *
 * Draft pull requests are available in public repositories with GitHub Free and GitHub Free for
 * organizations, GitHub Pro, and legacy per-repository billing plans, and in public and private
 * repositories with GitHub Team and GitHub Enterprise Cloud. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * To open or update a pull request in a public repository, you must have write
 * access to the head or the source branch. For organization-owned repositories, you must be a member
 * of the organization that owns the repository to open or update a pull request.
 */
class PullsUpdate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/pulls/{$this->pullNumber}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $pullNumber The number that identifies the pull request.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $pullNumber,
    ) {
    }
}
