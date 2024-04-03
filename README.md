# PHPStan Banned Code

[![Latest Stable Version](https://poser.pugx.org/ekino/phpstan-banned-code/v/stable)](https://packagist.org/packages/ekino/phpstan-banned-code)
[![Build Status](https://travis-ci.org/ekino/phpstan-banned-code.svg?branch=master)](https://travis-ci.org/ekino/phpstan-banned-code)
[![Coverage Status](https://coveralls.io/repos/ekino/phpstan-banned-code/badge.svg?branch=master&service=github)](https://coveralls.io/github/ekino/phpstan-banned-code?branch=master)
[![Total Downloads](https://poser.pugx.org/ekino/phpstan-banned-code/downloads)](https://packagist.org/packages/ekino/phpstan-banned-code)

This library is based on [PHPStan](https://phpstan.org/) to detect calls to specific functions you don't want in your project.
For instance, you can add it in your CI process to make sure there is no debug/non standard code (like [var_dump](https://www.php.net/manual/en/function.var-dump.php), [exit](https://www.php.net/manual/en/function.exit.php), ...).

## Basic usage

To use this extension, require it using [Composer](https://getcomposer.org/):

```bash
composer require --dev jesperbeisner/phpstan-banned-code
```

When you use https://github.com/phpstan/extension-installer you are done.

If not, include `extension.neon` in your project's PHPStan config:

```
includes:
	- vendor/jesperbeisner/phpstan-banned-code/extension.neon
```

## Advanced usage

You can configure this library with parameters:

```
parameters:
	banned_code:
		nodes:
			-
				type: Stmt_Echo
				active: true
			-
				type: Expr_Eval
				active: true
			-
				type: Expr_Exit
				active: true
			-
				type: Expr_Print
				active: true
			-
				type: Expr_ShellExec
				active: true

		functions:
		    -
		        name: dd
		        active: true
		    -
		        name: debug_backtrace
		        active: true
		    -
		        name: dump
		        active: true
		    -
		        name: exec
		        active: true
		    -
		        name: passthru
		        active: true
		    -
		        name: phpinfo
		        active: true
		    -
		        name: print_r
		        active: true
		    -
		        name: proc_open
		        active: true
		    -
		        name: shell_exec
		        active: true
		    -
		        name: system
		        active: true
		    -
		        name: var_dump
		        active: true
```

`type` is the returned value of a node, see the method `getType()`.
