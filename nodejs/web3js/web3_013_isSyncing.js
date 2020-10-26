
var obj_config = require('./web3_000_config.js');

const Web3 = require( obj_config.getWeb3Path() );

w3 = new Web3(new Web3.providers.HttpProvider( obj_config.getNodeAddress_default() ));

w3.eth.isSyncing().then(action_success, action_fail );

function action_success(result)
{
	//console.log( result );
	
	var obj_returnValues	=	result;

	console.log( JSON.stringify( obj_returnValues ) );
}//	end function

function action_fail()
{
	console.log('FAIL');
}//	end function

/**/

