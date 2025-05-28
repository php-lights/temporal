<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-year-week-record-specification-type
 */
readonly class YearWeekRecord {
	public function __construct(
		public int $week,
		public int $year,
	) {
	}
}
