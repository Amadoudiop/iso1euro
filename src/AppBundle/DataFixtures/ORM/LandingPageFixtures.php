<?php

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\LandingPage;
use AppBundle\Entity\Seo;

 /**
 * Class LoadData
 * @package AppBundle\DataFixtures\ORM
 */
class LandingPageFixtures extends Fixture
{
    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $landingPage = new LandingPage();
        $landingPage
            ->setHeaderTitle('ISO1EURO.FR')
            ->setHeaderSubtitle('Votre isolation à 1euro en quelque clic')
            ->setHeaderButton('TESTER VOTRE ELIGIBILITÉ')

            ->setFirstTitle('QUI SOMMES NOUS ?')
            ->setFirstDescription('La certification dont Sarl Verteck 3E fait l’objet vous permettra de bénéficier de l’éco-PTZ et du crédit d’impôt pour vos travaux de rénovation énergétique. De plus, ces dispositifs sont pleinement compatibles avec les primes énergies, de quoi alléger encore plus la facture de vos travaux ! VERTECK 3E est une société spécialisée dans le domaine de la rénovation de l’habitat et des énergies renouvelables. Notre solide expérience nous permet de mener à bien votre projet. Développement durable et respect de l’environnement sont des valeurs primordiales pour notre société. C’est pourquoi nous sélectionnons pour vous les meilleurs produits, tous de hautes qualités et respectueuses des normes européennes. Nous revendiquons une participation plus active auprès des particuliers et fait bénéficier d’un contact professionnel de proximité à ses clients. C’est, à chaque fois, la garantie d’une adaptation parfaite aux caractéristiques de votre habitation, à son style, à vos besoins, à vos goûts et à votre budget. Pour vous aider dans votre choix, notre technicien-conseil vient chez vous gratuitement pour vous conseiller. Nous sommes en partenariat avec des professionnels de l’isolation de combles, reconnu garant de l’environnement (RGE). Nous utilisons une méthode de soufflage au sol de laine minérale. Cet isolant est performant et écologique à 98% (mélange de sable et de verre. ')
            ->setFirstButton('TESTER VOTRE ELIGIBILITÉ')

            ->setSecondTitle('L’ISOLATION, OUI MAIS LAQUELLE ?')
            ->setSecondDescription('L’ISOLATION À 1€* NE PEUT SE PRATIQUER QUE SUR LES COMBLES PERDU À la suite de la loi POPE (loi de Programmation fixant les Orientations de la Politique Energétique) qui a pour objectif principal de faire des économies d\'énergies et de lutter contre la précarité énergétique. En France, le programme isolation à 1 euro est lancé pour soutenir de façon pertinente la rénovation énergétique. Ce plan de solidarité étatique correspond aux besoins de millions de foyers français désireux d’entreprendre des travaux de d’amélioration énergétique sur leur logement. Il s’agit d’une solution efficace et à moindre coût.')
            ->setSecondButton('TESTER VOTRE ELIGIBILITÉ')

            ->setThirdTitle('LES CONDITIONS D’ÉLIGIBILITÉ')
            ->setThirdDescription('Notre programme d\'isolation est adressé aux particuliers propriétaires et locataires à faibles ressources. Il est destiné aux habitations achevées depuis plus de 2 ans, situées sur le territoire français et ayant des combles perdus. Nous vous garantissons des travaux de qualité avec des artisans partenaires certifiés RGE, des isolant avec une forte résistance thermique supérieure à 7, une technique de soufflage pour une isolation optimale. Une isolation performante pour réduire jusqu’à 30% votre facture de chauffage !')
            ->setThirdButton('TESTER VOTRE ELIGIBILITÉ')

            ->setFourthTitle('COMMENT ÇA MARCHE ?')
            ->setFourthDescription('Le but étant de renforcer son indépendance énergétique en équilibrant mieux ses différentes sources d’approvisionnement. L\'isolation fait partie des travaux indispensables à l\'amélioration thermique des bâtiments. Chaque énergéticien est obligé de racheter à des particuliers les factures de travaux d\'économie d\'énergie en leur versant une prime appelée CEE (Contribution Energie Climat). Le dispositif agréé par L\'État a été défini par la loi adoptée à l’été 2015, relative à la transition énergétique pour la croissance verte ainsi que tous les plans d’action permettant à la France de contribuer plus efficacement à la lutte contre le dérèglement climatique. Via le dispositif des Certificats d’Economie d’énergie de la lois TRE, 12M de Français, peuvent bénéficier de se programme d’isolation à 1euro. Iso-1euro.fr by V3E, permet en ligne et en toute simplicité de réaliser votre demande de prise en charge, un conseiller vous recontacte immédiatement pour faire le points et prendre rdv pour les travaux. Tout l’aspect administratif est totalement gérer. Il vous reste plus qu’a profiter de votre confort.')
            ->setFourthButton('TESTER VOTRE ELIGIBILITÉ')

            ->setFifthTitle('TESTER VOTRE ELIGIBILITÉ')
            ->setFifthDescription('La certification dont Sarl Verteck 3E fait l’objet vous permettra de bénéficier de l’éco-PTZ et du crédit d’impôt pour vos travaux de rénovation énergétique. De plus, ces dispositifs sont pleinement compatibles avec les primes énergies, de quoi alléger encore plus la facture de vos travaux ! VERTECK 3E est une société spécialisée dans le domaine de la rénovation de l’habitat et des énergies renouvelables. Notre solide expérience nous permet de mener à bien votre projet. Développement durable et respect de l’environnement sont des valeurs primordiales pour notre société. C’est pourquoi nous sélectionnons pour vous les meilleurs produits, tous de hautes qualités et respectueuses des normes européennes. Nous revendiquons une participation plus active auprès des particuliers et fait bénéficier d’un contact professionnel de proximité à ses clients. C’est, à chaque fois, la garantie d’une adaptation parfaite aux caractéristiques de votre habitation, à son style, à vos besoins, à vos goûts et à votre budget. Pour vous aider dans votre choix, notre technicien-conseil vient chez vous gratuitement pour vous conseiller. Nous sommes en partenariat avec des professionnels de l’isolation de combles, reconnu garant de l’environnement (RGE). Nous utilisons une méthode de soufflage au sol de laine minérale. Cet isolant est performant et écologique à 98% (mélange de sable et de verre. ');

        $manager->persist($landingPage);


        $seo = new Seo();
        $seo
            ->setTitle('iso1euro')
            ->setMetaAuthor('')
            ->setMetaDescription('meta description');
        $manager->persist($seo);


        $manager->flush();
    }
    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
