<?php

namespace Tonning\Github\Requests\Git;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * git/list-matching-refs
 *
 * Returns an array of references from your Git database that match the supplied name. The `:ref` in
 * the URL must be formatted as `heads/<branch name>` for branches and `tags/<tag name>` for tags. If
 * the `:ref` doesn't exist in the repository, but existing refs start with `:ref`, they will be
 * returned as an array.
 *
 * When you use this endpoint without providing a `:ref`, it will return an
 * array of all the references from your Git database, including notes and stashes if they exist on the
 * server. Anything in the namespace is returned, not just `heads` and `tags`.
 *
 * **Note:** You need to
 * explicitly [request a pull request](https://docs.github.com/rest/pulls/pulls#get-a-pull-request) to
 * trigger a test merge commit, which checks the mergeability of pull requests. For more information,
 * see "[Checking mergeability of pull
 * requests](https://docs.github.com/rest/guides/getting-started-with-the-git-database-api#checking-mergeability-of-pull-requests)".
 *
 * If
 * you request matching references for a branch named `feature` but the branch `feature` doesn't exist,
 * the response can still include other matching head refs that start with the word `feature`, such as
 * `featureA` and `featureB`.
 */
class GitListMatchingRefs extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/git/matching-refs/{$this->ref}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
    ) {
    }
}
