<?php

namespace Temporal39\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Rounding\MaxDurationRoundingIncrement;

#[CoversClass( MaxDurationRoundingIncrement::class )]
class MaxDurationRoundingIncrementTest extends TestCase {
	#[DataProvider( 'provideGetValue' )]
	public function testGetValue(
		MaxDurationRoundingIncrement $increment,
		?int $expectedValue,
	): void {
		$this->assertSame(
			$expectedValue,
			$increment->getValue()
		);
	}

	public static function provideGetValue(): array {
		return [
			[ MaxDurationRoundingIncrement::Unset, null ],
			[ MaxDurationRoundingIncrement::N24, 24 ],
			[ MaxDurationRoundingIncrement::N60, 60 ],
			[ MaxDurationRoundingIncrement::N1000, 1000 ],
		];
	}
}
