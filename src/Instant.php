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
			return $ns->toInt();
		}

		$ms = $ns->dividedBy( 1e6, BrickRoundingMode::FLOOR );
		// calls toFloat() then intval(), instead of toInt() directly
		// to avoid PHP 8.1 deprecation warnings of implicitly
		// converting from float to integer
		return intval( $ms->toFloat() );
	}
}
