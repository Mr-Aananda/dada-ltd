<?php
namespace App\Exports;

use App\Models\Production;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class ProductionExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $production;

    public function __construct(Production $production)
    {
        $this->production = $production;
    }

    public function collection()
    {
        return collect([$this->production]); // Return a collection with a single production entry
    }

    public function headings(): array
    {
        return [
            ['Production Details'],
            ['PS#', $this->production->ps],
            ['PS Date', $this->production->ps_date],
            ['SST10', $this->production->sst10],
            ['Style', $this->production->style],
            ['Buyer PO#', $this->production->buyer_po],
            ['Buyer', $this->production->buyer],
            ['S/D', $this->production->sd_date],
            ['Quantity', $this->production->qty],
            ['Cap Item', $this->production->cap_item],
            ['Ship Via', $this->production->ship_via],
            ['Destination', $this->production->dest],
            ['Final Destination', $this->production->final_dest],
            ['Embroidered', $this->production->embo],
            ['Washing', $this->production->washing],
            ['C/Pattern', $this->production->c_pattern],
            ['V/Pattern', $this->production->v_pattern],
            ['C/Cutter', $this->production->c_cutter],
            ['V/Cutter', $this->production->v_cutter],
            ['Eyelet Number', $this->production->eyelet_number],
            ['Eyelet Color', $this->production->eyelet_color],
            ['Eyelet Position', $this->production->eyelet_position],
            ['Visor 6', $this->production->visor_6],
            ['Visor 1.5', $this->production->visor_1_5],
            ['Visor 0.5', $this->production->visor_0_5],
            ['F/Mold', $this->production->f_mold],
            ['B/Mold', $this->production->b_mold],
            ['Extra Stitch', $this->production->extra_stitch],
            ['Packing', $this->production->packing],
            ['Row', $this->production->row],
            ['CM from Front End', $this->production->cm_from_front_end],
        ];
    }

    public function map($production): array
    {
        return []; // No need to map here since we handle it in the headings.
    }

    public function styles(Worksheet $sheet)
    {
        // Apply bold styling to the first column
        $sheet->getStyle('A1:A1')->getFont()->setBold(true);

        // Bold all the header labels
        foreach (range(2, 31) as $row) {
            $sheet->getStyle("A{$row}")->getFont()->setBold(true);
        }

        // Add image to the worksheet if available
        $imagePath = storage_path('app/public/' . $this->production->image); // Get the full path to the image in storage

        if (file_exists($imagePath)) { // Check if the file exists
            $drawing = new Drawing();
            $drawing->setName('Production Image');
            $drawing->setDescription('Image of Production');
            $drawing->setPath($imagePath); // Use the full path to the image
            $drawing->setCoordinates('D15'); // Set to D15 for middle right positioning
            $drawing->setHeight(100); // Set the height of the image (optional)
            $drawing->setWorksheet($sheet);
        } else {
            // Optionally handle the case where the image is not found
            $sheet->setCellValue('D30', 'Image not found'); // Notify in the sheet where the image would be
        }
    }


}




