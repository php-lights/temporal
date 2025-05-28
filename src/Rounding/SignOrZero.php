<?php

namespace Temporal39\Rounding;

enum SignOrZero: int {
	case Negative = -1;
	case Positive = 1;
	case Zero = 0;

	public static function fromSign( Sign $sign ): self {
		return match ( $sign ) {
			Sign::Positive => self::Positive,
			Sign::Negative => self::Negative,
		};
	}
}
