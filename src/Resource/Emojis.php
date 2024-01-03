<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Emojis\EmojisGet;
use Tonning\Github\Resource;

class Emojis extends Resource
{
	public function emojisGet(): Response
	{
		return $this->connector->send(new EmojisGet());
	}
}
