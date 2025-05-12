<?php

namespace App\Repository;

use App\Entity\Invoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Invoice>
 */
class InvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invoice::class);
    }
    public function updateInvoiceName(int $id, string $name): ?Invoice
    {
        $entityManager = $this->getEntityManager();

        $invoice = $this->find($id);
        if(!$invoice){
            return null;
        }

        $invoice->setName($name);

        $entityManager->persist($invoice);
        $entityManager->flush();

        return $invoice;
    }

    public function deleteInvoice(int $id): ?Invoice
    {
        $entityManager = $this->getEntityManager();

        $invoice = $this->find($id);
        if(!$invoice){
            return null;
        }

        $invoice->setDeletedAt(new \DateTime('now'));
        $entityManager->persist($invoice);
        $entityManager->flush();

        return $invoice;
    }
}
