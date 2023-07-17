<?php

namespace Progresivjose\LaravelPianoOauth\Repositories;

use Progresivjose\LaravelPianoOauth\Models\PianoUser;

class PianoUserRepository
{
    public function createIfNotExists(array $data): PianoUser
    {
        if ($user = PianoUser::where('uid', $data['uid'])->first()) {
            return $user;
        }

        return PianoUser::create($data);
    }
}
