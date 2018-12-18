<?php
namespace DigiByte;

class RPC {
/* _____                _              _       
  / ____|              | |            | |      
 | |     ___  _ __  ___| |_ __ _ _ __ | |_ ___ 
 | |    / _ \| '_ \/ __| __/ _` | '_ \| __/ __|
 | |___| (_) | | | \__ \ || (_| | | | | |_\__ \
  \_____\___/|_| |_|___/\__\__,_|_| |_|\__|___/
*/
	//wallet config
	private const username='localdgb';
	private const password='Fjl399kPp1';
	private const host='127.0.0.1';
	private const port=14022;
	
	//wallet location
	private const url='';
	private const proto='http';
	private const CACertificate=null;	//set if proto is https
	
/*_____  _____   _____    _____      _ _     
 |  __ \|  __ \ / ____|  / ____|    | | |    
 | |__) | |__) | |      | |     __ _| | |___ 
 |  _  /|  ___/| |      | |    / _` | | / __|
 | | \ \| |    | |____  | |___| (_| | | \__ \
 |_|  \_\_|     \_____|  \_____\__,_|_|_|___/
*/
	private static function call($method, $params) {
        // If no parameters are passed, this will be an empty array
        $params = array_values($params);
        // Build the request, it's ok that params might have any empty array
        $request = json_encode(array(
            'method' => $method,
            'params' => $params
        ));
        // Build the cURL session
        $curl    = curl_init(self::proto.'://'.self::host.':'.self::port.'/'.self::url);
        $options = array(
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => self::username . ':' . self::password,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_HTTPHEADER     => array('Content-type: application/json'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $request
        );
        // This prevents users from getting the following warning when open_basedir is set:
        // Warning: curl_setopt() [function.curl-setopt]:
        //   CURLOPT_FOLLOWLOCATION cannot be activated when in safe_mode or an open_basedir is set
        if (ini_get('open_basedir')) {
            unset($options[CURLOPT_FOLLOWLOCATION]);
        }
        if (self::proto == 'https') {
            // If the CA Certificate was specified we change CURL to look for it
            if (!empty(self::CACertificate)) {
                $options[CURLOPT_CAINFO] = self::CACertificate;
                $options[CURLOPT_CAPATH] = DIRNAME(self::CACertificate);
            } else {
                // If not we need to assume the SSL cannot be verified
                // so we set this flag to FALSE to allow the connection
                $options[CURLOPT_SSL_VERIFYPEER] = false;
            }
        }
        curl_setopt_array($curl, $options);
        // Execute the request and decode to an array
		$raw_response = curl_exec($curl);
		$response     = json_decode($raw_response, true);
        // If the status is not 200, something is wrong
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // If there was no error, this will be an empty string
        $curl_error = curl_error($curl);
        curl_close($curl);
        if (!empty($curl_error)) {
            throw new Exception($curl_error);
        }
        if ($response['error']) {
            // If bitcoind returned an error, put that in self::error
            throw new Exception("{$response["error"]["code"]}: {$response["error"]["message"]}");
			
        } elseif ($status != 200) {
            // If bitcoind didn't return a nice error message, we need to make our own
            switch ($status) {
                case 400:
                    throw new Exception('400: HTTP_BAD_REQUEST');
                case 401:
                    throw new Exception('401: HTTP_UNAUTHORIZED');
                case 403:
                    throw new Exception('403: HTTP_FORBIDDEN');
                case 404:
					throw new Exception('404: HTTP_NOT_FOUND');
            }
        }
        return $response['result'];
    }
		
	public static function __callStatic($method, $params) {
		return self::call(strtolower($method), $params);
	}
	
	//getTransaction doesn't work properly so use getRawTransaction instead and decode output so format is correct
	public static function getTransaction($txid) {
		return self::call('getrawtransaction',array($txid,1));
	}
	
	//allow calling getBlock with a block height
	public static function getBlock($hashOrHeight){
		if (is_int($hashOrHeight)){
			return self::call('getblock',array(
				self::call('getBlockHash',array($hashOrHeight))			
			));	
		} else {
			return self::call('getblock',array($hashOrHeight));
		}
	}
	
}