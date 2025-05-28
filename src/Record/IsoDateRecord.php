<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-iso-date-records
 */
readonly class IsoDateRecord {
	public function __construct(
		public int $year,
		public int $month,
		public int $day,
	) {
	}
}
