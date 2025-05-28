<?php

namespace Temporal39;

use Temporal39\Rounding\MaxDurationRoundingIncrement;

/**
 * @see https://tc39.es/proposal-temporal/#sec-temporal-units
 */
enum TemporalUnit: int {
	case Year = 9;
	case Month = 8;
	case Week = 7;
	case Day = 6;
	case Hour = 5;
	case Minute = 4;
	case Second = 3;
	case Millisecond = 2;
	case Microsecond = 1;
	case Nanosecond = 0;

	public function asSingularName(): string {
		return match ( $this ) {
			self::Year => 'year',
			self::Month => 'month',
			self::Week => 'week',
			self::Day => 'day',
			self::Hour => 'hour',
			self::Minute => 'minute',
			self::Second => 'second',
			self::Millisecond => 'millisecond',
			self::Microsecond => 'microsecond',
			self::Nanosecond => 'nanosecond',
		};
	}

	public function asPluralName(): string {
		return match ( $this ) {
			self::Year => 'years',
			self::Month => 'months',
			self::Week => 'weeks',
			self::Day => 'days',
			self::Hour => 'hours',
			self::Minute => 'minutes',
			self::Second => 'seconds',
			self::Millisecond => 'milliseconds',
			self::Microsecond => 'microseconds',
			self::Nanosecond => 'nanoseconds',
		};
	}

	/**
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-iscalendarunit
	 */
	public function isCalendarUnit(): bool {
		return match ( $this ) {
			self::Year, self::Month, self::Week => true,
			default => false,
		};
	}

	public function isGreaterThan( TemporalUnit $otherUnit ): bool {
		return $this->value > $otherUnit->value;
	}

	public function getMaxDurationRoundingIncrement(): MaxDurationRoundingIncrement {
		return match ( $this ) {
			self::Year, self::Month, self::Week, self::Day => MaxDurationRoundingIncrement::Unset,
			self::Hour => MaxDurationRoundingIncrement::N24,
			self::Minute, self::Second => MaxDurationRoundingIncrement::N60,
			self::Millisecond, self::Microsecond, self::Nanosecond => MaxDurationRoundingIncrement::N1000,
		};
	}
}
