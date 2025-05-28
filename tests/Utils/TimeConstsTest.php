<?php

namespace Temporal39\Tests\Utils;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Utils\TimeConsts;

#[CoversClass( TimeConsts::class )]
class TimeConstsTest extends TestCase {
	#[DataProvider( 'provideConstantValue' )]
	public function testConstantValue( int $value, int $expectedvalue ): void {
		$this->assertSame( $expectedvalue, $value );
	}

	public static function provideConstantValue(): array {
		return [
			[ TimeConsts::HoursPerDay, 24 ],
			[ TimeConsts::MinutesPerHour, 60 ],
			[ TimeConsts::SecondsPerMinute, 60 ],
			[ TimeConsts::MsPerSecond, 1000 ],
			[
				TimeConsts::MsPerMinute,
				TimeConsts::MsPerSecond * TimeConsts::SecondsPerMinute,
			],
			[
				TimeConsts::MsPerHour,
				TimeConsts::MsPerMinute * TimeConsts::MinutesPerHour,
			],
			[
				TimeConsts::MsPerDay,
				TimeConsts::MsPerHour * TimeConsts::HoursPerDay,
			],
		];
	}
}
