<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport implements FromArray, WithHeadings, WithStyles, WithTitle
{
    protected string $title;
    protected array $headings;
    protected $rows;
    public function __construct(string $title, array $headings, $rows)
    {
        $this->title = $title;
        $this->headings = $headings;
        $this->rows = $rows;
    }
    public function array(): array
    {
        return collect($this->rows)->map(fn($row) => is_array($row) ? $row : $row->toArray())->values()->toArray();
    }
    public function headings(): array
    {
        return $this->headings;
    }
    public function title(): string
    {
        return substr(preg_replace('/[^A-Za-z0-9 ]/', '', $this->title), 0, 31);
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray(['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'],], 'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '111827'],],]);
        foreach (range('A', $sheet->getHighestColumn()) as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
        return [];
    }
}
