<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-iso-string-time-zone-parse-records
 */
readonly class IsoStringTimeZoneParseRecord {
	public function __construct(
		public bool $z,
		public string $offset,
		public string $timeZoneAnnotation,
	) {
	}
}
