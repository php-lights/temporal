<?php

namespace Temporal39\Tests\Record;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Temporal39\Record\DateDurationRecord;

#[CoversClass( DateDurationRecord::class )]
class DateDurationRecordTest extends TestCase {
	public function testZeroDateDuration(): void {
		$zero = DateDurationRecord::zero();

		$this->assertEqualsWithDelta( 0.0, $zero->years, 0.0 );
		$this->assertEqualsWithDelta( 0.0, $zero->months, 0.0 );
		$this->assertEqualsWithDelta( 0.0, $zero->weeks, 0.0 );
		$this->assertEqualsWithDelta( 0.0, $zero->days, 0.0 );
	}
}
