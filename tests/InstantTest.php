<?php

namespace Temporal39\Tests;

use Brick\Math\BigInteger;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Instant;

#[CoversClass( Instant::class )]
class InstantTest extends TestCase {
	#[DataProvider( 'provideEpochMilliseconds' )]
	public function testEpochMilliseconds(
		BigInteger $bigInteger,
		float $expected,
	): void {
		$instant = new Instant( $bigInteger );
		$this->assertEqualsWithDelta( $expected, $instant->epochMilliseconds(), 0.0 );
	}

	public static function provideEpochMilliseconds(): array {
		return [
			[
				BigInteger::of( '1000000' ),
				1.0,
			],
			[
				BigInteger::of( '999999' ),
				0.0
			],
			[
				BigInteger::of( '0' ),
				0.0,
			],
		];
	}
}
