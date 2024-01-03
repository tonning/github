<?php

namespace Tonning\Github\Requests\Dependabot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/get-org-public-key
 *
 * Gets your public key, which you need to encrypt secrets. You need to encrypt a secret before you can
 * create or update secrets. You must authenticate using an access token with the `admin:org` scope to
 * use this endpoint. GitHub Apps must have the `dependabot_secrets` organization permission to use
 * this endpoint.
 */
class DependabotGetOrgPublicKey extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/dependabot/secrets/public-key";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
