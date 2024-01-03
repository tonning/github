<?php

namespace Tonning\Github;

use Saloon\Http\Connector;
use Tonning\Github\Resource\Actions;
use Tonning\Github\Resource\Activity;
use Tonning\Github\Resource\Apps;
use Tonning\Github\Resource\Billing;
use Tonning\Github\Resource\Checks;
use Tonning\Github\Resource\Classroom;
use Tonning\Github\Resource\CodeScanning;
use Tonning\Github\Resource\CodesOfConduct;
use Tonning\Github\Resource\Codespaces;
use Tonning\Github\Resource\Copilot;
use Tonning\Github\Resource\Dependabot;
use Tonning\Github\Resource\DependencyGraph;
use Tonning\Github\Resource\Emojis;
use Tonning\Github\Resource\Gists;
use Tonning\Github\Resource\Git;
use Tonning\Github\Resource\Gitignore;
use Tonning\Github\Resource\Interactions;
use Tonning\Github\Resource\Issues;
use Tonning\Github\Resource\Licenses;
use Tonning\Github\Resource\Markdown;
use Tonning\Github\Resource\Meta;
use Tonning\Github\Resource\Migrations;
use Tonning\Github\Resource\Oidc;
use Tonning\Github\Resource\Orgs;
use Tonning\Github\Resource\Packages;
use Tonning\Github\Resource\Projects;
use Tonning\Github\Resource\Pulls;
use Tonning\Github\Resource\RateLimit;
use Tonning\Github\Resource\Reactions;
use Tonning\Github\Resource\Repos;
use Tonning\Github\Resource\Search;
use Tonning\Github\Resource\SecretScanning;
use Tonning\Github\Resource\SecurityAdvisories;
use Tonning\Github\Resource\Teams;
use Tonning\Github\Resource\Users;

/**
 * GitHub v3 REST API
 *
 * GitHub's v3 REST API.
 */
class Github extends Connector
{
    const API_VERSION = '2022-11-28';

    public function __construct(string $apiToken)
    {
        $this->withTokenAuth($apiToken);
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/vnd.github+json',
            'Content-Type' => 'application/json',
            'X-GitHub-Api-Version' => static::API_VERSION,
        ];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.github.com';
    }

    public function actions(): Actions
    {
        return new Actions($this);
    }

    public function activity(): Activity
    {
        return new Activity($this);
    }

    public function apps(): Apps
    {
        return new Apps($this);
    }

    public function billing(): Billing
    {
        return new Billing($this);
    }

    public function checks(): Checks
    {
        return new Checks($this);
    }

    public function classroom(): Classroom
    {
        return new Classroom($this);
    }

    public function codeScanning(): CodeScanning
    {
        return new CodeScanning($this);
    }

    public function codesOfConduct(): CodesOfConduct
    {
        return new CodesOfConduct($this);
    }

    public function codespaces(): Codespaces
    {
        return new Codespaces($this);
    }

    public function copilot(): Copilot
    {
        return new Copilot($this);
    }

    public function dependabot(): Dependabot
    {
        return new Dependabot($this);
    }

    public function dependencyGraph(): DependencyGraph
    {
        return new DependencyGraph($this);
    }

    public function emojis(): Emojis
    {
        return new Emojis($this);
    }

    public function gists(): Gists
    {
        return new Gists($this);
    }

    public function git(): Git
    {
        return new Git($this);
    }

    public function gitignore(): Gitignore
    {
        return new Gitignore($this);
    }

    public function interactions(): Interactions
    {
        return new Interactions($this);
    }

    public function issues(): Issues
    {
        return new Issues($this);
    }

    public function licenses(): Licenses
    {
        return new Licenses($this);
    }

    public function markdown(): Markdown
    {
        return new Markdown($this);
    }

    public function meta(): Meta
    {
        return new Meta($this);
    }

    public function migrations(): Migrations
    {
        return new Migrations($this);
    }

    public function oidc(): Oidc
    {
        return new Oidc($this);
    }

    public function orgs(): Orgs
    {
        return new Orgs($this);
    }

    public function packages(): Packages
    {
        return new Packages($this);
    }

    public function projects(): Projects
    {
        return new Projects($this);
    }

    public function pulls(): Pulls
    {
        return new Pulls($this);
    }

    public function rateLimit(): RateLimit
    {
        return new RateLimit($this);
    }

    public function reactions(): Reactions
    {
        return new Reactions($this);
    }

    public function repos(): Repos
    {
        return new Repos($this);
    }

    public function search(): Search
    {
        return new Search($this);
    }

    public function secretScanning(): SecretScanning
    {
        return new SecretScanning($this);
    }

    public function securityAdvisories(): SecurityAdvisories
    {
        return new SecurityAdvisories($this);
    }

    public function teams(): Teams
    {
        return new Teams($this);
    }

    public function users(): Users
    {
        return new Users($this);
    }
}
