<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Gitignore\GitignoreGetAllTemplates;
use Tonning\Github\Requests\Gitignore\GitignoreGetTemplate;
use Tonning\Github\Resource;

class Gitignore extends Resource
{
    public function gitignoreGetAllTemplates(): Response
    {
        return $this->connector->send(new GitignoreGetAllTemplates());
    }

    public function gitignoreGetTemplate(string $name): Response
    {
        return $this->connector->send(new GitignoreGetTemplate($name));
    }
}
