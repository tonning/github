<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/disable-deployment-protection-rule
 *
 * Disables a custom deployment protection rule for an environment.
 *
 * You must authenticate using an
 * access token with the `repo` scope to use this endpoint. Removing a custom protection rule requires
 * admin or owner permissions to the repository. GitHub Apps must have the `actions:write` permission
 * to use this endpoint. For more information, see "[Get an
 * app](https://docs.github.com/rest/apps/apps#get-an-app)".
 */
class ReposDisableDeploymentProtectionRule extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment_protection_rules/{$this->protectionRuleId}";
    }

    /**
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  int  $protectionRuleId The unique identifier of the protection rule.
     */
    public function __construct(
        protected string $environmentName,
        protected string $repo,
        protected string $owner,
        protected int $protectionRuleId,
    ) {
    }
}
