<p align="center">
    <a href="https://packagist.org/packages/devlop/laravel-console-input-validation"><img src="https://img.shields.io/packagist/v/devlop/laravel-console-input-validation" alt="Latest Stable Version"></a>
    <a href="https://github.com/devlop/laravel-console-input-validation/blob/master/LICENSE.md"><img src="https://img.shields.io/packagist/l/devlop/laravel-console-input-validation" alt="License"></a>
</p>

# Laravel Console Input Validation

A small trait to make it easier to validate the input to your Laravel commands.

# Installation

```bash
composer require devlop/laravel-console-input-validation
```

# Usage

```php
use Devlop\Laravel\Console\ValidateInput;
use Symfony\Component\Console\Input\InputInterface;

class DemoCommand extends Command
{
    use ValidateInput;

    /**
     * Validate the console command input.
     *
     * @throws InvalidArgumentException
     */
    protected function validate(InputInterface $input) : void
    {
        // Example using manual validation
        if (! is_numeric($input->getOption('limit'))) {
            throw new InvalidArgumentException('--limit must be numeric');
        }

        // Example using webmozarts/assert
        Assert::numeric($input->getOption('limit')); // assert that the --limit option got a numeric value
        Assert::greaterThan($input->getOption('limit'), 0); // assert that the --limit option get a value greater than 0
    }

    public function handle() : int
    {
        // ...
    }
}
```
