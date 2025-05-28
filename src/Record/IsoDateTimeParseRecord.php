<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-iso-date-time-parse-records
 */
readonly class IsoDateTimeParseRecord {
	public function __construct(
		public ?int $year,
		public int $month,
		public int $day,
		public TimeRecord|string $time,
		public IsoDateTimeParseRecord $timeZone,
		public string $calendar,
	) {
	}
}
