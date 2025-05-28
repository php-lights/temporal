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
		int $expected,
	): void {
		$instant = new Instant( $bigInteger );
		$this->assertEquals( $expected, $instant->epochMilliseconds() );
	}

	public static function provideEpochMilliseconds(): array {
		return [
			[
				BigInteger::of( '1000000' ),
				1,
			],
			[
				BigInteger::of( '999999' ),
				0,
			],
			[
				BigInteger::of( '0' ),
				0,
			],
		];
	}
}
