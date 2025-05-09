<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $post = new Post();
        $post->setTitle('Game of Thrones');
        $post->setContent('Kings are dying like flies');

        $comment = new Comment($post);
        $comment->setComment('Mad king!');

        $comment2 = new Comment($post);
        $comment2->setComment('John Snow');

        $manager->persist($comment);
        $manager->persist($comment2);
        $manager->persist($post);
        $manager->flush();
    }
}
