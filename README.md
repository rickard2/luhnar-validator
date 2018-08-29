Luhnar Validator
======

Uses my Luhnar package to validate social security numbers in symfony.

PHP Component: https://github.com/rickard2/luhnar

JavaScript Equivalent: https://github.com/rickard2/luhnarjs

Usage example:

```php
use Rickard2\LuhnarValidator\SocialSecurityNumber as SocialSecurityNumber;

class Person {
    /**
     * @ORM\Column(name="socialSecurityNumber", type="string", length=13)
     * @SocialSecurityNumber(countryCode="SE")
     */
    private $ssn;
}
```