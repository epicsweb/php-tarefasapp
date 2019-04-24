<?php

namespace Epicsweb;

class PhpTarefasApp
{

    //FUNÇAO QUE EXECUTA O CURL
	private function executeCurl($param) {

		if( is_array($param) && $param['url'] && $param['data'] ) {

			$url 			= 'https://tarefas.app/api/' . $param['url'];
			
			$params 		= http_build_query( $param['data'], NULL, '&' );

			switch ( $param['method'] ) {

				case 'delete':
				case 'put':
				case 'post':
				case 'patch':

	                $curl 			= curl_init($url);
	                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($param['method']));
	                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	                curl_setopt($curl, CURLOPT_POST, true);
	                curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
	                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	                $curl_response 	= curl_exec($curl);
					curl_close($curl);

	                if ($curl_response === false)
	                	return false;

	                return json_decode($curl_response);

				break;
				case 'get':

					$url 			= $url . '?' . $params;

	                $curl 			= curl_init($url);
	                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
	                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	                $curl_response 	= curl_exec($curl);
	                curl_close($curl);

	                if ($curl_response === false)
	                	return false;

	                return json_decode($curl_response);

				break;
				default:

					return false;

				break;

			}

		} else return false;

	}

    //FUNCTION TO ADD/INSERT A NEW TASK (PUT OR GET)
	public function tasks_add($task, $method = 'put')
	{

		$method = strtolower($method);

		if( !in_array($method, ['get', 'put']))
			return false;

		return $this->executeCurl([
			'url'   	=> 'tasks/add',
			'data'    	=> $task,
			'method'    => $method
		]);
		
	}

}