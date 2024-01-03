<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Billing\BillingGetGithubActionsBillingOrg;
use Tonning\Github\Requests\Billing\BillingGetGithubActionsBillingUser;
use Tonning\Github\Requests\Billing\BillingGetGithubPackagesBillingOrg;
use Tonning\Github\Requests\Billing\BillingGetGithubPackagesBillingUser;
use Tonning\Github\Requests\Billing\BillingGetSharedStorageBillingOrg;
use Tonning\Github\Requests\Billing\BillingGetSharedStorageBillingUser;
use Tonning\Github\Resource;

class Billing extends Resource
{
    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function billingGetGithubActionsBillingOrg(string $org): Response
    {
        return $this->connector->send(new BillingGetGithubActionsBillingOrg($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function billingGetGithubPackagesBillingOrg(string $org): Response
    {
        return $this->connector->send(new BillingGetGithubPackagesBillingOrg($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function billingGetSharedStorageBillingOrg(string $org): Response
    {
        return $this->connector->send(new BillingGetSharedStorageBillingOrg($org));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     */
    public function billingGetGithubActionsBillingUser(string $username): Response
    {
        return $this->connector->send(new BillingGetGithubActionsBillingUser($username));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     */
    public function billingGetGithubPackagesBillingUser(string $username): Response
    {
        return $this->connector->send(new BillingGetGithubPackagesBillingUser($username));
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     */
    public function billingGetSharedStorageBillingUser(string $username): Response
    {
        return $this->connector->send(new BillingGetSharedStorageBillingUser($username));
    }
}
