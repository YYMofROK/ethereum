var obj_config = require('./web3_000_config.js');

const Web3 = require( obj_config.getWeb3Path() );


/*
var await = require('asyncawait/await');

(async (function testingAsyncAwait() {
    await (console.log("Print me!"));
}))();

console.log("AAAAAAAAAAAAAAAAA");

console.log(obj_config);
*/




//w3 = new Web3(new Web3.providers.HttpProvider( obj_config.getNodeAddress_default() ));





/*
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


/*






var filter = w3.eth.filter('latest');
/*
	filter.watch(function(error, block_hash) {
	w3.eth.getBlock(block_hash, false, function(err, block)
	{
            console.log(block);
	});
});




/*


function action_success(result)
{
	console.log( result );
	
	//	var obj_returnValues	=	result;

	//	console.log( JSON.stringify( obj_returnValues ) );
}//	end function

function action_fail()
{
	console.log('FAIL');
}//	end function

/**/