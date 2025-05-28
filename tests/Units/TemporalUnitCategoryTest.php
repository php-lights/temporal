<?php

namespace Temporal39\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Unit\TemporalUnit;
use Temporal39\Unit\TemporalUnitCategory;

#[CoversClass( TemporalUnitCategory::class )]
class TemporalUnitCategoryTest extends TestCase {
	#[DataProvider( 'provideGetCategory' )]
	public function testFromTemporalUnit(
		TemporalUnit $unit,
		TemporalUnitCategory $expectedCategory,
	): void {
		$this->assertSame( $expectedCategory, TemporalUnitCategory::fromUnit( $unit ) );
	}

	public static function provideGetCategory() {
		return [
			[ TemporalUnit::Year, TemporalUnitCategory::Date ],
			[ TemporalUnit::Month, TemporalUnitCategory::Date ],
			[ TemporalUnit::Week, TemporalUnitCategory::Date ],
			[ TemporalUnit::Day, TemporalUnitCategory::Date ],
			[ TemporalUnit::Hour, TemporalUnitCategory::Time ],
			[ TemporalUnit::Second, TemporalUnitCategory::Time ],
			[ TemporalUnit::Millisecond, TemporalUnitCategory::Time ],
			[ TemporalUnit::Microsecond, TemporalUnitCategory::Time ],
			[ TemporalUnit::Nanosecond, TemporalUnitCategory::Time ],
		];
	}
}
