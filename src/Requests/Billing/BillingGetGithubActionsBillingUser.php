<?php

namespace Tonning\Github\Requests\Billing;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * billing/get-github-actions-billing-user
 *
 * Gets the summary of the free and paid GitHub Actions minutes used.
 *
 * Paid minutes only apply to
 * workflows in private repositories that use GitHub-hosted runners. Minutes used is listed for each
 * GitHub-hosted runner operating system. Any job re-runs are also included in the usage. The usage
 * returned includes any minute multipliers for macOS and Windows runners, and is rounded up to the
 * nearest whole minute. For more information, see "[Managing billing for GitHub
 * Actions](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-actions)".
 *
 * Access
 * tokens must have the `user` scope.
 */
class BillingGetGithubActionsBillingUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/settings/billing/actions";
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     */
    public function __construct(
        protected string $username,
    ) {
    }
}
