<?php
//define('LOG_NAME', __DIR__ . '/' . PROJECT_NAME . '/logs/__log__' . date("d-m-y") . '.log');
define('LOG_NAME', __DIR__ . '/logs/__log__' . date("d-m-y") . '.log');
//echo 'debug';
//$profiler = new Profiler();
//Profiler::set('name');
// метод логирования
function debug(...$data) {
	if (defined('FLAG_DEBUG') and FLAG_DEBUG) {
		//echo '<pre>';

		//print_r($data);
		//print_r($arr2);

		//var_dump($arr1);
		//var_dump($arr2);

		//echo '</pre>';
		//$log1 = var_export($arr1, true);
		//$log2 = var_export($arr2, true);
		//file_put_contents( LOG_NAME , $log1 . PHP_EOL . $log2 . PHP_EOL, FILE_APPEND);
		if ($fp=fopen(LOG_NAME, "a")) {
			$s = '';
			foreach ($data as $str){
				$s .= date("Y.m.d H:i:s").' pid:'. getmypid() .': ';
				$needLineBreak = true;
				if (is_array($str) || is_object($str)){
					$str = print_r($str, true);
					$needLineBreak = false;

				} else if (is_string($str)){
					$str = "'" . $str . "'";

				} else if (is_null($str)){
					$str = 'NULL';

				} else if ($str === true){
					$str = 'TRUE';

				} else if ($str === false){
					$str = 'FALSE';
				}
				$s .= $str;
				if ($needLineBreak){
					$s .= "\r\n";
				}
			}
			fwrite($fp, $s);
			fclose($fp);
		}
	}
}

class Profiler {
	private static $checkpoints = [];
	
	function __construct(){
		self::$checkpoints['start'] = microtime(true);
	}
	static function set($name){
		if ($name == 'start' || $name == 'end'){
			throw new Exception('имя зарезервировано');
		}
		self::$checkpoints[$name] = microtime(true);
	}
	function __destruct(){
		self::$checkpoints['end'] = microtime(true);
		$lastCheckpoint = 0;
		$data = [];
		foreach (self::$checkpoints as $key => $checkpoint){
			if ($key == 'start'){
				$data['start'] = 0;
			} else {
				$data[$key] = round($checkpoint - $lastCheckpoint, 2);
			}
			$lastCheckpoint = $checkpoint;
		}
		$data['summ'] = round(self::$checkpoints['end'] - self::$checkpoints['start'], 2);
		debug('время выполнения:', $data);
	}
}


function msleep($time)
{
	$seconds = intval($time);
	$mseconds = $time - $seconds;
	sleep($time);
    usleep($mseconds * 1000000);
}

