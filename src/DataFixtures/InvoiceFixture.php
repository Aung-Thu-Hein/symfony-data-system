<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InvoiceFixture extends Fixture
{

    // TEST::inserting data to invoices table
    public function load(ObjectManager $manager): void
    {
        $invoice1 = new Invoice();
        $invoice1->setName('Invoice 1');

        $invoice2 = new Invoice();
        $invoice2->setName('Invoice 2');

        $manager->persist($invoice1);
        $manager->persist($invoice2);
        $manager->flush();
    }
}
