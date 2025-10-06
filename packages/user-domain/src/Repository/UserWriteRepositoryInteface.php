<?php

 declare(strict_types=1);

namespace Chords\User\Domain\Infrastructure\Repository;

 use Chords\User\Domain\Model\UserWriteInterface;

 interface UserWriteRepositoryInteface
 {
     public function save(UserWriteInterface $user): void;
 }
