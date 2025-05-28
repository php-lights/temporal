<?php

namespace Temporal39\Unit;

/**
 * @see https://tc39.es/proposal-temporal/#sec-temporal-temporalunitcategory
 */
enum TemporalUnitCategory {
	case Date;
	case Time;

	public static function fromUnit( TemporalUnit $unit ): self {
		return match ( $unit ) {
			TemporalUnit::Year,
			TemporalUnit::Month,
			TemporalUnit::Week,
			TemporalUnit::Day => self::Date,

			TemporalUnit::Hour,
			TemporalUnit::Minute,
			TemporalUnit::Second,
			TemporalUnit::Millisecond,
			TemporalUnit::Microsecond,
			TemporalUnit::Nanosecond => self::Time,
		};
	}
}
