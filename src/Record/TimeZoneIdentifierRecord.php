<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @note Implementation of a "Time Zone Identifier Record"
 * @see https://tc39.es/ecma262/#sec-time-zone-identifier-record
 */
readonly class TimeZoneIdentifierRecord {
	public function __construct(
		public string $identifier,
		public string $primaryIdentifier,
	) {
	}
}
