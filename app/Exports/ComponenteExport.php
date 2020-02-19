<?php

namespace App\Exports;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Excel;

class ComponenteExport implements FromView, Responsable, ShouldAutoSize
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     //
    // }
    use Exportable;
    // private $fileName='invoices.pdf';
    /**
    * Optional Writer Type
    */
    // private $writerType = Excel::DOMPDF;

    /**
    * Optional headers
    */
    // private $headers = [
    //     'Content-Type' => 'text/pdf',
    // ];
    private $plantas;
    private $sistemas;
    private $equipos;
    private $componente;
    private $id;
    public function __construct($plantas,$sistemas,$equipos,$componente,$id)
    {
        $this->plantas = $plantas;
        $this->sistemas = $sistemas;
        $this->equipos = $equipos;
        $this->componente = $componente;
        $this->id = $id;
    }
    public function view(): View
    {
        return view('admin.componente.export',['plantas'=>$this->plantas,'sistemas'=>$this->sistemas,'equipos'=>$this->equipos,'componente'=>$this->componente,'id'=>$this->id]);
    }
}
