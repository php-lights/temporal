<?php

namespace Temporal39\Tests\Rounding;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Rounding\Rounding;
use Temporal39\Rounding\UnsignedRoundingMode;

#[CoversClass( Rounding::class )]
class RoundingTest extends TestCase {
	#[DataProvider( 'provideApplyUnsignedRoundingMode' )]
	public function testApplyUnsignedRoundingMode(
		float $x,
		float $r1,
		float $r2,
		?UnsignedRoundingMode $unsignedRoundingMode,
		float $expected,
	): void {
		$this->assertEqualsWithDelta(
			$expected,
			Rounding::applyUnsignedRoundingMode( $x, $r1, $r2, $unsignedRoundingMode ),
			0.0
		);
	}

	public static function provideApplyUnsignedRoundingMode(): array {
		return [
			[
				2.,
				2.,
				3.,
				UnsignedRoundingMode::Zero,
				2., // x and r1 are equal to each other (1st branch)
			],
			[
				3., // x
				2., // lower limit
				4., // upper limit
				UnsignedRoundingMode::Zero,
				2., // expected (2nd branch)
			],
			[
				3., // x
				2., // lower limit
				4., // upper limit
				UnsignedRoundingMode::Infinity,
				4., // expected (3rd branch)
			],
			[
				2., // x
				0., // lower limit
				6., // upper limit
				UnsignedRoundingMode::HalfEven,
				0., // expected (4th branch)
			],
			[
				4., // x
				0., // lower limit
				6., // upper limit
				UnsignedRoundingMode::HalfEven,
				6., // expected (5th branch)
			],
			[
				3., // x
				2., // lower limit
				4., // upper limit
				UnsignedRoundingMode::HalfZero,
				2., // expected (6th branch)
			],
			[
				3., // x
				2., // lower limit
				4., // upper limit
				UnsignedRoundingMode::HalfInfinity,
				4., // expected (7th branch)
			],
			[
				3,
				0,
				6,
				UnsignedRoundingMode::HalfEven,
				0, // cardinality is zero
			],
			[
				4.5,
				3.,
				6.,
				UnsignedRoundingMode::HalfEven,
				6., // cardinality is not zero
			],
		];
	}

	// #[DataProvider( 'provideTestRoundToIncrement' )]
	public function testRoundToIncrement(): void {
		$this->markTestIncomplete(
			'This test has not been implemented yet.',
		);
	}

	public static function provideTestRoundToIncrement(): array {
		return [];
	}

	// #[DataProvider( 'provideTestRoundToIncrementAsIfPositive' )]
	public function testRoundToIncrementAsIfPositive(): void {
		$this->markTestIncomplete(
			'This test has not been implemented yet.',
		);
	}

	public static function provideTestRoundToIncrementAsIfPositive(): array {
		return [];
	}
}
