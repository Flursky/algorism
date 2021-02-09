<?php

namespace App\DataFixtures;

use App\Domain\Auth\Password;
use App\Domain\Auth\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 3; $i++) {
            $password = new Password();
            $user = new User();

            $encrypted = $this->encoder->encodePassword($user, 'rootkit22');

            $password->setPassword($encrypted)
                ->setUser($user);

            $user->setEmail("user-$i@example.com")
                ->setPassword($password);

            $manager->persist($password);
            $manager->persist($user);
            $manager->flush();

        }
    }
}
