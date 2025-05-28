<?php

namespace Temporal39\Tests\Utils;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Utils\DateEquations;
use Temporal39\Utils\MathDaysInYear;

#[CoversClass( DateEquations::class )]
class DateEquationsTest extends TestCase {
	#[DataProvider( 'provideGetEpochTimeToDayNumber' )]
	public function testGetEpochTimeToDayNumber(
		int $epochTime,
		float $expectedDayNumber,
	): void {
		$this->assertEqualsWithDelta(
			$expectedDayNumber,
			DateEquations::getEpochTimeToDayNumber( $epochTime ),
			0.0
		);
	}

	public static function provideGetEpochTimeToDayNumber(): array {
		return [
			// Days between January 1st, 2000 and January 1st, 1970
			[ 946684800000, 10957.0 ],
			// Days between January 1st, 2024 and January 1st, 1970
			[ 1704067200000, 19723.0 ],
			// Days between January 1st, 2025 and January 1st, 1970
			[ 1735689600000, 20089.0 ],
		];
	}

	#[DataProvider( 'provideGetMathDaysInYear' )]
	public function testGetMathDaysInYear(
		int $year,
		MathDaysInYear $expectedDays,
	): void {
		$this->assertSame( $expectedDays, DateEquations::getMathDaysInYear( $year ) );
	}

	public static function provideGetMathDaysInYear(): array {
		return [
			[ 1804, MathDaysInYear::D366 ],
			[ 2000, MathDaysInYear::D366 ],
			[ 2024, MathDaysInYear::D366 ],
			[ 2025, MathDaysInYear::D365 ],
		];
	}

	#[DataProvider( 'provideGetEpochDayNumberForYear' )]
	public function testGetEpochDayNumberForYear(
		int $year,
		int $expectedEpochDay,
	): void {
		$this->assertSame(
			$expectedEpochDay,
			DateEquations::getEpochDayNumberForYear( $year )
		);
	}

	public static function provideGetEpochDayNumberForYear(): array {
		return [
			[ 1970, 0 ],
			[ 2023, 19358 ],
			[ 2024, 19723 ],
			[ 2025, 20089 ],
		];
	}

	#[DataProvider( 'provideGetEpochTimeForYear' )]
	public function testGetEpochTimeForYear(
		int $year,
		int $expectedEpochTime,
	): void {
		$this->assertSame(
			$expectedEpochTime,
			DateEquations::getEpochTimeForYear( $year ),
		);
	}

	public static function provideGetEpochTimeForYear(): array {
		return [
			[ 1970, 0 ],
			[ 2000, 946684800000 ],
			[ 2024, 1704067200000 ],
			[ 2025, 1735689600000 ],
		];
	}
}
