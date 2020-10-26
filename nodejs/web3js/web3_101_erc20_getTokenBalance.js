
var obj_config = require('./web3_000_config.js');

const Web3 = require( obj_config.getWeb3Path() );

w3 = new Web3(new Web3.providers.HttpProvider( obj_config.getNodeAddress_default() ));

var params		=	JSON.parse(process.argv[2]);
var contract	=	params.contract;
var addrerss	=	params.addrerss;

/////////////////////////////////////////////////////////////////////////////////////////////////

var data			=	"0x313ce567";
	data			+=	w3.utils.padLeft( addrerss.substr( 2, contract.length) , 64);

	var param	=	{
			"to" : contract
			,"data" : data		
	};	

var result = w3.eth.call( param ).then(action_success_step1, action_fail );

var decimals	=	18;

function action_success_step1(result)
{	
	decimals	=	 w3.utils.hexToNumber(result);
	getTokenBalance( decimals );
}//	end function	
	
/////////////////////////////////////////////////////////////////////////////////////////////////



function getTokenBalance()
{
	data	=	null;
	data	=	"0x70a08231";
	data	+=	w3.utils.padLeft( addrerss.substr( 2, addrerss.length) , 64);
	
	param	=	null;
	param	=	{
			"to" : contract
			,"data" : data		
	}

	var result = w3.eth.call( param ).then(action_success_step2, action_fail );	
	
}///	end function

function action_success_step2(result)
{	
	var obj_returnValues	=	{
			"unit" : "ether ( wei X 10^18 )"
			,"contract" : contract
			,"addrerss" : addrerss
			,"TokenBalance" : w3.utils.fromWei(result , 'wei') * Math.pow(10, ( decimals * -1 ))
			,"TokenBalance_wei" : w3.utils.fromWei(result , 'wei')
		}
	
	console.log( JSON.stringify( obj_returnValues ) );
	process.exit(1);
	
}//	end function


function action_fail()
{
	console.log('FAIL');
	process.exit(1);
}//	end function

/**/