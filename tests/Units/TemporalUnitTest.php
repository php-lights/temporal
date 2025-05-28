<?php

namespace Temporal39\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Rounding\MaxDurationRoundingIncrement;
use Temporal39\Unit\TemporalUnit;

#[CoversClass( TemporalUnit::class )]
class TemporalUnitTest extends TestCase {
	#[DataProvider( 'provideAsSingularName' )]
	public function testAsSingularName(
		TemporalUnit $unit,
		string $expected,
	): void {
		$this->assertSame( $expected, $unit->asSingularName() );
	}

	public static function provideAsSingularName(): array {
		return [
			[ TemporalUnit::Year, 'year' ],
			[ TemporalUnit::Month, 'month' ],
			[ TemporalUnit::Week, 'week' ],
			[ TemporalUnit::Day, 'day' ],
			[ TemporalUnit::Hour, 'hour' ],
			[ TemporalUnit::Minute, 'minute' ],
			[ TemporalUnit::Second, 'second' ],
			[ TemporalUnit::Millisecond, 'millisecond' ],
			[ TemporalUnit::Microsecond, 'microsecond' ],
			[ TemporalUnit::Nanosecond, 'nanosecond' ],
		];
	}

	#[DataProvider( 'provideAsPluralName' )]
	public function testAsPluralName(
		TemporalUnit $unit,
		string $expected,
	): void {
		$this->assertSame( $expected, $unit->asPluralName() );
	}

	public static function provideAsPluralName(): array {
		return [
			[ TemporalUnit::Year, 'years' ],
			[ TemporalUnit::Month, 'months' ],
			[ TemporalUnit::Week, 'weeks' ],
			[ TemporalUnit::Day, 'days' ],
			[ TemporalUnit::Hour, 'hours' ],
			[ TemporalUnit::Minute, 'minutes' ],
			[ TemporalUnit::Second, 'seconds' ],
			[ TemporalUnit::Millisecond, 'milliseconds' ],
			[ TemporalUnit::Microsecond, 'microseconds' ],
			[ TemporalUnit::Nanosecond, 'nanoseconds' ],
		];
	}

	#[DataProvider( 'provideIsCalendarUnit' )]
	public function testIsCalendarUnit(
		TemporalUnit $unit,
		bool $expected
	): void {
		$this->assertSame( $expected, $unit->isCalendarUnit() );
	}

	public static function provideIsCalendarUnit(): array {
		return [
			[ TemporalUnit::Year, true ],
			[ TemporalUnit::Month, true ],
			[ TemporalUnit::Week, true ],
			[ TemporalUnit::Day, false ],
		];
	}

	#[DataProvider( 'provideIsGreaterThan' )]
	public function testIsGreaterThan(
		TemporalUnit $unit1,
		TemporalUnit $unit2,
		bool $expected,
	): void {
		$this->assertSame( $expected, $unit1->isGreaterThan( $unit2 ) );
	}

	public static function provideIsGreaterThan(): array {
		return [
			[ TemporalUnit::Year, TemporalUnit::Year, false ],
			[ TemporalUnit::Year, TemporalUnit::Month, true ],
			[ TemporalUnit::Year, TemporalUnit::Week, true ],
			[ TemporalUnit::Year, TemporalUnit::Day, true ],
			[ TemporalUnit::Year, TemporalUnit::Hour, true ],
			[ TemporalUnit::Year, TemporalUnit::Minute, true ],
			[ TemporalUnit::Year, TemporalUnit::Second, true ],
			[ TemporalUnit::Year, TemporalUnit::Millisecond, true ],
			[ TemporalUnit::Year, TemporalUnit::Microsecond, true ],
			[ TemporalUnit::Year, TemporalUnit::Nanosecond, true ],
		];
	}

	#[DataProvider( 'provideGetMaxDurationRoundingIncrement' )]
	public function testGetMaxDurationRoundingIncrement(
		TemporalUnit $unit,
		MaxDurationRoundingIncrement $expectedIncrement,
	): void {
		$this->assertSame(
			$expectedIncrement,
			$unit->getMaxDurationRoundingIncrement(),
		);
	}

	public static function provideGetMaxDurationRoundingIncrement(): array {
		return [
			[ TemporalUnit::Year, MaxDurationRoundingIncrement::Unset ],
			[ TemporalUnit::Month, MaxDurationRoundingIncrement::Unset ],
			[ TemporalUnit::Week, MaxDurationRoundingIncrement::Unset ],
			[ TemporalUnit::Day, MaxDurationRoundingIncrement::Unset ],
			[ TemporalUnit::Hour, MaxDurationRoundingIncrement::N24 ],
			[ TemporalUnit::Minute, MaxDurationRoundingIncrement::N60 ],
			[ TemporalUnit::Second, MaxDurationRoundingIncrement::N60 ],
			[ TemporalUnit::Millisecond, MaxDurationRoundingIncrement::N1000 ],
			[ TemporalUnit::Microsecond, MaxDurationRoundingIncrement::N1000 ],
			[ TemporalUnit::Nanosecond, MaxDurationRoundingIncrement::N1000 ],
		];
	}
}
