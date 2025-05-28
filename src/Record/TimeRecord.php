<?php

namespace Temporal39\Record;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-time-records
 */
readonly class TimeRecord {
	public function __construct(
		public int $days,
		public int $hour,
		public int $minute,
		public int $second,
		public int $millisecond,
		public int $microsecond,
		public int $nanosecond,
	) {
	}

	/**
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-midnighttimerecord
	 */
	public static function asMidnightTime(): self {
		return new self( 0, 0, 0, 0, 0, 0, 0 );
	}

	/**
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-noontimerecord
	 */
	public static function asNoonTime(): self {
		return new self( 0, 12, 0, 0, 0, 0, 0 );
	}
}
