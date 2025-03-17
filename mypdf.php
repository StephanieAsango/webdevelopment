<?php

// Using FPDF to create a PDP
require('fpdf/fpdf.php');

// create a PDF class extending FPDF
class mypdf extends FPDF{
    // page header
    function header() {
        // logo
        // $this->image ('logo.png'/10,6,30);

        // arial bold 15
        $this->setfont ('Arial','B',15);

        // move to the right 
        $this->cell(80);

        // title
        $this->cell(30,10,'company report',0,0,'C');

        // line break
        $this->ln(20); 
    }

    // page footer
    function footer(){
        // position at 1.5 com from bottom 
        $this->setY(-1.5);

        // arial italic 8
        $this->setfont ('Arial', 'I',8);

        // page number 
        $this->cell(0,10,'page'. $this->pageno());
    }
}
// generate  A PDF document 
function generatePDF($title,$content,$filename='document.pdf'){
    // create a new PDF instance
    $pdf=new mypdf();

    // set document information
    $pdf->SetAuthor('PHP system');
    $pdf->SetTitle($title);

    // set auto page break 
    $pdf->Addpage ();

    // set font
    $pdf->Write(10,$content);

    // output the PDF 
    $pdf->Output($filename,'D');//'D' means download
} 

// example usage 
$title="volt verse";
$content= "this is a sample PDF generated using FPDF libary in PHP./n/n";
$content .= "it demostrates how to create dynamic PDF files from PHP applications";

// call the function to generate and download the PDF
// generatePDF($title,$content,"pop.pdf"); 


// Creating a more complex PDF with tables

function generateInvoicePDF($invoice_data){
    $pdf = new MyPDF();
    $pdf->AliasNbPages(); //For page numbers
    $pdf->AddPage();

    // Add invoice header
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'INVOICE', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Invoice #'. $invoice_data['invoice_number'], 0, 1);
    $pdf->Cell(0, 10, 'Date :'. $invoice_data['date'], 0, 1);
    $pdf->Cell(0, 10, 'Due date :'. $invoice_data['due_date'], 0, 1);

    // Add customer information
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(0, 10, 'Bill To:', 0, 1, 'C');
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(0, 10, $invoice_data['customer']['name'], 0, 1);
    $pdf->Cell(0, 10, $invoice_data['customer']['address'], 0, 1);
    $pdf->Cell(0, 10, $invoice_data['customer']['city'] . ', '.$invoice_data['customer']['state'] . ' '. $invoice_data['customer']['zip'] , 0, 1);

    // Add items table
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);

    // Table header
    $pdf->Cell(90, 10, 'Description', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Price', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Total', 1, 1, 'C');

    // /Table data 
    $total_amount = 0;
    foreach ($invoice_data['items'] as $item){
        $total = $item['quantity'] * $item['price'];
        $total_amount += $total;

        $pdf->Cell(90,10,$item['description'], 1, 0);
        $pdf->Cell(30,10,$item['quantity'], 1, 0, 'C');
        $pdf->Cell(30,10, 'Ksh' . number_format($item['price'], 2), 1, 0,'R');
        $pdf->Cell(40,10, 'Ksh' . number_format($total, 2), 1, 1, 'R');

    }

    // Total
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(150, 10, 'Total Amount:', 1, 0, 'R');
    $pdf->Cell(40, 10, 'Ksh' . number_format($total_amount, 2), 1, 1, 'R');

    // Output the pdf
    $pdf->Output('Invoice_' . $invoice_data['invoice_number'] . '.pdf', 'D');

}

// Sample data
$invoice_data = [
    'invoice_number'=> 12345,
    'date'=>date('Y-m-d'), //Curent date
    'due_date'=>date('Y-m-d', strtotime('+30 days')), //30days
    'customer'=>[
        'name'=>'Stephanie',
        'address'=> '123 main Street',
        'city'=> 'Anytown',
        'state'=> 'CA',
        'zip'=> '12345'
    ],
    'items'=>[
        [
        'description'=> 'Product 1',
        'quantity'=> 2,
        'price'=> 1999
        ],
        [
        'description'=> 'Product 2',
        'quantity'=> 1,
        'price'=> 2999
        ],
        [
        'description'=> 'Product 3',
        'quantity'=> 4,
        'price'=> 20090
        ]
        
    ]];

generateInvoicePDF($invoice_data);