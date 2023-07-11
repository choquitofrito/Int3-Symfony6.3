<?php

namespace App\DataFixtures;

use App\Entity\UserJob;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use League\Csv\Reader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ImporterCSVFixtures extends Fixture {

    public function load(ObjectManager $manager)
    {
        $csv = Reader::createFromPath('%kernel.root_dir%/../src/DataFixtures/csv/art-transparency-data.csv');
        $csv->setHeaderOffset(0);
        $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords();

        foreach ($records as $record) {
            $record['startingSalary'] = (float)$record['startingSalary'];
            $record['endingSalary'] = (float)$record['endingSalary'];
            $record['yearStartingSalary'] = (int)$record['yearStartingSalary'];
            $record['yearEndingSalary'] = (int)$record['yearEndingSalary'];
            $record['yearsExperience'] = (int)$record['yearsExperience'];

            

            $obj = new UserJob($record);
            $manager->persist($obj);
        }
        $manager->flush();

    }
}