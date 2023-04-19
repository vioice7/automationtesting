<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Tests\Fixtures\ContainerAwareFixture;
use Doctrine\Common\Persistence\ObjectManager;

use bjoernffm\Spintax\Parser;

class LoadFixtures extends ContainerAwareFixture
{
    public function load(ObjectManager $manager)
    {
        $defaultAuthor = $this->loadUsers($manager);
        $this->loadProducts($defaultAuthor, $manager);
    }

    private function loadProducts(User $defaultAuthor, EntityManager $em)
    {
        $em->createQuery('DELETE FROM AppBundle:Product');

        for($i = 0; $i < random_int(100, 200); $i++)
        {
            $product = new Product();
            $product->setName(Parser::parse('{Samsung|Motorola|Nokia|Huawei} {A|S|T|E}' . $i)->generate());
            $product->setAuthor($defaultAuthor);
            $product->setDescription('Lorem ipsum dolor ' . $i . ' sit amet, consectetur adipiscing elit. Sed posuere, neque quis ' . $i . ' pharetra tincidunt, enim libero pretium elit, in vehicula dolor lacus eget erat. Praesent sed justo nisl. Integer vel libero elit. Sed nulla quam, ornare et euismod sit amet, pellentesque vitae erat. Nullam rutrum metus vel magna molestie eget vulputate ligula fermentum. Cras eros nunc, semper sed scelerisque ultricies, condimentum sit amet orci. Suspendisse posuere pulvinar facilisis. Suspendisse gravida libero et sapien scelerisque ac feugiat erat mattis. Aliquam vel magna dolor, eu imperdiet enim. Proin id erat sollicitudin eros vulputate euismod. Nulla sed sem at lectus fringilla malesuada at in mi. Aenean porta metus et nisl accumsan rutrum. Nulla tincidunt enim a lacus tincidunt vitae ornare nisl pellentesque. Praesent id tempor velit.');
            $product->setPrice(($i+1)*100 . '.00');
            $product->setCreatedAt(new \DateTime('-' . $i . ' day -' . $i . ' hours -' . $i . ' minutes'));
            $product->setIsPublished((bool)random_int(0, 1));

            $em->persist($product);
        }

        $em->flush();
    }

    /**
     * Loads some dummy users
     */
    private function loadUsers(EntityManager $em)
    {
        $em->createQuery('DELETE FROM AppBundle:Product');

        $user = new User();
        $user->setUsername('admin');
        $user->setPlainPassword('admin');
        $user->setRoles(array('ROLE_ADMIN'));

        $em->persist($user);
        $em->flush();

        return $user;
    }
}