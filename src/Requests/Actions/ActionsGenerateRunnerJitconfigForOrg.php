<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/generate-runner-jitconfig-for-org
 *
 * Generates a configuration that can be passed to the runner application at startup.
 *
 * You must
 * authenticate using an access token with the `admin:org` scope to use this endpoint.
 * If the
 * repository is private, you must use an access token with the `repo` scope.
 * GitHub Apps must have the
 * `administration` permission for repositories and the `organization_self_hosted_runners` permission
 * for organizations.
 * Authenticated users must have admin access to repositories or organizations, or
 * the `manage_runners:enterprise` scope for enterprises, to use these endpoints.
 */
class ActionsGenerateRunnerJitconfigForOrg extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/runners/generate-jitconfig";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
