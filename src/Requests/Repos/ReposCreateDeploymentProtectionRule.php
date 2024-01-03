<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-deployment-protection-rule
 *
 * Enable a custom deployment protection rule for an environment.
 *
 * You must authenticate using an
 * access token with the `repo` scope to use this endpoint. Enabling a custom protection rule requires
 * admin or owner permissions to the repository. GitHub Apps must have the `actions:write` permission
 * to use this endpoint.
 *
 * For more information about the app that is providing this custom deployment
 * rule, see the [documentation for the `GET /apps/{app_slug}`
 * endpoint](https://docs.github.com/rest/apps/apps#get-an-app).
 */
class ReposCreateDeploymentProtectionRule extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment_protection_rules";
    }

    /**
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     */
    public function __construct(
        protected string $environmentName,
        protected string $repo,
        protected string $owner,
    ) {
    }
}
