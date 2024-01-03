<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Meta\MetaGet;
use Tonning\Github\Requests\Meta\MetaGetAllVersions;
use Tonning\Github\Requests\Meta\MetaGetOctocat;
use Tonning\Github\Requests\Meta\MetaGetZen;
use Tonning\Github\Requests\Meta\MetaRoot;
use Tonning\Github\Resource;

class Meta extends Resource
{
	public function metaRoot(): Response
	{
		return $this->connector->send(new MetaRoot());
	}


	public function metaGet(): Response
	{
		return $this->connector->send(new MetaGet());
	}


	/**
	 * @param string $s The words to show in Octocat's speech bubble
	 */
	public function metaGetOctocat(?string $s): Response
	{
		return $this->connector->send(new MetaGetOctocat($s));
	}


	public function metaGetAllVersions(): Response
	{
		return $this->connector->send(new MetaGetAllVersions());
	}


	public function metaGetZen(): Response
	{
		return $this->connector->send(new MetaGetZen());
	}
}
