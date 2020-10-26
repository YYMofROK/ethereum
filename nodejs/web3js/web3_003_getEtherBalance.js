
var obj_config = require('./web3_000_config.js');

const Web3 = require( obj_config.getWeb3Path() );

w3 = new Web3(new Web3.providers.HttpProvider( obj_config.getNodeAddress_default() ));

var params		=	JSON.parse(process.argv[2]);
var addrerss	=	params.addrerss;


var result = w3.eth.getBalance( addrerss ).then(action_success, action_fail );;

function action_success(result)
{
	var obj_returnValues	=	{
			"unit" : "ether ( wei X 10^18 )"
			,"addrerss" : addrerss
			,"etherBalance" : w3.utils.fromWei(result , 'ether')
		}
	
	console.log( JSON.stringify( obj_returnValues ) );
}//	end function

function action_fail()
{
	console.log('FAIL');
}//	end function

/**/

