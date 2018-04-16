<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Footer;

 /**
 * Class LoadData
 * @package AppBundle\DataFixtures\ORM
 */
class FooterFixtures extends Fixture
{
    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $footer = new Footer();
        $footer
            ->setTwitterLink('https://twitter.com')
            ->setFacebookLink('https://facebook.com')
            ->setLinkedInLink('https://linkedin.com')
            ->setCopyright('Copyright © iso1euro.fr 2018');

        $manager->persist($footer);
        $manager->flush();
    }
    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}
