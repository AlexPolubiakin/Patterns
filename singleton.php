<?

// логгер
class Logger{
    const LOG_NAME = 'file.log';
    private static $_instance;
    
    private function __construct(){

    }
    private function __clone(){

    }

    static function getInstance(){
        if(self::_instance == null)
            self::_instance = new self;
            return self::_instance;
    }

    function log($str){
        file_put_contents(self::LOG_NAME, $str.PHP_EOL,FILE_APPEND);
    }
}

// $log = new Logger;
$log = Logger:getInstance();
$log->log('Breakpoint #1');
Logger::getInstance()->log('Breakpoint #2');

//конфиг

