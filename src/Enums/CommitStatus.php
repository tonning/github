<?php

namespace Tonning\Github\Enums;

enum CommitStatus: string
{
    case ERROR = 'error';
    case FAILURE = 'failure';
    case SUCCESS = 'success';
    case PENDING = 'pending';
}
