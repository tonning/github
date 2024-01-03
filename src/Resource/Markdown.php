<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Markdown\MarkdownRender;
use Tonning\Github\Requests\Markdown\MarkdownRenderRaw;
use Tonning\Github\Resource;

class Markdown extends Resource
{
	public function markdownRender(): Response
	{
		return $this->connector->send(new MarkdownRender());
	}


	public function markdownRenderRaw(): Response
	{
		return $this->connector->send(new MarkdownRenderRaw());
	}
}
