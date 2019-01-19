<?php 
class RequestHelper {}

    abstract class ProcessRequest {
        abstract function process ( RequestHelper $req );
    }

class MainProcess extends ProcessRequest {
    function process ( RequestHelper $req ){
        print __CLASS__ . ":выполнение запроса\n<br>";
    }
}

abstract class DecorateProcess extends ProcessRequest {
    protected $processrequest;

    function __construct ( ProcessRequest $pr ){
        $this->processrequest = $pr;
    }
}

class LogRequest extends DecorateProcess {
    function process ( RequestHelper $req ){
        print __CLASS__ . ":регистрация запроса \n<br>";
        $this->processrequest->process($req);
    }
}

class AuthenticateRequest extends DecorateProcess {
    function process ( RequestHelper $req ){
        print __CLASS__ . ":аутентификация запроса \n<br>";
        $this->processrequest->process($req);
    }
}

class StructureRequest extends DecorateProcess {
    function process ( RequestHelper $req ){
        print __CLASS__ . ":упорядочивание данных \n<br>";
        $this->processrequest->process($req);
    }
}

$process = new AuthenticateRequest ( 
    new StructureRequest( new MainProcess() 
    ) 
);
$process->process(new RequestHelper);