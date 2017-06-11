<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Session;
use Mail;

class EmailController extends Controller
{
    public function noCacheVista($contents)
    {
        $response = Response::make($contents, 200);
        $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $response->header('Pragma', 'no-cache');

        return $response;
    }

    public function contacto(Request $request)
    {

        $contents = view('index.contact');

        return $this->noCacheVista($contents);
    }

    public function contactenos(Request $request)
    {
        Mail::send('email.emailcontacto',$request->all(),function($msg){
            $msg->from('correos@atleticonortefc.org', 'Contactenos');
            $msg->subject('Correo Contactenos');
            $msg->to('info@atleticonortefc.org');
        });
        Session::flash('success', 'El mensaje a sido enviado.');

        return redirect()->back();
    }

    public function excusas(Request $request)
    {

        $contents = view('index.excusas');

        return $this->noCacheVista($contents);
    }

    public function emailExcusas(Request $request)
    {
        Mail::send('email.emailexcusas',$request->all(),function($msg){
            $msg->from('correos@atleticonortefc.org', 'Excusas');
            $msg->subject('Excusa');
            $msg->to('excusas@atleticonortefc.org');
        });
        Session::flash('success', 'El mensaje a sido enviado.');

        return redirect()->back();
    }
}
