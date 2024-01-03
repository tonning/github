<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/create-registration-token-for-repo
 *
 * Returns a token that you can pass to the `config` script. The token
 * expires after one hour.
 *
 * You
 * must authenticate using an access token with the `repo` scope to use this endpoint.
 * GitHub Apps must
 * have the `administration` permission for repositories and the `organization_self_hosted_runners`
 * permission for organizations.
 * Authenticated users must have admin access to repositories or
 * organizations, or the `manage_runners:enterprise` scope for enterprises, to use these
 * endpoints.
 *
 * Example using registration token:
 *
 * Configure your self-hosted runner, replacing `TOKEN`
 * with the registration token provided
 * by this endpoint.
 *
 * ```config.sh --url
 * https://github.com/octo-org/octo-repo-artifacts --token TOKEN```
 */
class ActionsCreateRegistrationTokenForRepo extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/registration-token";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {
    }
}
