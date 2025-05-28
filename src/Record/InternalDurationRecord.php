<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-internal-duration-records
 */
readonly class InternalDurationRecord {
	public function __construct(
		public DateDurationRecord $date,
		public int $time,
	) {
	}
}
