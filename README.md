# PLUGINS RECEH

## WARNING !!!
just for fun, if you find some bugs, fix yourself ;)

## LIST OF PLUGINS
1. Mnemonic Code

## HOW TO INSTALL

 - VIA COMPOSER
 ``composer require monsterz/pluginsreceh``

## HOW TO USE
- MCNEMONIC
Add some prefix and/or suffix in your code field like product code, medicine code, order code, etc.

	add ``use Monsterz\Pluginsreceh\Mnemonic;`` on your class
	set your new code
	```
	$new_code = Mnemonic::model('Models.Products')
						->field('product_code')
						->prefix('PR')
						->create();
	```
	then you will get code `PR000001` for your product code
	methods :
	
|   METHODS   |                                     |
| ----------- | ------------------------------|
| `model`     |	set your table or model in Laravel, use delimiter `.` if your model inside folder like `model('Models.Products')` also mean `App\Models\Products` |
| `field`	|	set your field of the table |
| `prefix`	| 	set prefix on your code |
| `suffix`	|	set suffix on your code	|
| `length`	|	set length of your code, with default it will be `6` length, for example if you set length to `10` your code will be `0000000001`
| `default` | set default number if your table don't have yet record/row and you don't want to start from 1
| `withDate` | add date before your code number and after prefix |
| `create`	| creating code 

