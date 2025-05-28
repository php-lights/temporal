<?php

namespace Temporal39\Tests\Rounding;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Rounding\Sign;
use Temporal39\Rounding\SignOrZero;

#[CoversClass( SignOrZero::class )]
class SignOrZeroTest extends TestCase {
	#[DataProvider( 'provideFromSign' )]
	public function testFromSign(
		Sign $sign,
		SignOrZero $expected,
	): void {
		$this->assertSame( $expected, SignOrZero::fromSign( $sign ) );
	}

	public static function provideFromSign(): array {
		return [
			[ Sign::Negative, SignOrZero::Negative ],
			[ Sign::Positive, SignOrZero::Positive ],
		];
	}
}
