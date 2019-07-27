<?php
namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use Request;
use App\Helpers\CMS;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Updater extends Controller
{
  public function check()
  {
    if(CMS::fuseRights('updater')){
        $url="http://layne.cf/goldfish/updates/laraupdater.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result, true);
        if (version_compare(config('app.version_number'),$json['version'],'!=')) {
            return $json['version'];
        }
        return null;
    }
    else {
      return null;
    }
  }
  public function update() {
    if(CMS::fuseRights('updater')){
        $url="http://layne.cf/goldfish/updates/laraupdater.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result, true);
        if (version_compare(config('app.version_number'),$json['version'],'!=')) {
            $data = shell_exec( '(cd '. base_path() .' && git pull origin master)' );
            return $data;
        }
    }
    else {
        return null;
      }
  }
}