<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\System\Facturacion\Facturacion;
use App\Models\ConfigApp;

class PDFController extends Controller
{
    use Facturacion;

    public function reportePDF(Request $request)
    {

        $data = [
            'datos' => $this->diasDelMes($request->mes, $request->anio, $request->busqueda),
            'finales' => $this->getDataPerMonth($request->anio, $request->mes, $request->busqueda),
            'eliminadas' => $this->facturasEliminadas($request->anio, $request->mes, $request->busqueda),
            'generales' => ConfigApp::where('id', 1)->first()
        ]; 

        $pdf = PDF::loadView('pdf.reporte-mensual-es', $data);
        $pdf->setPaper('A4', 'landscape');
     
        return $pdf->download(date('d-m-Y') . '.pdf');
    }
}
