<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/remove-user-access-restrictions
 *
 * Protected branches are available in public repositories with GitHub Free and GitHub Free for
 * organizations, and in public and private repositories with GitHub Pro, GitHub Team, GitHub
 * Enterprise Cloud, and GitHub Enterprise Server. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * Removes the ability of a user to push to this branch.
 *
 * | Type    | Description
 * |
 * | ------- |
 * ---------------------------------------------------------------------------------------------------------------------------------------------
 * |
 * | `array` | Usernames of the people who should no longer have push access. **Note**: The list of
 * users, apps, and teams in total is limited to 100 items. |
 */
class ReposRemoveUserAccessRestrictions extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/branches/{$this->branch}/protection/restrictions/users";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $branch,
    ) {
    }
}
