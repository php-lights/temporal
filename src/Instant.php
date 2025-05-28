<?php

namespace Temporal39;

use Brick\Math\BigInteger;
use Brick\Math\RoundingMode as BrickRoundingMode;

readonly class Instant {
	public function __construct(
		public BigInteger $epochNanoseconds,
	) {
	}

	public function epochMilliseconds(): int {
		$ns = $this->epochNanoseconds->toBigRational();
		if ( $ns->isEqualTo( 0 ) ) {
			return $ns->toFloat();
		}

		$ms = $ns->dividedBy( 1e6, BrickRoundingMode::FLOOR );
		return $ms->toFloat();
	}
}
