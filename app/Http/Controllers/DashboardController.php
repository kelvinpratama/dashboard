<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\DataTable;
use App\Exports\DataExports;
use App\Exports\ExportFromView;
use App\Exports\ExportTable;
use App\Exports\ExportAll;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Maatwebsite\Excel\Exporter;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\VarDumper\Cloner\Data;
use JavaScript;
use PDF;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role =="admin"){
            $transactiontotal=count(DB::select('select * from client_VDI_vMobeyTransactions_v1'));
            $transactionsalesonly= count(DB::select('select * from client_VDI_vMobeyTransactions_v1 where response_code = 0 and authorisation_response_code = 00'));
            $transactionfailonly= count(DB::select('select * from client_VDI_vMobeyTransactions_v1 where response_code !=0 and authorisation_response_code != 00'));
            return view('dashboard',compact('transactiontotal','transactionfailonly','transactionsalesonly'));
        }
        else{
            $tempmid = Auth::user()->mid;
        $transactiontotal=DB::table('client_VDI_vMobeyTransactions_v1')
        ->select('*')
        ->where('mid','=',$tempmid)
        ->count();
        $transactionsalesonly= DB::table('client_VDI_vMobeyTransactions_v1')
        ->select('*')
        ->where('response_code' ,'=', 0)
        ->where('authorisation_response_code','=', 00)
            ->where('mid','=',$tempmid)
        ->count();
        $transactionfailonly= DB::table('client_VDI_vMobeyTransactions_v1')
            ->select('*')
            ->where('response_code' ,'!=', 0)
            ->where('authorisation_response_code','!=', 00)
            ->where('mid','=',$tempmid)
            ->count();;
        return view('dashboard',compact('transactiontotal','transactionfailonly','transactionsalesonly','time'));
        }
    }

    public function profile()
    {
        $role = Auth::user()->role;
        $email = Auth::user()->email;

        if( $role == 'merchant')
        {
            $MID = DB::table('dm_user_details')
                ->where('email',$email)
                ->value('MID');

            return view('profile',compact('MID','email'));
        }

        return view('profile', compact('email'));
    }


    function showTransaction(){
        if(Auth::user()->role == "admin"){
            $transaction=DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->get();
            return view('alltransaction',compact('transaction'));
        }
        else{
            $transaction=DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->where('mid','=',Auth::user()->mid)
                ->get();
            return view('alltransaction',compact ('transaction'));
        }

    }
    function showSalesOnly(){
        $tempmid = Auth::user()->mid;
        if(Auth::user()->role == "admin"){
            $transaction=DB::select('select * from client_VDI_vMobeyTransactions_v1 where response_code = 0 and authorisation_response_code = 00');
            return view('salesonly',compact('transaction'));
        }
        else{

            $transaction=DB::table('client_VDI_vMobeyTransactions_v1')
            ->select('*')
            ->where('response_code', '=' ,0)
            ->where('authorisation_response_code','=',00)
                ->where('mid','=',$tempmid)
            ->get();
            return view('salesonly',compact('transaction'));
        }

    }
    function showFailureOnly(){
        $tempmid = Auth::user()->mid;
        if(Auth::user()->role =="admin"){

            $transaction=DB::select('select * from client_VDI_vMobeyTransactions_v1 where response_code !=0 and authorisation_response_code != 00');
            return view('failtransaction',compact('transaction'));
        }
        else{

                $transaction=DB::table('client_VDI_vMobeyTransactions_v1')
                    ->select('*')
                    ->where('response_code', '!=' ,0)
                    ->where('authorisation_response_code','!=',00)
                    ->where('mid','=',$tempmid)
                    ->get();
            return view('failtransaction',compact('transaction'));
        }

    }

    private $excel;

    public function __construct(Exporter $excel)
    {
        $this->excel = $excel;
    }
    function exportToExcelAll(){
        return (new ExportAll())->download('All.xls');
    }
    function exportToExcelAllcsv(){
        return (new ExportAll())->download('All.csv');
    }
    function exportToExcel(){
//   return Excel::download(new ExportTable(0,00),'testa.xls');
        return (new ExportTable())->conditionstotake('0','=','00','=')->download('Sales.xls');
    }
    function exportToExcelcsv(){
        return (new ExportTable())->conditionstotake('0','=','00','=')->download('Sales.csv');
    }
    public $response;
    function exportToExcelError(){
//    $this->response = 0;
//        return (new ExportTable('$this->response!=0'))->download('testerror.xls');
        return (new ExportTable())->conditionstotake('0','!=','00','!=')->download('Error.xls');
    }
    function exportToExcelErrorcsv(){
        return (new ExportTable())->conditionstotake('0','!=','00','!=')->download('Error.csv');
    }
    function exportToPDF()
    {
        if(Auth::user()->role =="admin"){
            $transaction = DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->orderBy('transmission_date_time','asc')
                ->get();
            $pdf = PDF::loadview('pdf', compact('transaction'));
            return $pdf->download('alltransaction.pdf');
        }
        else{
            $transaction = DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->where('mid','=',Auth::user()->mid)
                ->orderBy('transmission_date_time','asc')
                ->get();
            $pdf = PDF::loadview('pdf',compact('transaction'));
            return $pdf->download('alltransaction.pdf');
        }
    }
    function exportToPDFfail(){
        if(Auth::user()->role =="admin"){
            $transaction = DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->where('response_code', '!=' ,0)
                ->where('authorisation_response_code','!=',00)
                ->orderBy('transmission_date_time','asc')
                ->get();
            $pdf = PDF::loadview('pdf', compact('transaction'));
            return $pdf->download('failtransaction.pdf');
        }
        else{
            $transaction = DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->where('response_code', '!=' ,0)
                ->where('authorisation_response_code','!=',00)
                ->where('mid','=',Auth::user()->mid)
                ->orderBy('transmission_date_time','asc')
                ->get();
            $pdf = PDF::loadview('pdf',compact('transaction'));
            return $pdf->download('failtransaction.pdf');
        }
    }
    function exportToPDFsuccess(){
        if(Auth::user()->role =="admin"){
            $transaction = DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->where('response_code', '=' ,0)
                ->where('authorisation_response_code','=',00)
                ->orderBy('transmission_date_time','asc')
                ->get();
            $pdf = PDF::loadview('pdf', compact('transaction'));
            return $pdf->download('successtransaction.pdf');
        }
        else{
            $transaction = DB::table('client_VDI_vMobeyTransactions_v1')
                ->select('*')
                ->where('response_code', '=' ,0)
                ->where('authorisation_response_code','=',00)
                ->where('mid','=',Auth::user()->mid)
                ->orderBy('transmission_date_time','asc')
                ->get();
            $pdf = PDF::loadview('pdf',compact('transaction'));
            return $pdf->download('successtransaction.pdf');
        }
    }
}
