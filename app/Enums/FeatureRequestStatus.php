<?php

namespace App\Enums;

enum FeatureRequestStatus: string
{
    case Open = 'open';
    case Planned = 'planned';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Closed = 'closed';
}
