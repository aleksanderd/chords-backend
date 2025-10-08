<?php

 declare(strict_types=1);

namespace Chords\User\Domain\Repository;

 use Chords\Core\Domain\Model\OIdInterface;
 use Chords\User\Domain\Model\UserWriteInterface;

 interface UserWriteRepositoryInteface
 {
     public function findById(OIdInterface $id): ?UserWriteInterface;

     public function findByLogin(string $login): ?UserWriteInterface;

     public function save(UserWriteInterface $user): void;
 }
