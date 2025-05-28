<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-calendar-fields-records
 */
readonly class CalendarFieldsRecord {
	public function __construct(
		public ?string $era,
		public ?int $eraYear,
		public ?int $year,
		public ?int $month,
		public ?string $monthCode,
		public ?int $day,
		public ?int $hour,
		public ?int $minute,
		public ?int $second,
		public ?int $millisecond,
		public ?int $microsecond,
		public ?int $nanosecond,
		public ?string $offset,
		public ?string $timeZone,
	) {
	}
}
