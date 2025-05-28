<?php

namespace Temporal39\Tests\Rounding;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Rounding\Sign;
use Temporal39\Rounding\SignOrZero;

#[CoversClass( Sign::class )]
class SignTest extends TestCase {
	#[DataProvider( 'provideFromSign' )]
	public function testTryFromSignOrZero(
		SignOrZero $signOrZero,
		?Sign $expected,
	): void {
		$this->assertSame( $expected, Sign::tryFromSignOrZero( $signOrZero ) );
	}

	public static function provideFromSign(): array {
		return [
			[ SignOrZero::Negative, Sign::Negative ],
			[ SignOrZero::Positive, Sign::Positive ],
			[ SignOrZero::Zero, null ],
		];
	}
}
