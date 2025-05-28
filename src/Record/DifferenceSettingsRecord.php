<?php

namespace Temporal39\Record;

use Temporal39\Rounding\RoundingMode;
use Temporal39\TemporalUnit;

/**
 * @codeCoverageIgnore Temporary
 * @see https://tc39.es/proposal-temporal/#sec-temporal-getdifferencesettings
 */
readonly class DifferenceSettingsRecord {
	public function __construct(
		public TemporalUnit $smallestUnit,
		public TemporalUnit $largestUnit,
		public RoundingMode $roundingMode,
		public int $roundingIncrement,
	) {
	}
}
