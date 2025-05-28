<?php

namespace Temporal39\Record;

/**
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

	/**
	 * @note Implementation of ZeroDateDuration()
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-zerodateduration
	 */
	public static function zero(): self {
		return new self( 0.0, 0.0, 0.0, 0.0 );
	}
}
