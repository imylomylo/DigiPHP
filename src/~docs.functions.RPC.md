All functions in name space of DigiByte



### RPC::createMultiSig(nRequired,array(public key1,public key2,...));
	Array ( 
		[address] => SWTDGzeGCDQ72dA9hDzJPiruVsKKJs7ZXP 
		[redeemScript] => 52210378ffd8418b2a00a5ea10b0ebe29b52547f671c74e653f1e30d0fc40c4f89c13f21024b2e880e014975a616c9dadcaf6c0a9a64cf1e1dfcf89e56a858b50602cd309f2103714186e003c7cfaaab0ba5780ffddf29df5988f583f2150d2964876e16ddef5c53ae 
	)

### RPC::createRawTransaction(array(input1,input2,...),array("address1"=>amount,"address2"=>amount));
*input array("txid"=>txid,"vout"=>n)
	010000000395f801a3691563b11170dcb9e7aa87fe3cc4de40581c5a244787adf5054f4e230000000000ffffffff429a0622509d557b1756c0900c0517497f78a8817a169a0587c5a226874a45c40000000000ffffffffce1a81624e28bb0b77ba9b9952d6d5361c6662bd6691511f899b81dfdcf1941e0000000000ffffffff020010a5d4e80000001976a914bfa6a774bfe09a8fa32eb8c10e8eb33646c10b5088ac60b9cbdc090200001976a914e5464dd327782c24227e51e89075643d4380ac3588ac00000000
	
### RPC::decodeRawTransaction(hexString);
	Array ( 
		[txid] => 21c5c0db86619207de6e8e3bcdfac3c2b429e1b1fb0af4a86b289d0e12d8e011 
		[hash] => 21c5c0db86619207de6e8e3bcdfac3c2b429e1b1fb0af4a86b289d0e12d8e011 
		[version] => 1 
		[size] => 109 
		[vsize] => 109 
		[weight] => 436 
		[locktime] => 0 
		[vin] => Array ( 
			[0] => Array ( 
				[coinbase] => 043999d0520168062f503253482f 
				[sequence] => 4294967295 
			) 
		) 
		[vout] => Array ( 
			[0] => Array ( 
				[value] => 72000 
				[n] => 0 
				[scriptPubKey] => Array ( 
					[asm] => 0330d8ec6ed2cd6ea1de4123d2e0ac19a765e7b105f4850eef887e6775f41c5506 OP_CHECKSIG 
					[hex] => 210330d8ec6ed2cd6ea1de4123d2e0ac19a765e7b105f4850eef887e6775f41c5506ac 
					[reqSigs] => 1 
					[type] => pubkey 
					[addresses] => Array ( 
						[0] => DNcTFEGrhJ4RyfZYG3eVfm3BjLHkQSAi5F 
					) 
				) 
			) 
		) 
	) 

### RPC::getRawTransaction(txid)
	01000000010000000000000000000000000000000000000000000000000000000000000000ffffffff0e043999d0520168062f503253482fffffffff01004071618c06000023210330d8ec6ed2cd6ea1de4123d2e0ac19a765e7b105f4850eef887e6775f41c5506ac00000000

### RPC::getTransaction(txid)
	Array ( 
		[txid] => 21c5c0db86619207de6e8e3bcdfac3c2b429e1b1fb0af4a86b289d0e12d8e011 
		[hash] => 21c5c0db86619207de6e8e3bcdfac3c2b429e1b1fb0af4a86b289d0e12d8e011 
		[version] => 1 
		[size] => 109 
		[vsize] => 109 
		[weight] => 436 
		[locktime] => 0 
		[vin] => Array ( 
			[0] => Array ( 
				[coinbase] => 043999d0520168062f503253482f 
				[sequence] => 4294967295 
			) 
		) 
		[vout] => Array ( 
			[0] => Array ( 
				[value] => 72000 
				[n] => 0 
				[scriptPubKey] => Array ( 
					[asm] => 0330d8ec6ed2cd6ea1de4123d2e0ac19a765e7b105f4850eef887e6775f41c5506 OP_CHECKSIG 
					[hex] => 210330d8ec6ed2cd6ea1de4123d2e0ac19a765e7b105f4850eef887e6775f41c5506ac 
					[reqSigs] => 1 
					[type] => pubkey 
					[addresses] => Array ( 
						[0] => DNcTFEGrhJ4RyfZYG3eVfm3BjLHkQSAi5F 
					) 
				) 
			) 
		) 
		[hex] => 01000000010000000000000000000000000000000000000000000000000000000000000000ffffffff0e043999d0520168062f503253482fffffffff01004071618c06000023210330d8ec6ed2cd6ea1de4123d2e0ac19a765e7b105f4850eef887e6775f41c5506ac00000000 
		[blockhash] => 41c2ea9321c00c8d00016b913771bdca3b4463c711037a9e1227157f3571dda4 
		[confirmations] => 7832913 
		[time] => 1389402425 
		[blocktime] => 1389402425 
	)
	

### RPC::sendRawTransaction(hex)
//not yet tested

### RPC::getTxOut(txid,n,optional include mem pool=true)
//does not seem to work

### RPC::getBlock(hash)			//returns data about the block
	Array ( 
		[hash] => 41c2ea9321c00c8d00016b913771bdca3b4463c711037a9e1227157f3571dda4 
		[confirmations] => 7832913 
		[strippedsize] => 190 
		[size] => 190 
		[weight] => 760 
		[height] => 100 
		[version] => 1 
		[versionHex] => 00000001 
		[pow_algo_id] => 1 
		[pow_algo] => scrypt 
		[pow_hash] => 00000b163fd013bb115c65e5418f1cad17422e9baaf51a3bfa5d306b1a56a569 
		[merkleroot] => 21c5c0db86619207de6e8e3bcdfac3c2b429e1b1fb0af4a86b289d0e12d8e011 
		[tx] => Array ( 
			[0] => 21c5c0db86619207de6e8e3bcdfac3c2b429e1b1fb0af4a86b289d0e12d8e011 
		) 
		[time] => 1389402425 
		[mediantime] => 1389401686 
		[nonce] => 3841982592 
		[bits] => 1e0ffff0 
		[difficulty] => 0.000244140625 
		[chainwork] => 0000000000000000000000000000000000000000000000000000000006500650 
		[nTx] => 1 
		[previousblockhash] => a86dfa813c1fb4d87cabde94aa82cef6c445b57a945e127cea2433003af1ede1 
		[nextblockhash] => 21dc035555bcf7d70f6bffbf1db74fc45c5ddd60bffefd3e581479a325e8b4a7 
	) 

### RPC::getBlockCount()
	7833012

### RPC::getBlockHash(index)
	41c2ea9321c00c8d00016b913771bdca3b4463c711037a9e1227157f3571dda4

### RPC::signRawTransaction(raw hex,array(input1,input2,...),array of private keys);
*input array("txid"=>txid,"vout"=>n,"scriptPubKey"=>hex)
//not yet tested	
	
### RPC::validateAddress(address)
	Array (
		[isvalid] => 1 
		[address] => DS3PVzgjBaemg1fzPoLCjLwUB6AErH9ZmX 
		[scriptPubKey] => 76a914e5464dd327782c24227e51e89075643d4380ac3588ac 
		[isscript] => 
		[iswitness] => 
	)

### RPM::verifyMessage(address,signature,message);
//not yet tested