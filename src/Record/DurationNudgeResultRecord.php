<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-duration-nudge-result-records
 */
readonly class DurationNudgeResultRecord {
	public function __construct(
		public InternalDurationRecord $duration,
		public int $nudgedEpochNs,
		public bool $didExpandCalendarUnit,
	) {
	}
}
