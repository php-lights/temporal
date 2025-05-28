<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-iso-date-time-records
 */
readonly class IsoDateTimeRecord {
	public function __construct(
		public IsoDateRecord $isoDate,
		public TimeRecord $time,
	) {
	}
}
