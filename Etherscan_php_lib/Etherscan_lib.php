<?php

class Etherscan_lib
{
    //  Etherscan API Key
    public $ApiKey              =   null;
    public $RequestUrl          =   null;

    public function __construct()
    {
        //  @   nothing
    }//	end function


    public function index()
    {
        exit("UNDEFINE");
    }//	end function


    public function api_SendERC20_Token($arr_params)
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=eth_sendRawTransaction";

        if( $goNext == "GO" )
        {
            if( array_key_exists( "hex", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&hex=".$arr_params['hex'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : hex") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_encode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function



    public function api_eth_estimateGas( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=eth_estimateGas";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "to", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&to=".$arr_params['to'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : to") );
            }// end if


            if( array_key_exists( "value", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&value=".$arr_params['value'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : value") );
            }// end if


            if( array_key_exists( "gasPrice", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&gasPrice=".$arr_params['gasPrice'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : gasPrice") );
            }// end if


            if( array_key_exists( "gas", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&gas=".$arr_params['gas'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : gas") );
            }// end if
        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_encode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;
    }// end function



    public function api_eth_gasPrice()
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=eth_gasPrice";

        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_encode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;
    }// end function


    public function api_eth_getTransactionCount( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=eth_getTransactionCount";
        $this->RequestUrl   .=   "&tag=latest";



        if( $goNext == "GO" )
        {
            if( array_key_exists( "address", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&address=".$arr_params['address'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : address") );
            }// end if
        }// end if

        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_encode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function



    public function api_GetERC20_TokenBalanceByAddress($arr_params)
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=account";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=tokenbalance";
        $this->RequestUrl   .=   "&tag=latest";

        if( $goNext == "GO" )
        {
            if( array_key_exists( "contractaddress", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&contractaddress=".$arr_params['contractaddress'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : contractaddress") );
            }// end if

            if( array_key_exists( "address", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&address=".$arr_params['address'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : address") );
            }// end if

        }// end if

        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_encode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function




    public function api_balance( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=account";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=balance";
        $this->RequestUrl   .=   "&tag=latest";



        if( $goNext == "GO" )
        {
            if( array_key_exists( "address", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&address=".$arr_params['address'];
            }else{
                $goNext     = "STOP";
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : address") );
            }// end if
        }// end if

        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_encode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function



    public function api_txlist_by_addr( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=account";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=txlist";
        $this->RequestUrl   .=   "&startblock=0";
        $this->RequestUrl   .=   "&endblock=99999999";
        $this->RequestUrl   .=   "&page=1";
        $this->RequestUrl   .=   "&offset=99999";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "sort", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&sort=".$arr_params['sort'];
            }else{
                $this->RequestUrl   .=   "&sort=desc";
            }// end if

            if( array_key_exists( "address", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&address=".$arr_params['address'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : address") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function




    public function api_txlistinternal_by_addr( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=account";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;

        $this->RequestUrl   .=   "&action=txlistinternal";
        $this->RequestUrl   .=   "&startblock=0";
        $this->RequestUrl   .=   "&endblock=99999999";
        $this->RequestUrl   .=   "&page=1";
        $this->RequestUrl   .=   "&offset=99999";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "sort", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&sort=".$arr_params['sort'];
            }else{
                $this->RequestUrl   .=   "&sort=desc";
            }// end if

            if( array_key_exists( "address", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&address=".$arr_params['address'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : address") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function



    public function api_txlistinternal_by_txhash( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");


        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=account";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=txlistinternal";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "txhash", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&txhash=".$arr_params['txhash'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : txhash") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function







    public function api_eth_getTransactionByHash( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=eth_getTransactionByHash";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "txhash", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&txhash=".$arr_params['txhash'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : txhash") );
            }// end if

        }// end if

        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;
    }// end function

    
    public function api_eth_getTransactionReceiptByHash( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=eth_getTransactionReceipt";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "txhash", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&txhash=".$arr_params['txhash'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : txhash") );
            }// end if

        }// end if

        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function


    //  @  getBlockByNumber - api_eth_getBlockByNumber
    public function api_eth_getBlockByNumber( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=proxy";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&boolean=true";
        $this->RequestUrl   .=   "&action=eth_getBlockByNumber";


        if( $goNext == "GO" )
        {
            if( array_key_exists( "tag", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&tag=".$arr_params['tag'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : tag") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function



    public function api_getTransactionGetStatusByHash( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=transaction";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=getstatus";

        if( $goNext == "GO" )
        {
            if( array_key_exists( "txhash", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&txhash=".$arr_params['txhash'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : txhash") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function


    public function api_getTransactionReceiptGetStatusByHash( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=transaction";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=gettxreceiptstatus";

        if( $goNext == "GO" )
        {
            if( array_key_exists( "txhash", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&txhash=".$arr_params['txhash'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : txhash") );
            }// end if

        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function


    public function api_getEventLogByAddrAndToppic0( $arr_params )
    {
        $goNext     =   "GO";
        $errorMsg   =   array("ERROR" => "UNKNOWN ERROR");

        $this->RequestUrl   =   "https://api.etherscan.io/api";
        $this->RequestUrl   .=   "?module=logs";
        $this->RequestUrl   .=   "&apikey=".$this->ApiKey;
        $this->RequestUrl   .=   "&action=getLogs";
        $this->RequestUrl   .=   "&fromBlock=0";
        $this->RequestUrl   .=   "&toBlock=latest";

        if( $goNext == "GO" )
        {
            if( array_key_exists( "address", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&address=".$arr_params['address'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : address") );
            }// end if
        }// end if

        if( $goNext == "GO" )
        {
            if( array_key_exists( "topic0", $arr_params ) == true )
            {
                $this->RequestUrl   .=   "&topic0=".$arr_params['topic0'];
            }else{
                $errorMsg   =   json_encode( array("ERROR" => "The parameter is invalid : topic0") );
            }// end if
        }// end if


        switch( $goNext )
        {
            case "GO":
                $jsonResult  =   $this->exec_curl();
                break;
            case "STOP":
                $jsonResult  =   json_excode( $errorMsg );
                break;
        }///    end switch

        return $jsonResult;

    }// end function


    private function exec_curl()
    {
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL                        , $this->RequestUrl );
        curl_setopt($ch, CURLOPT_POST                       , false              );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER             , true              );

        // grab URL and pass it to the browser
        $ReturnString       =       curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        return $ReturnString;
    }// end function


}// end class

?>
