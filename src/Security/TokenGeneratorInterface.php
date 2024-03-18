<?php

namespace App\Security;

use App\Entity\User;

interface TokenGeneratorInterface
{
    public function generateToken(User $user): string;
}
