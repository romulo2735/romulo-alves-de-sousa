<?php

namespace Portal\App\Enums;

enum UserType: string
{
    case RECRUITER = 'recruiter';
    case CANDIDATE = 'candidate';
}
