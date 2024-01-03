<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/add-user-access-restrictions
 *
 * Protected branches are available in public repositories with GitHub Free and GitHub Free for
 * organizations, and in public and private repositories with GitHub Pro, GitHub Team, GitHub
 * Enterprise Cloud, and GitHub Enterprise Server. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * Grants the specified people push access for this branch.
 *
 * | Type    |
 * Description
 * |
 * | ------- |
 * -----------------------------------------------------------------------------------------------------------------------------
 * |
 * | `array` | Usernames for people who can have push access. **Note**: The list of users, apps, and
 * teams in total is limited to 100 items. |
 */
class ReposAddUserAccessRestrictions extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
