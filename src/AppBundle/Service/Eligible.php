<?php
/**
 * Created by PhpStorm.
 * User: creemson
 * Date: 04/11/17
 * Time: 12:05
 */
namespace AppBundle\Service;

class Eligible
{


    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }





    //https://geo.api.gouv.fr/communes?codePostal=93000

    public function getCodeRegionFromApi($zipCode)
    {
        //$research = str_replace(' ', '%', $research);
        //$research = str_replace('q=', '', $research);

        //$api_key = $this->getParameter('api_key');

        $url = "https://geo.api.gouv.fr/communes?codePostal=".urlencode($zipCode);

        $result = file_get_contents($url);
        $result = json_decode($result, true);

        return (empty($result[0]['codeRegion'])) ? '': $result[0]['codeRegion'];
    }





    public function calculation($prospect)
    {
        $codeRegion = $this->getCodeRegionFromApi($prospect->getZipCode());
        if($codeRegion == ''){
            return [
                'status' =>'error',
                'message' => 'le code région n\'est pas conforme'
            ];
        }
        elseif($codeRegion == 11){
            $isIleDeFrance = true;
        }else{
            $isIleDeFrance = false;
        }

        $query =  $this->em->getRepository('AppBundle:ResourceLimit')
            ->createQueryBuilder('r')
            ->where('r.isIleDeFrance = :isIleDeFrance')
            ->andWhere('r.resource >= :resource')
            ->setParameters([
                'isIleDeFrance'=> $isIleDeFrance,
                'resource' => (int)$prospect->getIncomeTaxReference()
            ])
            ->orderBy('r.resource', 'ASC')
            ->setMaxResults(1)
            ->getQuery();

        //dump($query);die;
        $resourceLimit = $query->getResult();


        if(isset($resourceLimit[0])){
            $result = [
                'status' =>'eligible',
                'message' => 'Vous etes élibigle'
            ];
        }else{
            $result = [
                'status' =>'notEligible',
                'message' => 'Vous n\'etes éligible'
            ];
        }

        return $result;
    }
}