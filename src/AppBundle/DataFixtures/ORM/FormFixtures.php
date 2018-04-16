<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\LoftType;
use AppBundle\Entity\ResourceLimit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CallAvailability;
use AppBundle\Entity\HeatSystem;
use AppBundle\Entity\Status;

 /**
 * Class LoadData
 * @package AppBundle\DataFixtures\ORM
 */
class FormFixtures extends Fixture
{
    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // CallAvailability
        $callAvailability1 = new CallAvailability();
        $callAvailability1
            ->setLabel('matin');
        $manager->persist($callAvailability1);

        $callAvailability2 = new CallAvailability();
        $callAvailability2
            ->setLabel('après-midi');
        $manager->persist($callAvailability2);

        // HeatSystem
        $heatSystem1 = new HeatSystem();
        $heatSystem1
            ->setLabel('Pompe à chaleur')
            ->setImg('');
        $manager->persist($heatSystem1);

        $heatSystem2 = new HeatSystem();
        $heatSystem2
            ->setLabel('Bois')
            ->setImg('');
        $manager->persist($heatSystem2);

        $heatSystem3 = new HeatSystem();
        $heatSystem3
            ->setLabel('Gaz')
            ->setImg('');
        $manager->persist($heatSystem3);

        $heatSystem4 = new HeatSystem();
        $heatSystem4
            ->setLabel('Propane / Fioul')
            ->setImg('');
        $manager->persist($heatSystem4);

        $heatSystem5 = new HeatSystem();
        $heatSystem5
            ->setLabel('Electricité')
            ->setImg('');
        $manager->persist($heatSystem5);

        // Status
        $status = new Status();
        $status
            ->setLabel('Nouveau')
            ->setColor('#14bd87');
        $manager->persist($status);

        // ResourceLimit
        $resourceLimit1 = new ResourceLimit();
        $resourceLimit1
            ->setHousehold('1')
            ->setResource('14308')
            ->setIsIleDeFrance(false);
        $manager->persist($resourceLimit1);

        $resourceLimit2 = new ResourceLimit();
        $resourceLimit2
            ->setHousehold('2')
            ->setResource('20925')
            ->setIsIleDeFrance(false);
        $manager->persist($resourceLimit2);

        $resourceLimit3 = new ResourceLimit();
        $resourceLimit3
            ->setHousehold('3')
            ->setResource('25166')
            ->setIsIleDeFrance(false);
        $manager->persist($resourceLimit3);

        $resourceLimit3 = new ResourceLimit();
        $resourceLimit3
            ->setHousehold('4')
            ->setResource('29400')
            ->setIsIleDeFrance(false);
        $manager->persist($resourceLimit3);

        $resourceLimit4 = new ResourceLimit();
        $resourceLimit4
            ->setHousehold('5')
            ->setResource('33652')
            ->setIsIleDeFrance(false);
        $manager->persist($resourceLimit4);

        $resourceLimit5 = new ResourceLimit();
        $resourceLimit5
            ->setHousehold('1')
            ->setResource('19803')
            ->setIsIleDeFrance(true);
        $manager->persist($resourceLimit5);

        $resourceLimit6 = new ResourceLimit();
        $resourceLimit6
            ->setHousehold('2')
            ->setResource('29066')
            ->setIsIleDeFrance(true);
        $manager->persist($resourceLimit6);

        $resourceLimit7 = new ResourceLimit();
        $resourceLimit7
            ->setHousehold('3')
            ->setResource('34906')
            ->setIsIleDeFrance(true);
        $manager->persist($resourceLimit7);

        $resourceLimit8 = new ResourceLimit();
        $resourceLimit8
            ->setHousehold('4')
            ->setResource('40758')
            ->setIsIleDeFrance(true);
        $manager->persist($resourceLimit8);

        $resourceLimit9 = new ResourceLimit();
        $resourceLimit9
            ->setHousehold('5')
            ->setResource('46630')
            ->setIsIleDeFrance(true);
        $manager->persist($resourceLimit9);

        // Loft Type
        $loftType1 = new LoftType();
        $loftType1->setLabel('Maison');
        $manager->persist($loftType1);

        $loftType2 = new LoftType();
        $loftType2->setLabel('Appartement');
        $manager->persist($loftType2);


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
