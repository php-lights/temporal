<?php

namespace Temporal39\Tests\Record;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Record\DateDurationRecord;
use Temporal39\Rounding\SignOrZero;

#[CoversClass( DateDurationRecord::class )]
class DateDurationRecordTest extends TestCase {
	public function testZeroDateDuration(): void {
		$zero = DateDurationRecord::zero();

		$this->assertEqualsWithDelta( 0.0, $zero->years, 0.0 );
		$this->assertEqualsWithDelta( 0.0, $zero->months, 0.0 );
		$this->assertEqualsWithDelta( 0.0, $zero->weeks, 0.0 );
		$this->assertEqualsWithDelta( 0.0, $zero->days, 0.0 );
	}

	#[DataProvider( 'provideDateDurationSign' )]
	public function testDateDurationSign(
		DateDurationRecord $dateDuration,
		SignOrZero $expected,
	): void {
		$this->assertSame( $expected, $dateDuration->sign() );
	}

	public static function provideDateDurationSign(): array {
		return [
			[ new DateDurationRecord( 5.0, 4.0, 3.0, 2.0 ), SignOrZero::Positive ],
			[ new DateDurationRecord( -1, 4.0, 3.0, 2.0 ), SignOrZero::Negative ],
			[ new DateDurationRecord( 0.0, 0.0, 0.0, 0.0 ), SignOrZero::Zero ],
		];
	}

	#[DataProvider( 'provideAdjust' )]
	public function testAdjust(
		DateDurationRecord $originalDuration,
		DateDurationRecord $expectedDuration,
		int $days,
		?int $weeks,
		?int $months,
	): void {
		$this->assertEquals(
			$expectedDuration,
			$originalDuration->adjust( $days, $weeks, $months )
		);
	}

	public static function provideAdjust(): array {
		return [
			[
				new DateDurationRecord( 2025, 1, 0, 1 ),
				new DateDurationRecord( 2025, 1, 0, 2 ),
				2,
				null,
				null,
			],
			[
				new DateDurationRecord( 2025, 1, 0, 1 ),
				new DateDurationRecord( 2025, 1, 2, 2 ),
				2,
				2,
				null,
			],
			[
				new DateDurationRecord( 2025, 1, 0, 1 ),
				new DateDurationRecord( 2025, 2, 2, 2 ),
				2,
				2,
				2,
			]
		];
	}
}
