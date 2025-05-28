<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-calendar-date-records
 */
readonly class CalendarDateRecord {
	public function __construct(
		public ?string $era,
		public ?int $eraYear,
		public int $year,
		public int $month,
		public string $monthCode,
		public int $day,
		public int $dayOfWeek,
		public int $dayOfYear,
		public YearWeekRecord $weekOfYear,
		public int $daysInWeek,
		public int $daysInMonth,
		public int $daysInYear,
		public int $monthsInYear,
		public bool $inLeapYear,
	) {
	}
}
