<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-iso-year-month-records
 */
readonly class IsoYearMonthRecord {
	public function __construct(
		public int $year,
		public int $month,
	) {
	}
}
