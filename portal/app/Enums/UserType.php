<?php

namespace App\Enums;

enum UserType: string
{
    case RECRUITER = 'recruiter';
    case CANDIDATE = 'candidate';
}
