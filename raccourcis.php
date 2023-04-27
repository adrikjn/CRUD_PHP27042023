a mettre dans snipets html.json 

{
	// Place your snippets for html here. Each snippet is defined under a snippet name and has a prefix, body and 
	// description. The prefix is what is used to trigger the snippet and the body will be expanded and inserted. Possible variables are:
	// $1, $2 for tab stops, $0 for the final cursor position, and ${1:label}, ${2:another} for placeholders. Placeholders with the 
	// same ids are connected.
	// Example:
	// "Print to console": {
	// 	"prefix": "log",
	// 	"body": [
	// 		"console.log('$1');",
	// 		"$2"
	// 	],
	// 	"description": "Log output to console"
	// }
	
	"echo": {
		
		"prefix": ["/"],
		"body": "<?= $1; ?>"  
	  },

	"short8":{
		"prefix": ["ph"],
		"body": ["<?php $1 ?>" ]
	},

	"Header":{
		"prefix": ["h"],
		"body": ["<?php require_once('../inclusion/header.inc.php'); ?>" ]
	},

	"footer":{
		"prefix": ["f"],
		"body": ["<?php require_once('../inclusion/footer.inc.php'); ?>" ]
	},
}


bootswatch 

https://cdnjs.com/libraries/bootswatch lien cdn 
