


var obj_config = require('./web3_000_config.js');

const Web3 = require( obj_config.getWeb3Path() );

const w3 = new Web3(new Web3.providers.HttpProvider( obj_config.getNodeAddress_default() ));

var address = "";
var result = w3.eth.getAccounts().then(action_success, action_fail );


function action_success(result)
{	
	console.log( JSON.stringify( result ) );
}//	end function

function action_fail()
{
	console.log('FAIL');
}//	end function

