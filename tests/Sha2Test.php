<?php

namespace Cast\Crypto\Sha2\Tests;

use PHPUnit\Framework\TestCase;
use function Cast\Crypto\Sha2\sha256;

class Sha2Test extends TestCase
{
    public function test_sha256()
    {
        $this->assertEquals('e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', sha256(''));
        $this->assertEquals('d7a8fbb307d7809469ca9abcb0082e4f8d5651e46d3cdb762d02d0bf37c9e592', sha256('The quick brown fox jumps over the lazy dog'));
    }
}
