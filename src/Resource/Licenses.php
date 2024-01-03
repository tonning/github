<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Licenses\LicensesGet;
use Tonning\Github\Requests\Licenses\LicensesGetAllCommonlyUsed;
use Tonning\Github\Requests\Licenses\LicensesGetForRepo;
use Tonning\Github\Resource;

class Licenses extends Resource
{
    /**
     * @param  int  $page Page number of the results to fetch.
     */
    public function licensesGetAllCommonlyUsed(?bool $featured, ?int $page): Response
    {
        return $this->connector->send(new LicensesGetAllCommonlyUsed($featured, $page));
    }

    public function licensesGet(string $license): Response
    {
        return $this->connector->send(new LicensesGet($license));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function licensesGetForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new LicensesGetForRepo($owner, $repo));
    }
}
