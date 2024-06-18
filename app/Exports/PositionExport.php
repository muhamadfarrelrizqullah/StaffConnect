<?php

namespace App\Exports;

use App\Models\Position;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PositionExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize 
{
    public function collection()
    {
        return Position::all(['id', 'title', 'level', 'description']);
    }

    public function headings(): array
    {
        return ['ID', 'Position Title', 'Position Level', 'Description'];
    }

    public function styles(Worksheet $sheet)
    {
        $rowCount = $this->collection()->count() + 1; 
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => '6200EE'], 
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
        if ($rowCount > 1) {
            $range = 'A2:D' . $rowCount;
            $sheet->getStyle($range)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);
        }
        return $sheet;
    }
}
