<?php

namespace Temporal39\Rounding;

enum MaxDurationRoundingIncrement {
	case Unset;
	case N24;
	case N60;
	case N1000;

	public function getValue(): ?int {
		return match ( $this ) {
			self::Unset => null,
			self::N24 => 24,
			self::N60 => 60,
			self::N1000 => 1000,
		};
	}
}
