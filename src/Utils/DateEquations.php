<?php

namespace Temporal39\Utils;

readonly class DateEquations {
	public static function getEpochTimeToDayNumber( int $t ): float {
		return floor( $t / (float)TimeConsts::MsPerDay );
	}

	public static function getMathDaysInYear( int $y ): MathDaysInYear {
		return ( ( $y % 4 === 0 && $y % 100 > 0 ) || $y % 400 == 0 )
			? MathDaysInYear::D366
			: MathDaysInYear::D365;
	}

	public static function getEpochDayNumberForYear( int $y ): int {
		return 365
			* ( $y - 1970 )
			+ floor( ( $y - 1969 ) / 4 )
			- floor( ( $y - 1901 ) / 100 )
			+ floor( ( $y - 1601 ) / 400 );
	}

	/**
	 * Returns the epoch time (that being the number of milliseconds)
	 * of the current year since 1970
	 */
	public static function getEpochTimeForYear( int $y ): int {
		return TimeConsts::MsPerDay * self::getEpochDayNumberForYear( $y );
	}
}
