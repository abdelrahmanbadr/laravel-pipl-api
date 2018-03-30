<?php

namespace Abdelrahman_badr\Pipl;
use Exception;
class Pipl 
{

    public $key ;
    public $base_url ;
    public function __construct()
    {
        $this->key = env('PIPL_API_KEY');
        $this->url = "http://api.pipl.com/search/?&key=".$this->key;
    }
 
    public function search(array $array_of_feilds)
    {
        if(empty($array_of_feilds)){
            $error = "search function parameter can't be empty";
            throw new Exception($error);
        }
        $url = "";
        foreach($array_of_feilds as$key=> $value){
            $url = "$url&$key=$value"; 

        }
        $this->url =$this->url. $url;
        return $this->piplSearch();
      

    }
    private function piplSearch()
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL,  $this->url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
        $result = json_decode((string)$output);
        return $result;
        
    }

}
