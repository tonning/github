<?php

namespace Tonning\Github\Requests\Pulls;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * pulls/get
 *
 * Draft pull requests are available in public repositories with GitHub Free and GitHub Free for
 * organizations, GitHub Pro, and legacy per-repository billing plans, and in public and private
 * repositories with GitHub Team and GitHub Enterprise Cloud. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * Lists details of a pull request by providing its number.
 *
 * When you get,
 * [create](https://docs.github.com/rest/pulls/pulls/#create-a-pull-request), or
 * [edit](https://docs.github.com/rest/pulls/pulls#update-a-pull-request) a pull request, GitHub
 * creates a merge commit to test whether the pull request can be automatically merged into the base
 * branch. This test commit is not added to the base branch or the head branch. You can review the
 * status of the test commit using the `mergeable` key. For more information, see "[Checking
 * mergeability of pull
 * requests](https://docs.github.com/rest/guides/getting-started-with-the-git-database-api#checking-mergeability-of-pull-requests)".
 *
 * The
 * value of the `mergeable` attribute can be `true`, `false`, or `null`. If the value is `null`, then
 * GitHub has started a background job to compute the mergeability. After giving the job time to
 * complete, resubmit the request. When the job finishes, you will see a non-`null` value for the
 * `mergeable` attribute in the response. If `mergeable` is `true`, then `merge_commit_sha` will be the
 * SHA of the _test_ merge commit.
 *
 * The value of the `merge_commit_sha` attribute changes depending on
 * the state of the pull request. Before merging a pull request, the `merge_commit_sha` attribute holds
 * the SHA of the _test_ merge commit. After merging a pull request, the `merge_commit_sha` attribute
 * changes depending on how you merged the pull request:
 *
 * *   If merged as a [merge
 * commit](https://docs.github.com/articles/about-merge-methods-on-github/), `merge_commit_sha`
 * represents the SHA of the merge commit.
 * *   If merged via a
 * [squash](https://docs.github.com/articles/about-merge-methods-on-github/#squashing-your-merge-commits),
 * `merge_commit_sha` represents the SHA of the squashed commit on the base branch.
 * *   If
 * [rebased](https://docs.github.com/articles/about-merge-methods-on-github/#rebasing-and-merging-your-commits),
 * `merge_commit_sha` represents the commit that the base branch was updated to.
 *
 * Pass the appropriate
 * [media
 * type](https://docs.github.com/rest/overview/media-types/#commits-commit-comparison-and-pull-requests)
 * to fetch diff and patch formats.
 */
class PullsGet extends Request
{
    protected Method $method = Method::GET;

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
