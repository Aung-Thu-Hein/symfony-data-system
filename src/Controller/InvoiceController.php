<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Repository\InvoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InvoiceController extends AbstractController
{
    #[Route('/invoice', name: 'app_invoice')]
    public function index(): Response
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
        ]);
    }

    // Test updated_at column has been changed or not
    #[Route('/invoice/update', name: 'app_invoice_update')]
    public function update(InvoiceRepository $invoiceRepository)
    {
        $invoice = $invoiceRepository->updateInvoiceName(1, 'Inovice one is updated');
        dd($invoice);
    }

    // Test deleted_at column has been changed or not
    #[Route('/invoice/delete', name: 'app_invoice_delete')]
    public function delete(InvoiceRepository $invoiceRepository)
    {
        $invoice = $invoiceRepository->deleteInvoice(2);
        dd($invoice);
    }
}
