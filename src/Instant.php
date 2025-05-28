<?php

namespace Temporal39;

use Brick\Math\BigInteger;
use Brick\Math\Exception\MathException;
use Brick\Math\RoundingMode as BrickRoundingMode;

readonly class Instant {
	public function __construct(
		public BigInteger $epochNanoseconds,
	) {
	}

	/**
	 * @throws MathException If casting to an integer
	 * causes integer overflow.
	 */
	public function epochMilliseconds(): int {
		$ns = $this->epochNanoseconds;
		$ms = $ns->toBigRational()->dividedBy( 1e6, BrickRoundingMode::FLOOR );
		return $ms->toInt();
	}
}
