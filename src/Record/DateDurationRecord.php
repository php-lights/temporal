<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-date-duration-records
 */
readonly class DateDurationRecord {
	public function __construct(
		public float $years,
		public float $months,
		public float $weeks,
		public float $days,
	) {
	}
}
