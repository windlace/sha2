SHA2-256
---
**Transparent SHA2-256 Implementation for PHP**

#### Install:
```php
composer require cast/sha2
```

#### Usage:
```php
<?php

use function Cast\Crypto\Sha2\sha256;

sha256('The quick brown fox jumps over the lazy dog');
// d7a8fbb307d7809469ca9abcb0082e4f8d5651e46d3cdb762d02d0bf37c9e592

```

Based on https://github.com/spipremix/ecrire/blob/master/auth/sha256.inc.php.

Links:
* https://en.wikipedia.org/wiki/SHA-2
