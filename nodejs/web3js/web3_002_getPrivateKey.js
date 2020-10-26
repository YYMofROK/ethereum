
var obj_config = require('./web3_000_config.js');

const Web3 = require( obj_config.getWeb3Path() );

w3 = new Web3(new Web3.providers.HttpProvider( obj_config.getNodeAddress_default() ));

var params				=	JSON.parse(process.argv[2]);
var password			=	params.password;
var keystoreJsonV3		=	params.keystoreJsonV3;

var result = w3.eth.accounts.decrypt(keystoreJsonV3, password);

var obj_returnValues	=	{
		"address" : result.address
		,"privateKey" : result.privateKey		
}


console.log( JSON.stringify( obj_returnValues ) );
/**/