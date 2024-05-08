<?php
ob_start();
session_start(); 
error_reporting(0);
date_default_timezone_set('Africa/Kampala');
$dtime = date("Y-m-d H:i:s A", time());
$now = date("Y-m-d H:i:s", time());
$strtime = date("d-m-Y h:i:s A", time());
$today = date("Y-m-d");
defined ("APP_DIR") or define("APP_DIR","");
defined ("DB_URL") or define("DB_URL", $_SERVER['HTTP_HOST']);
defined ("DS") or define("DS", DIRECTORY_SEPARATOR);
defined ("BASE_URL") or define("BASE_URL", $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']);
switch(DB_URL){
	case 'localhost':
		defined ("DB_SERVER") or define("DB_SERVER", "localhost");
		defined ("DB_USER") or define("DB_USER", "root");
		defined ("DB_PASS") or define("DB_PASS", "");
		defined ("DB_NAME") or define("DB_NAME", "career_app");
		defined ("SITE_URL") or define("SITE_URL", 'http://localhost/career-app');
		defined ("HOME_URL") or define("HOME_URL", 'http://localhost/career-app/dash');
	break;
	case 'production': 
		defined ("DB_SERVER") or define("DB_SERVER", "");
		defined ("DB_USER") or define("DB_USER", "");
		defined ("DB_PASS") or define("DB_PASS", "");
		defined ("DB_NAME") or define("DB_NAME", "");
		defined ("SITE_URL") or define("SITE_URL", "");
	break; 
	default: 
		defined ("DB_SERVER") or define("DB_SERVER", "localhost");
		defined ("DB_USER") or define("DB_USER", "root");
		defined ("DB_PASS") or define("DB_PASS", "");
		defined ("DB_NAME") or define("DB_NAME", "career_app");
		defined ("SITE_URL") or define("SITE_URL", 'http://localhost/career-app');
		defined ("HOME_URL") or define("HOME_URL", 'http://localhost/career-app/dash');
}

 try{
	$dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true)); 
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch(PDOException $e) {
	echo $e->getMessage(); 
}

function getUploadUrl($file){
	return "uploads/".$file;
}

function redirect_page($url)
{
	header("Location: {$url}");
	exit;
}

function log_message($msg=NULL){
	if(!empty($msg)){
		$_SESSION['msg'] = $msg;
	}else{
		$val = $_SESSION['msg'];
		$_SESSION['msg'] = '';
		return $val;
	}
}

function Batch($numAlpha=8,$numNonAlpha=2){
   $listAlpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   return str_shuffle(
      substr(str_shuffle($listAlpha),0,$numAlpha)
    );
}
function getCode(){

	//$st = Batch($num=5,$alt=2);
	$st = rand(1000000,99999999);

	return $st;

}

function process_curl($data){
	global $api_url;
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => $api_url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => json_encode($data),
	  CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
	));

	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}

function getWeek(){
	$result = date('Y-m-d',strtotime("-7 days"));
	return $result;
}

function monthly(){
	$result = date('Y-m-d',strtotime("-30 days"));
	return $result;
}

// get monthy dates 
function getMonth(){
	$result = date('Y-m-d',strtotime("+30 days"));
	return $result;
}

// calcuate extra days 

function getExtra(){
	$result = date('Y-m-d',strtotime("+33 days"));
	return $result;
}

// calcuate new date 
function get_next($day){
	$result = date('Y-m-d', strtotime("+$day days"));
	return $result;

}

function convert_date($date){
	$result = date('d-m-Y', strtotime($date));
	return $result;
}

function calcDays($start, $end){
	$start_date = strtotime($start); 
	$end_date = strtotime($end); 
	return ($end_date - $start_date)/60/60/24;

}

function dbDelete ($tbl='',$field='',$id=''){
	global $dbh;
	if($tbl!='' && $field!='' && $id!=''){
		$sql = 'DELETE FROM '.$tbl.' WHERE '.$field.' = '.$id. '';
		return $dbh->exec($sql);
	} else {
		return NULL;
	}
}

function dbCreate($sql=''){
	global $dbh;

	if($sql ==''){

		return -9;
	}else {
		$q = $dbh->prepare($sql);
		return  $q->execute();
	}
}

function dbSQL($q=''){
	global $dbh;
	if(empty($q)) return FALSE;
	$r = $dbh->prepare($q);
	$r->execute();
	$results = array();
	while($row = $r->fetch(PDO::FETCH_OBJ)){
		$results[] = $row;
	}
	return $results;

}

function dbRow($query=''){
	global $dbh;
	$r = $dbh->prepare($query);
	$r->execute();
	return $r->fetch(PDO::FETCH_OBJ);
}

function dbOne($query='', $field=''){
	global $dbh;
	$r = dbRow($query);
	return $r? $r->$field:NULL;
}

function get_url(){
	$current = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    $result = explode('.', $current)[0];
	return $result;
}

function convert_number_to_words($number) {

    $hyphen      = '-';

    $conjunction = ' and ';

    $separator   = ', ';

    $negative    = 'negative ';

    $decimal     = ' point ';

    $dictionary  = array(

        0                   => 'Zero',

        1                   => 'One',

        2                   => 'Two',

        3                   => 'Three',

        4                   => 'Four',

        5                   => 'Five',

        6                   => 'Six',

        7                   => 'Seven',

        8                   => 'Eight',

        9                   => 'Nine',

        10                  => 'Ten',

        11                  => 'Eleven',

        12                  => 'Twelve',

        13                  => 'Thirteen',

        14                  => 'Fourteen',

        15                  => 'Fifteen',

        16                  => 'Sixteen',

        17                  => 'Seventeen',

        18                  => 'Eighteen',

        19                  => 'Nineteen',

        20                  => 'Twenty',

        30                  => 'Thirty',

        40                  => 'Fourty',

        50                  => 'Fifty',

        60                  => 'Sixty',

        70                  => 'Seventy',

        80                  => 'Eighty',

        90                  => 'Ninety',

        100                 => 'Hundred',

        1000                => 'Thousand',

        1000000             => 'Million',

        1000000000          => 'Billion',

        1000000000000       => 'Trillion',

        1000000000000000    => 'Quadrillion',

        1000000000000000000 => 'Quintillion'

    );

    if (!is_numeric($number)) {

        return false;

    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
           $string = $dictionary[$number];
            break;

        case $number < 100:

            $tens   = ((int) ($number / 10)) * 10;

            $units  = $number % 10;

            $string = $dictionary[$tens];

            if ($units) {

                $string .= $hyphen . $dictionary[$units];

            }

            break;

        case $number < 1000:

            $hundreds  = $number / 100;

            $remainder = $number % 100;

            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];

            if ($remainder) {

                $string .= $conjunction . convert_number_to_words($remainder);

            }

            break;

        default:

            $baseUnit = pow(1000, floor(log($number, 1000)));

            $numBaseUnits = (int) ($number / $baseUnit);

            $remainder = $number % $baseUnit;

            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];

            if ($remainder) {

                $string .= $remainder < 100 ? $conjunction : $separator;

                $string .= convert_number_to_words($remainder);

            }

            break;

    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    return $string;
}

function career_api($api_msg){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=AIzaSyC5tK0UZMRkrpD-gvwg0BMi_xg5ljRoeMg',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
	    "contents"
	    :[
	        {
	            "parts":[
	                {
	                    "text":"'.$api_msg.'"
	                }
	            ]
	        }
	    ]
	}',
	  CURLOPT_HTTPHEADER => array(
	    'Content-Type: application/json'
	  ),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}

function send_sms_yoola_api($phone, $message){
	$arr = array(
	"api_key" => "your api key goes here",
    "phone" => $phone,
    "message" => $message
	);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://yoolasms.com/api/v1/send',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => json_encode($arr),
	  CURLOPT_HTTPHEADER => array(
	    'Content-Type: application/json',
	    'Cookie: PHPSESSID=98ee89b975fbb39aafef5960529f53e2'
	  ),
	));

	$response = curl_exec($curl);
	
	curl_close($curl);
	return $response;
}


?>