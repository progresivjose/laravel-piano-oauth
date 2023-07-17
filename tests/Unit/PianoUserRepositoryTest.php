<?php

use Progresivjose\LaravelPianoOauth\Models\PianoUser;
use Progresivjose\LaravelPianoOauth\Repositories\PianoUserRepository;

beforeEach(function () {
    $this->repository = new PianoUserRepository();
});

it("should return the user if exists", function () {
    $data = [
        'uid' => 'test-uid',
        'name' => 'John',
        'lastname' => 'Doe',
        'personal_name' => 'John Doe',
        'email' => 'john@doe.co'
    ];
    $user = PianoUser::create($data);

    $created = $this->repository->createIfNotExists($data);

    expect($created)->toBe($user);
});
