<?php

namespace Temporal39\Record;

use Temporal39\Rounding\SignOrZero;

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

	/**
	 * @note Implementation of DateDurationSign()
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-datedurationsign
	 */
	public function sign(): SignOrZero {
		$values = [ $this->years, $this->months, $this->weeks, $this->days ];
		foreach ( $values as $value ) {
			if ( $value < 0 ) {
				return SignOrZero::Negative;
			}
			if ( $value > 0 ) {
				return SignOrZero::Positive;
			}
		}

		return SignOrZero::Zero;
	}

	/**
	 * @note Implementation of AdjustDateDurationRecord()
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-adjustdatedurationrecord
	 */
	public function adjust( int $days, ?int $weeks, ?int $months ): self {
		$weeks ??= $this->weeks;
		$months ??= $this->months;

		return new self( $this->years, $months, $weeks, $days );
	}
}
