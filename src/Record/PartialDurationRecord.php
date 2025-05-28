<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-partial-duration-records
 */
readonly class PartialDurationRecord {
	public function __construct(
		public ?float $years,
		public ?float $months,
		public ?float $weeks,
		public ?float $days,
		public ?float $hours,
		public ?float $minutes,
		public ?float $seconds,
		public ?float $milliseconds,
		public ?float $microseconds,
		public ?float $nanoseconds,
	) {
	}
}
