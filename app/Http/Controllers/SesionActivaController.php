<?php

namespace App\Http\Controllers;

use App\SesionesActivas;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SesionActivaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($userid)
    {
        // Guarda en la variable $codsesion un codigo aleatorio de 8 caracteres alfanumericos
        $codsesion = str_random(8);
        Session::put('codigosesion', $codsesion);

        $sesion = new SesionesActivas();
        $sesion->user_id = $userid;
        $sesion->ip = $this->getIp();
        $sesion->so = $this->getSistemaOperativo();
        $sesion->navegador = $this->getBrowserVersion();
        $sesion->codigosesion = $codsesion;
        $sesion->save();
    }

    /**
     * Remove the specified resource from storage.     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codsesion)
    {
        if(isset($codsesion)) {
            $seactiva = SesionesActivas::where('codigosesion', '=', $codsesion)->first();
            if(isset($seactiva)) {
                $seactiva->delete();
            }
        }
    }

    /**
     * Destruye todas las sesiones del usuario que inicia sesion
     */
    public function allDestroy($userid)
    {
        $allsesion = SesionesActivas::where('user_id','=',$userid)->get();

        foreach($allsesion as $sesion){
            $sesion->delete();
        }
    }

    /**
     * Funcion que verifica si el codigo dado se encuentra en la tabla de sesiones_activas
     * @param $codsesion
     * @return bool
     */
    public function isCodigoSesion($codsesion)
    {
        $seactiva = SesionesActivas::where('codigosesion','=',$codsesion)->get();

        return (count($seactiva) > 0)? true : false ;
    }

    public function allSession(){
        $sesiones = SesionesActivas::where('user_id', '=', Auth::user()->id)->orderBy('created_at','desc')->paginate(20);
        return $sesiones;
    }

    function getLocalizacion($ip)
    {

        $geoPlugin_array = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip) );

        return $geoPlugin_array;

        /*
         Variables que contendra el array $geoPlugin_array

        'geoplugin_request'
        'geoplugin_status'
        'geoplugin_credit'
        'geoplugin_city'
        'geoplugin_region'
        'geoplugin_areaCode'
        'geoplugin_dmaCode'
        'geoplugin_countryCode'
        'geoplugin_countryName'
        'geoplugin_continentCode'
        'geoplugin_latitude'
        'geoplugin_longitude'
        'geoplugin_regionCode'
        'geoplugin_regionName'
        'geoplugin_currencyCode'
        'geoplugin_currencySymbol'
        'geoplugin_currencySymbol_UTF8'
        'geoplugin_currencyConverter'
         */
    }

    //muestra la ip real
    function getIp()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }
    }

    function getSistemaOperativo()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $plataformas = array(
            'Windows 10' => 'Windows NT 10.0+',
            'Windows 8.1' => 'Windows NT 6.3+',
            'Windows 8' => 'Windows NT 6.2+',
            'Windows 7' => 'Windows NT 6.1+',
            'Windows Vista' => 'Windows NT 6.0+',
            'Windows XP' => 'Windows NT 5.1+',
            'Windows 2003' => 'Windows NT 5.2+',
            'Windows' => 'Windows otros',
            'iPhone' => 'iPhone',
            'iPad' => 'iPad',
            'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
            'Mac otros' => 'Macintosh',
            'Android' => 'Android',
            'BlackBerry' => 'BlackBerry',
            'Linux' => 'Linux',
        );
        foreach($plataformas as $plataforma=>$pattern){
            if (preg_match('/'.$pattern.'/i', $user_agent ))
                return $plataforma;
        }
        return '----';
    }

    function getBrowserVersion()
    {
        $browserversion = '----';

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $browser = array(
            'Safari' => 'Safari',
            'Internet explorer' => 'MSIE',
            'Microsoft Edge' => 'Edge',
            'Mozilla Firefox' => 'Firefox',
            'Opera' => 'Opera',
            'Opera Mobi' => 'Opera Mobi',
            'Opera Mini' => 'Opera Mini',
            'Netscape' => 'Netscape',
            'Google Chrome' => 'Chrome',
            'Google Plus' => 'ChromePlus',
            'OPERA' => 'OPR',
            'Comodo Dragon' => 'Comodo_Dragon',
            'Conkeror' => 'Conkeror',
            'Maxthon' => 'Maxthon',
            'SeaMonkey' => 'SeaMonkey',
        );

        foreach($browser as $browse=>$pattern) {
            $s = strpos($user_agent, $pattern);
            $f = $s + strlen($pattern);
            $version = substr($user_agent, $f, 8);
            $version = preg_replace('/[^0-9,.]/','',$version);
            if ($s) {
                $browserversion = $browse.' '.$version;
            }
        }

        return $browserversion;
    }
}
