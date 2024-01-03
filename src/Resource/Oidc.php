<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Oidc\OidcGetOidcCustomSubTemplateForOrg;
use Tonning\Github\Requests\Oidc\OidcUpdateOidcCustomSubTemplateForOrg;
use Tonning\Github\Resource;

class Oidc extends Resource
{
    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function oidcGetOidcCustomSubTemplateForOrg(string $org): Response
    {
        return $this->connector->send(new OidcGetOidcCustomSubTemplateForOrg($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function oidcUpdateOidcCustomSubTemplateForOrg(string $org): Response
    {
        return $this->connector->send(new OidcUpdateOidcCustomSubTemplateForOrg($org));
    }
}
