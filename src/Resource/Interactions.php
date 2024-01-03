<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Interactions\InteractionsGetRestrictionsForAuthenticatedUser;
use Tonning\Github\Requests\Interactions\InteractionsGetRestrictionsForOrg;
use Tonning\Github\Requests\Interactions\InteractionsGetRestrictionsForRepo;
use Tonning\Github\Requests\Interactions\InteractionsRemoveRestrictionsForAuthenticatedUser;
use Tonning\Github\Requests\Interactions\InteractionsRemoveRestrictionsForOrg;
use Tonning\Github\Requests\Interactions\InteractionsRemoveRestrictionsForRepo;
use Tonning\Github\Requests\Interactions\InteractionsSetRestrictionsForAuthenticatedUser;
use Tonning\Github\Requests\Interactions\InteractionsSetRestrictionsForOrg;
use Tonning\Github\Requests\Interactions\InteractionsSetRestrictionsForRepo;
use Tonning\Github\Resource;

class Interactions extends Resource
{
    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function interactionsGetRestrictionsForOrg(string $org): Response
    {
        return $this->connector->send(new InteractionsGetRestrictionsForOrg($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function interactionsSetRestrictionsForOrg(string $org): Response
    {
        return $this->connector->send(new InteractionsSetRestrictionsForOrg($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function interactionsRemoveRestrictionsForOrg(string $org): Response
    {
        return $this->connector->send(new InteractionsRemoveRestrictionsForOrg($org));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function interactionsGetRestrictionsForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new InteractionsGetRestrictionsForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function interactionsSetRestrictionsForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new InteractionsSetRestrictionsForRepo($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function interactionsRemoveRestrictionsForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new InteractionsRemoveRestrictionsForRepo($owner, $repo));
    }

    public function interactionsGetRestrictionsForAuthenticatedUser(): Response
    {
        return $this->connector->send(new InteractionsGetRestrictionsForAuthenticatedUser());
    }

    public function interactionsSetRestrictionsForAuthenticatedUser(): Response
    {
        return $this->connector->send(new InteractionsSetRestrictionsForAuthenticatedUser());
    }

    public function interactionsRemoveRestrictionsForAuthenticatedUser(): Response
    {
        return $this->connector->send(new InteractionsRemoveRestrictionsForAuthenticatedUser());
    }
}
